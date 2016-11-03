<template lang="html">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row placeholders">
            <div v-if='selectedChild !== "none"'>
                <!-- ADD QUOTE BTN START  -->
                <div class="add-btn">
                    <button
                    type="button"
                    name="button"
                    class="btn btn-success center-block"
                    @click="openAddQuoteForm">
                        <i class="fa fa-plus"></i>  ADD NEW QUOTE (id: {{selectedChild}})
                    </button>
                </div>
                <!-- ADD QUOTE BTN END -->

                <!-- GRID WITH QUOTES START -->
                <waterfall
                    :line="-"
                    :line-gap="400"
                    :min-line-gap="200"
                    :max-line-gap="400"
                    :interval="50"
                    :watch="previousQuotes"
                >
                    <waterfall-slot
                        v-for="quote in previousQuotes"
                        :width="380"
                        :height="380"
                        :move-class="item-move"
                    >

                        <div class="item"
                            v-if="previousQuotes.length > 0"
                        >

                            <div class="quote">
                                <div class="show-image">

                                    <img class="img-responsive" v-if="quote.preset_background"
                                    :src="path + quote.preset_background.background_filename" />
                                    <img class="img-responsive" v-else
                                    :src="path + quote.backgr_with_quote" />

                                    <button class="update btn btn-warning" type="button" name="name" value="Update"><i class="fa fa-pencil"></i> Update</button>
                                    <button class="delete btn btn-danger" type="button" name="name" value="Delete"><i class="fa fa-trash-o"></i> Delete</button>

                                    <span class="quote_text">
                                        <p class="quoteBox">{{ quote.quote }}</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </waterfall-slot>
                </waterfall>
                <!-- GRID WITH QUOTES END -->
            </div>

            <div v-else id='quote-overview-text'>
                <h1>Quote that inspires you!</h1>
            </div>


            <!-- ADDQUOTES START -->
            <add-quotes-dashboard
                style="z-index: 100;"
                v-if="addQuoteShow"
                v-bind:add-quote-show.sync="addQuoteShow"
                v-bind:selected-child.sync="selectedChild"
                v-bind:previous-quotes.sync="previousQuotes"
                :class="{ 'overlay-sidebar-shadow': addQuoteShow }"></add-quotes-dashboard>
            <!-- ADDQUOTES START -->

            <!-- ADDQUOTES START -->
            <edit-child
                style="z-index: 100;"
                v-if="editChildShow"
                v-bind:edit-child-show.sync="editChildShow"
                v-bind:selected-child.sync="selectedChild"
                :class="{ 'overlay-sidebar-shadow': editChildShow }"></edit-child>
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
            },
            getPreviousQuotes: {
                type: Function
            },
            previousQuotes: {
                type: Array
            },
        },
        data () {
            return {
                addQuoteShow: false, //show - hide form add quote

                path: 'pictures/uploadedbackground/withoutquote/',
                initSal: false
            }
        },
        computed: {},
        ready () {},
        watch:{
            selectedChild: function (value) {
                if(this.selectedChild !== 'none') {
                    this.getPreviousQuotes(this.selectedChild, this.previousQuotes);
                }
            },
            editChildShow: function (value) {
                console.log('editChild in body dashboard is: ' + value);
            },
            previousQuotes: function(value) {

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

    .item-move {
        transition: all .5s cubic-bezier(.55,0,.1,1);
        -webkit-transition: all .5s cubic-bezier(.55,0,.1,1);
    }


    .show-image {
        position: relative;
        float:left;
        margin:5px;
        border-radius: 10px;

    }

    .show-image img {
        transition: 0.5s filter;
    }

    .show-image:hover img{
        -webkit-filter: grayscale(100%);
    }
    .show-image:hover button {
        display: block;
    }
    .show-image button {
        position:absolute;
        display:none;
    }
    .show-image button.update {
        top:45%;
        left:15%;
        box-shadow: 1px 3px 8px rgba(0, 0, 0, 0.4);
    }
    .show-image button.delete {
        top:45%;
        right:15%;
        box-shadow: 1px 3px 8px rgba(0, 0, 0, 0.4);
    }


</style>
