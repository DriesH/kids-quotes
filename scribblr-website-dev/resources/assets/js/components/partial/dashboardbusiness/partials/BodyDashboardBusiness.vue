<template lang="html">
    <div class="col-sm-12 col-md-12 main">
        <div class="jumbotron" v-if="!showTool">
            <h1>Brainstorm tool</h1>
            <p>
                If you are using this tool in a group, we recommend you to use the 'Brain writing' technique. Everyone in the group has a pen and a sheet of paper. Look at the randomly selected quote and write the first thing that comes to mind when you read the quote and see the illustration next to it. When everyone has finished writing down one word or idea, rotate your sheet to the person sitting next to you. Now build off what the others wrote on their paper. Continue doing this until everyone has written on everyone else's sheet. This way, every idea has a different and unique approach to it. This technique combined with the genius way that children think, makes for a great and innovative brainstorm session!
            </p>
            <button type="button" name="button" class="btn btn-primary center-block" @click="showTool = true"><i class="fa fa-lightbulb-o"></i> LET'S GO!</button>
        </div>

        <div v-else  transition="fade">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="jumbotron">
                        <h3>{{ quote }}</h3>
                        <p>
                            {{ theme }}
                        </p>
                        <img class="illustration" :src="path + illustration" alt="" />
                    </div>
                    <button type="button" name="generate" class="btn btn-primary center-block" @click="randomize"><i class="fa fa-undo"></i> RANDOM QUOTE</button>
                </div>
            </div>
            <button type="button" name="button" @click="showTool = false" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</button>
        </div>


        <div class="jumbotron" v-if="!showTool">
            <h1>Select themes yourself</h1>
            <p>
                If you don't want randomness, click here!
            </p>
            <button type="button" name="button" class="btn btn-primary center-block"><i class="fa fa-lightbulb-o"></i> LET'S GO!</button>
        </div>
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
                showTool: false,
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
    .illustration {
        width: 50%;
        height: auto;
        margin-left: 25%;
        margin-right: 25%;
    }
</style>
