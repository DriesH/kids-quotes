<template lang="html">
    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar" id="childrenList" v-if="currentChildren === null">
                    <li>No children yet!</li>
                </ul>
                <ul class="nav nav-sidebar" id="childrenList" v-else>
                    <li v-for="child in currentChildren"><a href="#">{{child.name}}</a></li>
                </ul>
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>

                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder">

                        <div class="thumbnail" id="addNewChildThumb" v-if="!addingNewChild">
                            <div class="center-text">
                                <h3>Add a new child!</h3>
                                <div class="caption">
                                    <button type="button" name="showForm" id="showFormButton" class="btn btn-default" @click="showHideForm"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                        </div>

                        <div class="thumbnail" id="addNewChildThumb" v-else="addingNewChild">
                            <div class="caption">
                                <form>
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
                                        <label for="">Date Of Birth:</label>
                                        <input type="text" class="form-control" id="dateOfBirth" placeholder="01-01-2001" v-model="newChild.dateOfBirth">
                                    </div>
                                    <button type="button" name="addChild" class="btn btn-success" @click="addNewChild"><i class="fa fa-plus"></i> add</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <h2 class="sub-header"></h2>
                <div class="table-responsive">
                    <table class="table table-striped">

                    </table>
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
                addingNewChild: false
            }
        },
        computed: {},
        ready () {
            this.$http.get('/api/child').then((success_response) => {
                this.currentChildren = JSON.parse(success_response.body);
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
                },
                (error_response) => {
                    alert('error');
                });
            },
            showHideForm: function () {
                this.addingNewChild = !this.addingNewChild;
            }
        },
        components: {},
    }
</script>

<style lang="css">
</style>
