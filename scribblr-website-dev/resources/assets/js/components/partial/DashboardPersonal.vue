<template lang="html">
    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <side-bar-dashboard v-bind:current-children.sync="currentChildren"></side-bar-dashboard>
            <add-quotes-dashboard></add-quotes-dashboard>
            <body-dashboard-personal></body-dashboard-personal>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentChildren: [

                ]
            }
        },
        computed: {},
        ready () {
            this.init();
        },
        methods: {
            init: function () {
                this.getChildren();
            },
            getChildren: function () {
                this.$http.get('/api/child').then((success_response) => {
                    // this.currentChildren = JSON.parse(success_response.body);
                    // console.log(this.currentChildren);

                    this.$set('currentChildren', JSON.parse(success_response.body));
                    this.$nextTick(function(){
                        this.$broadcast('data-arrived', JSON.parse(success_response.body));
                        console.log('Working.');
                    });


                },
                (error_response) => {
                    alert('error');
                });
            }
        },
        components: {}
    }
</script>

<style lang="css">
</style>
