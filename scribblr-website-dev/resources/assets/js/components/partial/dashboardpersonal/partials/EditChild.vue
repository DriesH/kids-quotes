<template lang="html">
    <div class="col-md-6 col-sm-6 sidebar">
        <!-- FORM START -->
        <form class="col-md-8 pull-right">
            <!-- ALERT BOX START -->
            <div class="alert alert-danger animated" role="alert" v-if="errorMessagesForm.error" transition="bounce">
                <p v-if="errorMessagesForm.childName">
                    {{ errorMessagesForm.childName }}
                </p>

                <p v-if="errorMessagesForm.gender">
                    {{ errorMessagesForm.gender }}
                </p>
            </div>
            <!-- ALERT BOX END -->

            <!-- NAME START -->
            <div class="form-group">
                <label for="childName">Full name: </label>
                <input type="text" class="form-control" id="childName" placeholder="Fullname" v-model="editChild.childName" :class="{ 'error-form' : errorMessagesForm.childName }">
            </div>
            <!-- NAME END -->

            <!-- GENDER START -->
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="boy" value="boy" checked v-model="editChild.gender" :class="{ 'error-form' : errorMessagesForm.gender }">
                        Boy
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="girl" value="girl" v-model="editChild.gender" :class="{ 'error-form' : errorMessagesForm.gender }">
                        Girl
                    </label>
                </div>
            </div>
            <!-- GENDER END -->

            <!-- BUTTONS START -->
            <button type="button" name="add" class="btn btn-success" @click="editChildFn"><i class="fa fa-pencil"></i> Edit</button>
            <button type="button" class="btn btn-danger pull-right" name="hide" @click="closeEditChildForm"><i class="fa fa-ban"></i> Cancel</button>
            <!-- BUTTONS END -->
        </form>
        <!-- FORM END -->

    </div>
</template>

<script>
    export default {
        props: {
            currentChildren: {
                type: Array
            },
            editChildShow: {
                type: Boolean,
                default: false
            },
            selectedChild: {
                type: [String, Number]
            },
        },
        data () {
            return {
                editChild: {
                    childName: '',
                    gender: '',
                },
                errorMessagesForm: {
                    error: '',
                    childName: '',
                    gender: '',
                }

            }
        },
        computed: {

        },
        watch: {

        },
        ready () {
            var index = this.currentChildren.findIndex(x => x.id==this.selectedChild);
            this.editChild.childName   = this.currentChildren[index].childName;
            this.editChild.gender      = this.currentChildren[index].gender;
        },
        methods: {
            editChildFn: function () {
                this.$http.post('api/child/' + this.selectedChild + '/edit', this.editChild).then((success_response) => {
                    if( success_response === 1 ){

                    }
                }, (error_response) => {

                });
            },
            closeEditChildForm: function () {
                this.editChildShow = false;
                var sideBar = document.getElementById('sidebar-div');
                if(this.hasClass(sideBar, 'overlay-sidebar-shadow')) {
                    sideBar.className = 'col-sm-3 col-md-2 sidebar';
                }
            },
            clearEditChildForm: function () {
                editChild.childName   = '';
                editChild.gender      = '';
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            }
        },
        components: {

        }
    }
</script>

<style lang="css" scoped>
</style>
