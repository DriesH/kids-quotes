<template lang="html">
    <div :class="{ 'col-sm-3' : !addChildShow, 'col-md-2' : !addChildShow, 'col-sm-7' : addChildShow, 'col-md-6' :addChildShow }" class="sidebar">
        <ul class="nav nav-sidebar" id="childrenList" v-if='!addChildShow'>
            <li><a @click="openForm"><i class="fa fa-plus"></i> ADD CHILD</a></li>
        </ul>

        <form v-if='addChildShow' class="col-sm-3 col-md-5 pull-left">
            <div class="form-group">
                <label for="childName">Full name: </label>
                <input type="text" class="form-control" id="childName" placeholder="Fullname" v-model="newChild.childName">
            </div>
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="boy" value="boy" checked v-model="newChild.gender">
                        Boy
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="girl" value="girl" v-model="newChild.gender">
                        Girl
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date Of Birth:</label>
                <input type="text" class="form-control" id="dateOfBirth" placeholder="01-01-2001" v-model="$parent.newChild.dateOfBirth">
            </div>
            <button type="button" name="addChild" class="btn btn-success" @click="addNewChild"><i class="fa fa-plus"></i> add</button>
        </form>


    </div>
</template>

<script>
    export default {
        data () {
            return {
                newChild: {
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                },
                addChildShow: false
            }
        },
        computed: {},
        ready () {},
        methods: {
            openForm: function () {
                this.addChildShow = !this.addChildShow;
            },
            addNewChild: function () {
                this.addChildShow = !this.addChildShow;

                this.$http.post('/api/child', this.newChild).then((success_response) => {
                    this.currentChildren.push(success_response.body)
                    this.addingNewChild = !this.addingNewChild
                },
                (error_response) => {
                    this.errorMessagesForm = [];
                    error_response.body.childName != undefined && this.errorMessagesForm.push(error_response.body.childName);
                    error_response.body.gender != undefined && this.errorMessagesForm.push(error_response.body.gender);
                    error_response.body.dateOfBirth != undefined && this.errorMessagesForm.push(error_response.body.dateOfBirth);
                    console.log(this.errorMessagesForm);
                });
            }
        },
        components: {}
    }
</script>

<style lang="css">
</style>
