<template lang="html">
    <div class="sidebar-dries">
        <!-- FORM START -->
        <form>
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
        <button class="btn btn-danger pull-left top-buffer" type="button" name="delete" @click="deleteChild(selectedChild)"><i class="fa fa-trash"></i> Delete</button>
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
            sideBarShow: {
                type: Boolean
            },
            currentChildrenArray: {
                type: Array
            },
            previousQuotes: {
                type: Array
            }
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
        ready () {
            this.getCurrentChildInformation();
        },
        methods: {
            editChildFn: function () {
                this.$http.post('api/child/' + this.selectedChild + '/edit', this.editChild).then((success_response) => {
                    if( success_response.body === '1' ){
                        this.closeEditChildForm();
                        this.updateChildList();
                    }
                }, (error_response) => {
                    alert('Error while updating...');
                });
            },
            closeEditChildForm: function () {
                this.editChildShow = false;
                this.sideBarShow = true;
            },
            clearEditChildForm: function () {
                editChild.childName   = '';
                editChild.gender      = '';
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            },
            getCurrentChildInformation: function () {
                var index = this.currentChildrenArray.findIndex(x => x.id==this.selectedChild);
                this.editChild.childName   = this.currentChildrenArray[index].childName;
                this.editChild.gender      = this.currentChildrenArray[index].gender;
            },
            updateChildList: function () {
                var index = this.currentChildrenArray.findIndex(x => x.id==this.selectedChild);
                this.currentChildrenArray[index].childName = this.editChild.childName;
                this.currentChildrenArray[index].gender    = this.editChild.gender;
            },
            deleteChild: function (id) {
                this.$http.get('api/child/delete/' + id).then((success_response) => {
                    var response = success_response.body;
                    var index = this.currentChildrenArray.findIndex(x => x.id==this.selectedChild);

                    if(response === 'deleted') {
                        this.currentChildrenArray.splice(index, 1);
                    }

                    this.previousQuotes = [];
                    this.selectedChild = 'none';

                    this.closeEditChildForm();

                }, (error_response) => {

                });
            }
        }
    }
</script>

<style lang="css" scoped>
    .top-buffer{
        margin-top: 100px;
    }
</style>
