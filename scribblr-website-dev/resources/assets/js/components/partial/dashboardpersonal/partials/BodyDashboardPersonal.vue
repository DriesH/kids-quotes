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
                <div id="grid" data-columns v-if="previousQuotes.length > 0">
                    <div v-for="quote in previousQuotes">
                        <div class="quote">

                            <img v-if="quote.preset_background" :src="path + quote.preset_background.background_filename" />
                            <img v-else :src="path + quote.backgr_with_quote" />

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
        props: {
            selectedChild: {
                type: [String, Number]
            },
            editChildShow: {
                type: Boolean,
                default: false
            }
        },
        data () {
            return {
                addQuoteShow: false, //show - hide form add quote
                previousQuotes: [],
                path: 'pictures/uploadedbackground/withoutquote/',
                initSal: false
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
        margin-bottom: 10px;
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
