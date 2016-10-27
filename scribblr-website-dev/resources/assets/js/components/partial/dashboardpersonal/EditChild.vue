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

                <p v-if="errorMessagesForm.dateOfBirth">
                    {{ errorMessagesForm.dateOfBirth }}
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

            <!--  DATEOFBIRTH START -->
            <div class="form-group">
                <label for="dateOfBirth">Date Of Birth:</label>
                <input type="text" class="form-control" id="dateOfBirth" placeholder="01-01-2001" v-model="editChild.dateOfBirth" :class="{ 'error-form' : errorMessagesForm.dateOfBirth }">
            </div>
            <!-- DATEOFBIRTH END -->

            <!-- BUTTONS START -->
            <button type="button" name="add" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</button>
            <button type="button" class="btn btn-danger pull-right" name="hide" @click="closeEditChildForm"><i class="fa fa-ban"></i> Cancel</button>
            <!-- BUTTONS END -->
        </form>
        <!-- FORM END -->

    </div>
</template>

<script>
    export default {
        props: [
            'editChildShow',
            'selectedChild'
        ],
        data () {
            return {
                editChild: {
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                },
                errorMessagesForm: {
                    error: '',
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                }

            }
        },
        computed: {

        },
        ready () {
            this.$http.get('api/child').then((success_response) => {
                console.log('success edit child: ' + success_response.body);
            }, (error_response) => {
                console.log('error edit child:' + success_response.body);
            });
        },
        methods: {
            editChildFn: function () {
                this.$http.get('api/child/' + this.selectedChild + '/edit/').then((success_response) => {

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
                editChild.dateOfBirth = '';
            }
        },
        components: {

        }
    }
</script>

<style lang="css" scoped>
</style>
