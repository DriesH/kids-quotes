<template lang="html">
    <div class="col-sm-12 col-md-12 main">

        <div class="jumbotron" v-if="state == 0">
            <h1>Brainstorm tool</h1>
            <p>
                If you are using this tool in a group, we recommend you to use the 'Brain writing' technique. Everyone in the group has a pen and a sheet of paper. Look at the randomly selected quote and write the first thing that comes to mind when you read the quote and see the illustration next to it. When everyone has finished writing down one word or idea, rotate your sheet to the person sitting next to you. Now build off what the others wrote on their paper. Continue doing this until everyone has written on everyone else's sheet. This way, every idea has a different and unique approach to it. This technique combined with the genius way that children think, makes for a great and innovative brainstorm session!
            </p>
        </div>


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
                if(this.data.length > 0) {
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
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>

</style>
