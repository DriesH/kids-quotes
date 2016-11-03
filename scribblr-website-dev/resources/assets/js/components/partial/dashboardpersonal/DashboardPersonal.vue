<template lang="html">
    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <side-bar-dashboard
            v-bind:current-children.sync="currentChildren"
            v-bind:selected-child.sync="selectedChild"
            v-bind:add-quote-show.sync="addQuoteShow"
            v-bind:edit-child-show.sync="editChildShow"></side-bar-dashboard>

            <body-dashboard-personal
            v-bind:selected-child.sync="selectedChild"
            v-bind:edit-child-show.sync="editChildShow"
            v-bind:get-previous-quotes="getPreviousQuotes"
            v-bind:previous-quotes.sync="previousQuotes"></body-dashboard-personal>
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
                previousQuotes: []
            }
        },
        computed: {},
        ready () {
            this.init();
        },
        methods: {
            init: function () {
                this.getChildren();
                var self = this;
                $('#sidebar-div').on('click', function(e) {
                    if (e.target !== this)
                        return;

                    self.selectedChild = 'none';

                    $('[id^=child_]').each(function(){
                        $(this).removeClass('active');
                    });
                });

            },
            getChildren: function () {
                this.$http.get('/api/child').then((success_response) => {
                    this.$set('currentChildren', JSON.parse(success_response.body));
                    this.$nextTick(function(){
                        this.$broadcast('data-arrived', JSON.parse(success_response.body));
                        //console.log('Working.');
                    });
                },
                (error_response) => {
                    alert('Error, we could not find your children. We are sorry... But in the meantime, look at this puppy!');
                });
            },
            getPreviousQuotes: function (id, previousQuotes) {
                //get previous quotes from current child
                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body);
                    //anders werkt het niet
                    var self = this;
                    this.initSal = false;
                    setTimeout(function() {
                        if(!self.initSal) {
                            salvattore.init();
                            self.initSal = true;
                        }
                    }, 0);
                },
                (error_response) => {
                    alert('error');
                });
            },
            showPanel: function () {
                this.addQuoteShow = true;
            },

        },
        components: {}
    }
</script>

<style lang="css">

</style>
