<template lang="html">
    <child-add-form v-if="addingNewChild" transition="modal"></child-add-form>

    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar" id="childrenList" v-if="currentChildren.length === 0">
                    <li>No children yet!</li>
                </ul>
                <ul class="nav nav-sidebar" id="childrenList" v-else>
                    <li v-for="child in currentChildren" @click="addQuoteForCurrentChild(child.id)" class="childListItem"><a>{{child.name}}<i class="fa fa-cog pull-right"></i></a></li>
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
                                    <button type="button" name="showForm" id="showFormButton" class="btn btn-default" @click="showHideForm"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <add-quote v-if="showQuoteAddForm" v-bind:current-selected-child-id="currentSelectedChildId"></add-quote>
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
                errorMessagesForm: {
                    error: false,
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                },
                showQuoteAddForm: false,
                currentSelectedChildId: '',
                previousQuotes: [

                ]
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
                    this.errorMessagesForm.error = true
                    this.errorMessagesForm.childName = error_response.body.childName
                    this.errorMessagesForm.gender = error_response.body.gender
                    this.errorMessagesForm.dateOfBirth = error_response.body.dateOfBirth
                });
            },
            showHideForm: function () {
                this.addingNewChild = !this.addingNewChild
            },
            addQuoteForCurrentChild: function (id) {
                if(this.showQuoteAddForm !== true) {
                    this.showQuoteAddForm = !this.showQuoteAddForm
                }
                if( this.currentSelectedChildId !== null ){
                    this.currentSelectedChildId = ''
                }

                this.currentSelectedChildId = id

                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body)
                },
                (error_response) => {
                    alert('error');
                });

            }
        },
        components: {},
    }
</script>

<style lang="css">
</style>
