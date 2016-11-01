<template lang="html">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row placeholders">
            <div v-if='selectedChild !== "none"'>
                <!-- ADD QUOTE BTN START -->
                <div class="add-btn col-md-12 col-xs-12 col-lg-12">
                    <button type="button" name="button" class="btn btn-success center-block" @click="openAddQuoteForm"><i class="fa fa-plus"></i>  ADD NEW QUOTE (id: {{selectedChild}})</button>
                </div>
                <!-- ADD QUOTE BTN END -->

                <!-- GRID WITH QUOTES START -->
                <div id="grid" data-columns v-if="previousQuotes !== ''">
                    <div v-for="quote in previousQuotes">
                        <div class="quote">
                            <img :src="path + standardBackground[quote.preset_background_id]" />
                            <span class="quote_text"><p class="quoteBox">{{ quote.quote }}</p></span>
                        </div>

                    </div>
                </div>
                <!-- GRID WITH QUOTES END -->
            </div>

            <div v-else id='quote-overview-text'>
                <h1>Quote that inspires you!</h1>
            </div>


            <!-- ADDQUOTES START -->
            <add-quotes-dashboard v-if="addQuoteShow" style="z-index: 100;" v-bind:add-quote-show.sync="addQuoteShow" v-bind:selected-child.sync="selectedChild" :class="{ 'overlay-sidebar-shadow': addQuoteShow }"></add-quotes-dashboard>
            <!-- ADDQUOTES START -->

            <!-- ADDQUOTES START -->
            <edit-child v-if="editChildShow" style="z-index: 100;" v-bind:edit-child-show.sync="editChildShow" v-bind:selected-child.sync="selectedChild" :class="{ 'overlay-sidebar-shadow': editChildShow }"></edit-child>
            <!-- ADDQUOTES END -->


        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'selectedChild',
            'editChildShow'
        ],
        data () {
            return {
                addQuoteShow: false, //show - hide form add quote
                previousQuotes: '',
                standardBackground: [
                    'chalkboard.jpg',
                    'paper.jpg',
                    'wood.jpg'
                ],
                path: 'pictures/uploadedbackground/withoutquote/',
                editChildShow: false
            }
        },
        computed: {},
        ready () {},
        watch:{
            selectedChild: function (value) {

                if(this.selectedChild !== 'none') {
                    this.getPreviousQuotes(this.selectedChild);
                }
            },
            editChildShow: function (value) {
                console.log('editChild in body dashboard is: ' + value);

            }
        },
        methods: {
            openAddQuoteForm: function () {
                this.addQuoteShow = true;
                var sideBar = document.getElementById('sidebar-div');
                if(!this.hasClass(sideBar, 'overlay-sidebar-shadow')) {
                    sideBar.className += ' overlay-sidebar-shadow';
                }
            },
            getPreviousQuotes: function (id) {
                //get previous quotes from current child
                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body);
                    //anders werkt het niet
                    setTimeout(function() {
                        if(!this.initSal) {
                            console.log('hello from the other side');
                            salvattore.init();
                            this.initSal = true;
                        }
                    }, 0);
                },
                (error_response) => {
                    alert('error');
                });
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
    .add-btn {
        padding: 5px;
        margin-bottom: 21px;
    }
    #quote-overview-text h1{
        font-family: 'Lobster', cursive;
        color: #34495e;
        text-shadow: rgb(224, 224, 224) 1px 1px 0px;
        font-size: 5em;
        padding: 20%;
    }
    #grid img {
        width: 100%;
        height: auto;
        margin: auto;
    }
    .quote {
        position: relative;
        overflow: hidden;
    }
    .quote img {
        border-radius: 10px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .quote_text {
        color: white;
        font-size: 40px;
        font-family: 'Amatic', cursive;
        position: absolute;
        top: 20px;
        left: 10px;
        word-break: break-all;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .quote_text:hover{
        cursor: default;
    }
</style>
