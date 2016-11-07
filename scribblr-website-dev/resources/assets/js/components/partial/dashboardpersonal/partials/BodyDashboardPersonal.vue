<template lang="html">
    <div class="row placeholders main">
        <div class="pull-left">
            <button @click="toggleNav($event)"
                type="button"
                name="button"
                class="btn btn-primary"><i class="fa fa-bars"></i>
            </button>
        </div>
        <div v-if='selectedChild !== "none"'>
            <!-- ADD QUOTE BTN START  -->
            <div class="add-btn">
                <button
                type="button"
                name="button"
                class="btn btn-success center-block"
                @click="openAddQuoteForm($event)">
                    <i class="fa fa-plus"></i>  ADD NEW QUOTE
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
                :watch="previousQuotes">

                <waterfall-slot
                    v-for="quote in previousQuotes"
                    :width="380"
                    :height="380"
                    :move-class="item-move">

                    <div class="item"
                        v-if="previousQuotes.length > 0">

                        <div class="quote">
                            <div class="show-image">

                                <img class="img-responsive" v-if="quote.preset_background"
                                :src="path + quote.preset_background.background_filename" />
                                <img class="img-responsive" v-else
                                :src="path + quote.backgr_with_quote" />

                                <button class="share btn btn-primary"
                                    type="button"
                                    name="share"
                                    value="Share"
                                    @click="shareImage(quote.backgr_with_quote)">
                                    <i class="fa fa-facebook-official"></i> Share
                                </button>
                                <button class="delete btn btn-danger"
                                    type="button"
                                    name="name"
                                    value="Delete"
                                    @click="deleteQuote(quote.id)"><i class="fa fa-trash-o"></i> Delete</button>

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
            <h1>{{{ randomQuote }}}</h1>
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
            currentChildren: {
                type: Array
            },
            openAddQuoteForm: {
                type: Function
            },
            toggleNav: {
                type: Function
            }
        },
        data () {
            return {
                path: 'pictures/uploadedbackground/withoutquote/',
                randomQuote: "",
                randomQuotesArray: [
                    "Let\'s start Scribblin\'!",
                    "Everyday I\'m Scribblin\'!",
                    "\“Every child is an artist. The problem is how to remain an artist once we grow up.\”<br />-Pablo Picasso",
                    "\“Children see magic because they look for it.\”<br />-Christopher Moore",
                    "\“It\'s never too late to have a happy childhood.\”<br />-Tom Robbins",
                    "\“You must give everything to make your life as beautiful as the dreams that dance in your imagination.\”<br />-Roman Payne",
                    "\“Childhood means simplicity. Look at the world with the child\'s eye. it is very beautiful.\” <br />-Kailash Satyarthi"
                    ]
            }
        },
        computed: {},
        ready () {
            this.showRandomQuote();
        },
        watch:{
            selectedChild: function (value) {
                if(this.selectedChild !== 'none') {
                    this.getPreviousQuotes(this.selectedChild, this.previousQuotes);
                }
                else {
                    this.showRandomQuote();
                }
                //remove add show if switching from child
                this.addQuoteShow = false;
                //remove edit if switching from child
                this.editChildShow = false;
            },
            editChildShow: function (value) {

            },
            previousQuotes: function(value) {

            }
        },
        methods: {
            shareImage: function(imageWithExt){
                var shareurl = 'scribblr.local/img/' + imageWithExt;
                $('head').append('<meta property="og:title" content="Coaches Wisdom Telesummit" />');
                window.open('https://www.facebook.com/sharer/sharer.php?u='+escape(shareurl)+'&t='+document.title, '',
                'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
                return false;
            },
            deleteQuote: function (id) {
                this.$http.get('api/quote/delete/' + id).then((success_response) => {
                    var index = this.previousQuotes.findIndex(x => x.id==id); //get the index of the object in the array.
                    this.previousQuotes.splice(index, 1); //delete the object in the array.
                }, (error_response) => {
                    alert("error");
                });
            },
            showRandomQuote: function () {
                this.randomQuote = this.randomQuotesArray[Math.floor(Math.random() * this.randomQuotesArray.length)];
            }
        }
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
        padding: 10%;
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
        text-shadow: 2px 2px 0px #000;
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
    .quoteBox {
        white-space: normal;
        word-break: normal;
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
        z-index: 10;
    }
    .show-image button.share {
        top:45%;
        left:15%;
        box-shadow: 1px 3px 8px rgba(0, 0, 0, 0.4);
    }
    .show-image button.delete {
        top:45%;
        right:15%;
        box-shadow: 1px 3px 8px rgba(0, 0, 0, 0.4);
    }
    @media screen and (max-width: 767px) {
        .quote_text {
            font-size: 22px;
        }
    }
</style>
