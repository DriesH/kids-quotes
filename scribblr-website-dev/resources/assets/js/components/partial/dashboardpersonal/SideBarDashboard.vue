<template lang="html">
    <div :class="{ 'col-sm-3 col-md-2' : !addChildShow, 'col-sm-5 col-md-4 overlay-sidebar-shadow' : addChildShow , 'col-sm-3 col-md-2' : !addQuoteShow, 'col-sm-5 col-md-4 overlay-sidebar-shadow' : addQuoteShow}" class="sidebar" id='sidebar-div'>
        <!-- SIDEBARLIST START -->
        <ul class="nav nav-sidebar" id="childrenList" v-if='!addChildShow'>
            <li v-for="child in currentChildrenArray">
                <a @click="selectedChildFn(child.id)" id='child_{{ child.id }}'>
                    {{ child.childName }}
                    <i v-if='selectedChild==child.id' style="position:absolute;left:10px;" class="fa fa-cog pull-left cog-wheel fontawesomefix" @click="openEditChildForm"></i>
                </a>
            </li>

            <li>
                <a @click="openAddChildForm" class="add-child">
                    <i class="fa fa-plus"></i> ADD CHILD
                </a>
            </li>
        </ul>
        <!-- SIDEBARLIST END -->

        <!-- FORM START -->
        <form v-if='addChildShow' class="col-sm-12 col-md-8 col-md-push-2">
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
                <input type="text" class="form-control" id="childName" placeholder="Fullname" v-model="newChild.childName" :class="{ 'error-form' : errorMessagesForm.childName }">
            </div>
            <!-- NAME END -->

            <!-- GENDER START -->
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="boy" value="boy" checked v-model="newChild.gender" :class="{ 'error-form' : errorMessagesForm.gender }">
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

            <!--  DATEOFBIRTH START -->
            <div class="form-group">
                <label for="dateOfBirth">Date Of Birth:</label>
                <input type="text" class="form-control" id="dateOfBirth" placeholder="01-01-2001" v-model="newChild.dateOfBirth" :class="{ 'error-form' : errorMessagesForm.dateOfBirth }">
            </div>
            <!-- DATEOFBIRTH END -->

            <button type="button" name="addChild" class="btn btn-success" @click="addNewChild"><i class="fa fa-plus"></i> add</button>
            <button type="button" name="closeForm" class="btn btn-danger pull-right" @click="closeForm"><i class="fa fa-ban"></i> close</button>
        </form>
        <!-- FORM END -->
    </div>
</template>

<script>
    export default {
        props: [
            'currentChildren',
            'selectedChild',
            'editChildShow'
        ],
        data () {
            return {
                newChild: {          //json data for adding new child
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                },
                addChildShow: false, //show - hide form add child
                currentChildrenArray: [

                ],
                errorMessagesForm: { //Error data add child form
                    error: false,
                    childName: '',
                    gender: '',
                    dateOfBirth: '',
                }

            }
        },
        computed: {},
        ready () {
            //wait on api data.
            this.$on('data-arrived', function () {
                console.log(this.currentChildren);
                for( var i=0; i < this.currentChildren.length; i++ ) {
                    this.currentChildrenArray.push(this.currentChildren[i]);
                }
            });
        },
        watch: {
            selectedChild: function (value) {
                console.log('Child id changed to: '+ value);
            }
        },
        methods: {
            openAddChildForm: function () {
                this.addChildShow = true;
                this.clearChildForm();
            },
            closeForm: function () {
                this.addChildShow = false;
                this.clearChildForm();
            },
            openEditChildForm: function () {
                console.log('openEditChildForm');
                this.editChildShow = true;
                var sideBar = document.getElementById('sidebar-div');
                if(!this.hasClass(sideBar, 'overlay-sidebar-shadow')) {
                    sideBar.className += ' overlay-sidebar-shadow';
                }
            },
            addNewChild: function () {
                this.$http.post('/api/child', this.newChild).then((success_response) => {
                    this.errorMessagesForm.error = false;
                    this.addChildShow            = !this.addChildShow; //show - hide form
                    this.currentChildrenArray.push(success_response.body);

                    this.clearChildForm();
                },
                (error_response) => {
                    this.errorMessagesForm.error       = true;
                    this.errorMessagesForm.childName   = error_response.body.childName;
                    this.errorMessagesForm.gender      = error_response.body.gender;
                    this.errorMessagesForm.dateOfBirth = error_response.body.dateOfBirth;

                    console.log(this.errorMessagesForm);
                });
            },
            clearChildForm: function () {
                //clear form
                this.newChild.childName   = '';
                this.newChild.gender      = '';
                this.newChild.dateOfBirth = '';
            },
            selectedChildFn: function (id) {
                this.selectedChild = id;
                var childListItem = document.getElementById('child_' + id);
                var activeChildListItem = document.getElementsByClassName('active');
                for(var i = 0; i < activeChildListItem.length; i++) {
                    activeChildListItem[i].className = '';
                }
                childListItem.className += 'active';
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>


    form {
        background: #496988;
        border-radius: 5px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .error-form {
        border: 1px solid #ff0000;
    }

</style>
