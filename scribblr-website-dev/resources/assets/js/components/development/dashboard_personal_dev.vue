<template lang="html">
    <div id="wrapper">
        <div id="sidebar-wrapper"
        :class="{
            'sidebar-menu': addQuoteShow === false && addChildShow === false && editChildShow === false,
            'editchild-menu': editChildShow === true,
            'addquotes-menu': addQuoteShow === true,
            'addchild-form': addChildShow === true
        }">
            <!-- SIDEBAR START -->
            <side-bar-dashboard
                v-if="sideBarShow"
                v-bind:current-children.sync="currentChildren"
                v-bind:selected-child.sync="selectedChild"
                v-bind:add-quote-show.sync="addQuoteShow"
                v-bind:edit-child-show.sync="editChildShow"
                v-bind:has-class="hasClass"
                v-bind:open-add-child-form="openAddChildForm"
                v-bind:open-edit-child-form="openEditChildForm"
                ></side-bar-dashboard>
            <!-- SIDEBAR START -->

            <!-- ADDQUOTES START -->
            <add-quotes-dashboard
                style="z-index: 100;"
                v-if="addQuoteShow"
                v-bind:side-bar-show.sync="sideBarShow"
                v-bind:add-quote-show.sync="addQuoteShow"
                v-bind:selected-child.sync="selectedChild"
                v-bind:previous-quotes.sync="previousQuotes"
                ></add-quotes-dashboard>
            <!-- ADDQUOTES START -->

            <!-- ADDCHILD START -->
            <add-child-form
                style="z-index: 100;"
                v-if="addChildShow"
                v-bind:side-bar-show.sync="sideBarShow"
                v-bind:add-child-show.sync="addChildShow"
                v-bind:clear-child-form="clearChildForm"></add-child-form>
            <!-- ADDCHILD START -->

            <!-- EDIT START -->
            <edit-child
                style="z-index: 100;"
                v-if="editChildShow"
                v-bind:side-bar-show.sync="sideBarShow"
                v-bind:current-children.sync="currentChildren"
                v-bind:edit-child-show.sync="editChildShow"
                v-bind:selected-child.sync="selectedChild"
                ></edit-child>
            <!-- EDIT END -->
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid" id="dashboardMain">
                <!-- BODYDASHBOARD START -->
                <body-dashboard-personal
                    v-bind:current-children.sync="currentChildren"
                    v-bind:selected-child.sync="selectedChild"
                    v-bind:edit-child-show.sync="editChildShow"
                    v-bind:get-previous-quotes="getPreviousQuotes"
                    v-bind:previous-quotes.sync="previousQuotes"
                    v-bind:open-add-quote-form="openAddQuoteForm"
                    v-bind:hasClass="hasClass"></body-dashboard-personal>
                <!-- BODYDASHBOARD END -->

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentChildren: [],
                selectedChild: 'none',
                sideBarShow: true,
                addQuoteShow: false,
                editChildShow: false,
                addChildShow: false,
                previousQuotes: [],
            }
        },
        ready () {
            this.init();
        },
        methods: {
            init: function () {
                this.getChildren();
            },
            openAddQuoteForm: function () {
                this.addQuoteShow = true;
                this.editChildShow = false;
                this.addChildShow = false;
                this.sideBarShow = false;
            },
            openAddChildForm: function () {
                this.addChildShow = true;
                this.editChildShow = false;
                this.addQuoteShow = false;
                this.sideBarShow = false;
            },
            openEditChildForm: function () {
                this.editChildShow = true;
                this.addQuoteShow = false;
                this.addChildShow = false;
                this.sideBarShow = false;
            },
            getChildren: function () {
                this.$http.get('/api/child').then((success_response) => {
                    this.$set('currentChildren', JSON.parse(success_response.body));
                    this.$nextTick(function(){
                        this.$broadcast('data-arrived', JSON.parse(success_response.body));
                    });
                },
                (error_response) => {
                    alert('Error, we could not find your children. We are sorry... But in the meantime, look at this puppy!');
                });
            },
            getPreviousQuotes: function (id) {
                //get previous quotes from current child
                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body);
                },
                (error_response) => {
                    alert('error');
                });
            },
            showPanel: function () {
                this.addQuoteShow = true;
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            }
        }
    }
</script>

<style lang="css" scoped>

</style>
