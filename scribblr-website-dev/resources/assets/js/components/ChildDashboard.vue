<template lang="html">
    <child-add-form v-if="addingNewChild" transition="modal"></child-add-form>

    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar" id="childrenList" v-if="currentChildren.length === 0">
                    <li>No children yet!</li>
                </ul>
                <ul class="nav nav-sidebar" id="childrenList" v-else>
                    <li v-for="child in currentChildren"  class="childListItem">
                        <a v-on:click.self="showChildQuotes(child.id, child.name)">
                            {{child.name}}<i id="cogwheel" class="fa fa-cog pull-right" v-on:click.self="showModifySettings(child.id)">{{child.id}}</i>
                        </a>
                    </li>
                    <li><button type="button" name="button" class="btn btn-default" @click="showHideForm">add child</button></li>
                </ul>
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder" v-if="currentChildren.length === 0">
                        <div class="thumbnail" id="addNewChildThumb">
                            <div class="center-text">
                                <h3>Add a new child!</h3>
                                <div class="caption">
                                    <button type="button" name="showForm" id="showFormButton" class="btn btn-default" @click="showHideForm">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <child-modify v-if="showChildModifySettings" transition="slideIn"></child-modify>
                <add-quote v-if="showQuoteAddForm" v-bind:current-selected-child-id="currentSelectedChildId" transition="slideIn"></add-quote>
                <div class="imgs">
                    <img src="/backgr_imgs/chalkboard.jpg" alt="chalkboard" />
                    <img src="/backgr_imgs/wood.jpg" alt="wood" />
                    <img src="/backgr_imgs/paper.jpg" alt="paper" />
                </div>
            </div>
        </div>
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
                currentChildren: [

                ],
                addingNewChild: false,
                errorMessagesForm: [],
                showQuoteAddForm: false,
                currentSelectedChildId: '',
                currentSelectedChildName: '',
                isActive: false,
                previousQuotes: [

                ],
                animated: false,
                previousSelectedChildId: null,
                showChildModifySettings: false
            }
        },
        computed: {},
        ready () {
            this.$http.get('/api/child').then((success_response) => {
                this.currentChildren = JSON.parse(success_response.body)
            },
            (error_response) => {
                alert('error');
            });


        },
        attached () {},
        methods: {
            addNewChild: function () {
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
            },
            showHideForm: function () {
                this.errorMessagesForm = [];
                this.newChild = {
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                };
                this.addingNewChild = !this.addingNewChild;
            },
            showChildQuotes: function (id, name) {
                var self = this;

                this.showChildModifySettings = false;

                if (this.previousSelectedChildId === id && this.showQuoteAddForm === true) {
                    setTimeout(function () {
                        self.showQuoteAddForm = false;
                    }, 500);
                }
                else if (this.previousSelectedChildId !== null) {
                    this.showQuoteAddForm = false;
                    setTimeout(function () {
                        self.showQuoteAddForm = true;
                    }, 500);
                }
                else if ( this.previousSelectedChildId === null || this.showQuoteAddForm === false ) {
                    setTimeout(function () {
                        self.showQuoteAddForm = true;
                    }, 100);
                }

                this.previousSelectedChildId = id

                if( this.currentSelectedChildId !== null ){
                    this.currentSelectedChildId = ''
                }

                this.currentSelectedChildId = id
                this.currentSelectedChildName = name

                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body)
                },
                (error_response) => {
                    alert('error');
                });
            },
            showModifySettings: function (id) {
                var self = this;
                this.showQuoteAddForm = false;

                if (this.previousSelectedChildId === id && this.showChildModifySettings === true) {
                    setTimeout(function () {
                        self.showChildModifySettings = false;
                    }, 500);
                }
                else if (this.previousSelectedChildId !== null) {
                    this.showChildModifySettings = false;
                    setTimeout(function () {
                        self.showChildModifySettings = true;
                    }, 500);
                }
                else if ( this.previousSelectedChildId === null || this.showChildModifySettings === false ) {
                    setTimeout(function () {
                        self.showChildModifySettings = true;
                    }, 100);
                }

                this.previousSelectedChildId = id

                if( this.currentSelectedChildId !== null ){
                    this.currentSelectedChildId = ''
                }

                this.currentSelectedChildId = id
            }
        },
        components: {},
    }
</script>

<style lang="css">
</style>
