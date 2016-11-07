<template lang="html">
    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <side-bar-dashboard
            v-bind:current-children.sync="currentChildren"
            v-bind:selected-child.sync="selectedChild"
            v-bind:add-quote-show.sync="addQuoteShow"
            v-bind:edit-child-show.sync="editChildShow"
            v-bind:toggle-side-bar="toggleSideBar"></side-bar-dashboard>

            <body-dashboard-personal
            v-bind:current-children.sync="currentChildren"
            v-bind:selected-child.sync="selectedChild"
            v-bind:edit-child-show.sync="editChildShow"
            v-bind:get-previous-quotes="getPreviousQuotes"
            v-bind:previous-quotes.sync="previousQuotes"
            v-bind:toggle-side-bar="toggleSideBar"></body-dashboard-personal>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentChildren: [

                ],
                selectedChild: 'none',
                addQuoteShow: false,
                editChildShow: false,
                previousQuotes: [],
                width: window.innerWidth,
            }
        },
        ready () {
            this.init();
        },
        methods: {
            init: function () {
                this.getChildren();
                this.listenToWindow();
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
            },
            toggleSideBar: function(e) {
                if (e !== undefined) {
                    e.preventDefault();
                }
                var sideBar = document.getElementById('sidebar-div');
                if(sideBar.style.visibility === 'visible') {
                    sideBar.style.visibility = 'hidden';
                }
                else{
                    sideBar.style.visibility = 'visible';
                }
            },
            listenToWindow: function() {
                var self = this;
                var sideBar = document.getElementById('sidebar-div');
                window.addEventListener('resize', function(){
                    this.width = window.innerWidth;
                    if(this.width > 770) {
                        if(sideBar.style.visibility === 'hidden') {
                            sideBar.style.visibility = 'visible';
                        }
                    }
                }, true);
            }
        },
        components: {}
    }
</script>

<style lang="css">

</style>
