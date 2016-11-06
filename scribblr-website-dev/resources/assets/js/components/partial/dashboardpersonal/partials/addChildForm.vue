<template lang="html">
    <div class="sidebar-dries">
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
                <input type="text" class="form-control" id="childName" placeholder="Fullname" v-model="newChild.childName" :class="{ 'error-form' : errorMessagesForm.childName }">
            </div>
            <!-- NAME END -->

            <!-- GENDER START -->
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="boy" value="boy" checked v-model="newChild.gender" :class="{ 'error-form' : errorMessagesForm.gender }" checked>
                        Boy
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="girl" value="girl" v-model="newChild.gender" :class="{ 'error-form' : errorMessagesForm.gender }">
                        Girl
                    </label>
                </div>
            </div>
            <!-- GENDER END -->

            <button type="button" name="addChild" class="btn btn-success" @click="addNewChild"><i class="fa fa-plus"></i> add</button>
            <button type="button" name="closeForm" class="btn btn-danger pull-right" @click="closeAddChildForm"><i class="fa fa-ban"></i> close</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            clearChildForm: {
                type: Function
            },
            addChildShow: {
                type: Boolean
            },
            sideBarShow: {
                type: Boolean
            }
        },
        data () {
            return {
                newChild: {          //json data for adding new child
                    childName: '',
                    gender: 'boy',
                },
                errorMessagesForm: { //Error data add child form
                    error: false,
                    childName: '',
                    gender: '',
                }
            }
        },
        ready () {
            this.clearChildForm();
        },
        methods: {
            closeAddChildForm: function () {
                this.addChildShow = false;
                this.sideBarShow = true;
                this.clearChildForm();
            },
            addNewChild: function () {
                this.$http.post('/api/child', this.newChild).then((success_response) => {
                    this.errorMessagesForm.error = false;
                    this.addChildShow            = !this.addChildShow; //show - hide form
                    this.currentChildrenArray.push(success_response.body);
                    this.closeAddChildForm();

                },
                (error_response) => {
                    this.errorMessagesForm.error       = true;
                    this.errorMessagesForm.childName   = error_response.body.childName;
                    this.errorMessagesForm.gender      = error_response.body.gender;

                    alert('Error adding a new child...');
                });
            },
            clearChildForm: function () {
                //clear form
                this.newChild.childName   = '';
                this.newChild.gender      = '';
            },
        },
    }
</script>

<style lang="css">
</style>
