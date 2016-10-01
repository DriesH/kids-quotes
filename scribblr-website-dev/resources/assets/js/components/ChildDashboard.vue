<template lang="html">

    <add-child-modal transition="modal" v-if="showModalForm"></add-child-modal>

    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar" id="childrenList" v-if="">
                    <!--@if($children == 'empty')
                        <li>No children yet!</li>
                    @else
                        @foreach($children as $child)
                            <li class="childListItem">
                                <a>{{ $child->name }}
                                    <i class="fa fa-cog fa-vc pull-right"></i>
                                </a>
                            </li>
                        @endforeach
                    @endif-->

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
                        <div class="thumbnail" id="addNewChildThumb">
                            <h3>Add a new child!</h3>
                            <div class="caption">
                                <button type="button" name="showForm" id="showFormButton" class="btn btn-default" @click="addChildFormToggle"><i class="fa fa-plus"></i></button>
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
                showModalForm: false,
                newChild: {
                    childName: '',
                    gender: '',
                    dateOfBirth: ''
                },
                currentChildren: [

                ]
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
                this.$http.post('/api/child').then((success_response) => {
                    alert('success');
                },
                (error_response) => {
                    alert('error');
                });
            },
            addChildFormToggle: function () {
                this.showModalForm = !this.showModalForm;
            }
        },
        components: {},
    }
</script>

<style lang="css">
</style>
