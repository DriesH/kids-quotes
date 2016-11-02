<template lang="html">
    <div>
        <div class="jumbotron" v-if="state == 0">
            <h1>Select themes yourself</h1>
            <h5>(not so random!)</h5>
            <p>
                If you don't want randomness, click here!
            </p>
            <button type="button" name="button" class="btn btn-default center-block" @click="state=2"><i class="fa fa-lightbulb-o"></i> LET'S GO!</button>
        </div>

        <div v-if="state == 2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <select class="styled-select" style="color: black;" v-model="themeSelected">
                        <option value="" disabled selected>Select your theme</option>
                        <option v-for="theme in themes" value="{{ theme.theme_name }}">{{ theme.theme_name }}</option>
                    </select>
                    <div class="jumbotron">
                        <h1>{{ quote }}</h1>
                        <p>
                            {{ themeSelected }}
                        </p>
                        <img v-if="illustration" class="illustration" :src="path + illustration" alt="{{illustration}}" />
                    </div>
                    <button type="button" name="generate" class="btn btn-primary center-block" @click="randomize"><i class="fa fa-undo"></i> RANDOM QUOTE</button>
                </div>
            </div>
            <button type="button" name="button" @click="state=0" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'state',
            'data',
            'path'
        ],
        data () {
            return {
                themes: [],
                themeSelected: '',
                quotes: [],
                quote: '',
                illustration: '',
                previousKey: ''
            }
        },
        computed: {},
        ready () {
            this.$http.get('api/business/themes').then((success_response) => {
                this.themes = success_response.body;
            }, (error_response) => {
                alert('error');
            });
        },
        watch: {
            themeSelected: function(value) {
                this.quote = '';
                this.illustration = '';
                this.quotes = [];
                for(var i = 0; i < this.data.length; i++) {
                    if(this.data[i].theme.theme_name == value) {
                        this.quotes.push(this.data[i]);
                    }
                }
            }
        },
        methods: {
            randomize: function() {
                if(this.quotes.length > 0) {
                    var randomkey = Math.floor((Math.random() * this.quotes.length));
                    if( this.previousKey !== randomkey ) {
                        this.quote = this.quotes[randomkey].quote.quote;
                        this.illustration = this.quotes[randomkey].illustration_name;
                        this.previousKey = randomkey;
                    }
                    else{
                        this.randomize();
                    }
                }
                else{
                    this.quote = "No quotes from this theme!"
                }

            }
        },
        components: {}
    }
</script>

<style lang="css">
    .illustration {
        width: 50%;
        height: auto;
        margin-left: 25%;
        margin-right: 25%;
    }

    .styled-select {
        background: #eee;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 25px;
        border: none;
    }
</style>
