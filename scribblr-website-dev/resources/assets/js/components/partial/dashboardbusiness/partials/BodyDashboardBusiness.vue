<template lang="html">
    <div class="col-sm-12 col-md-12 main">
        <brainstorm-tool
        v-bind:state.sync="state"
        v-bind:quote.sync="quote"
        v-bind:theme.sync="theme"
        v-bind:illustration.sync="illustration"
        v-bind:path.sync="path"></brainstorm-tool>

        <themes-tool
        v-bind:state.sync="state"
        v-bind:data.sync="data"
        v-bind:path.sync="path"></themes-tool>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                data: [],
                quote: '',
                theme: '',
                illustration: '',
                state: 0, //state 0 is show all info, state 1 show brainstorm tool, state 2 show theme select tool
                alreadyShown: [],
                previousKey: null,
                path: '/business_imgs/'
            }
        },
        computed: {},
        ready () {
            this.getRandomQuote();
        },
        watch: {

        },
        methods: {
            getRandomQuote: function() {
                this.$http.get('api/business/randomquote').then((success_response) => {
                    this.data = success_response.body;
                    this.randomize();
                }, (error_response) => {
                    alert('error');
                });
            },
            randomize: function() {
                var randomkey = Math.floor((Math.random() * this.data.length));
                if( this.previousKey !== randomkey ) {
                    this.quote = this.data[randomkey].quote.quote;
                    this.theme = this.data[randomkey].theme.theme_name;
                    this.illustration = this.data[randomkey].illustration_name;
                    this.previousKey = randomkey;
                }
                else{
                    this.randomize();
                }
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>

</style>
