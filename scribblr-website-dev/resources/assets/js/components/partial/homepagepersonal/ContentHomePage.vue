<template lang="html">
    <a href="#" class="center-block arrow" @click="scrollDown"><i class="fa fa-angle-double-down"></i></a>
    <div class="content">
        <div class="container">
            <div class="row animated bottom-line" transition="fadeLeft" v-show="showContentText">
                <div class="col-sm-5 col-md-6">
                    <div class="titles">
                        <h1>What is Scribblr?</h1>
                        <h2>A platform for remembering your little one's quotes.</h2>
                    </div>
                    <div class="content-text">
                        <p>
                            On Scribblr you can add your children’s best quotes. You can put them
                            over all kinds of preset backgrounds, or upload your own.
                            Of course you shouldn't keep these amazing quotes all to yourself.
                            Share them on social media to put a smile on your friends' faces!
                        </p>
                    </div>
                </div>

                <div class="col-sm-7 col-md-5">
                    <div class="pictures">
                        <img class="img-responsive" src="/img/boat.png" alt="boat quote" />
                    </div>
                </div>
            </div>

            <div class="row animated top-buffer" transition="fadeRight" v-show="showContentText">
                <div class="col-sm-5 col-md-6">
                    <div class="titles">
                        <h1>Quick and easy!</h1>
                    </div>
                    <div class="content-text">
                        <p>
                            You are only a few clicks away from making your children's quotes memories you will never forget. <strong>Litteraly.</strong>
                            Creating an account for personal use is completely free of charge and you can start making quotes immediately.
                            Create an account. Add your children. Start adding their quotes whenever and wherever you want.
                            Easy as pie!
                        </p>
                    </div>
                </div>

                <div class="col-sm-7 col-md-5">
                    <div class="pictures">
                        <img class="img-responsive" src="/img/moon.png" alt="moon quote" />
                    </div>
                </div>
            </div>

            <div class="row animated top-buffer bottom-buffer" transition="fadeLeft" v-show="showContentText">
                <div class="col-sm-5 col-md-6">
                    <div class="titles">
                        <h1>Still want the real thing?</h1>
                    </div>
                    <div class="content-text">
                        <p>
                            Most people still like having those old photobooks lying around the house.
                            Well, we at Scribblr share that feeling with you. That why we give you the option
                            to print the most adorable physical copy of your most favorite quotes.
                        </p>
                    </div>
                </div>

                <div class="col-sm-7 col-md-5">
                    <div class="pictures">
                        <img class="img-responsive photobook" src="/img/photobook.jpg" alt="scribblr personal photobook" />
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                showContentText: false,
                navBarBackground: false
            }
        },
        computed: {},
        ready () {
            window.addEventListener('scroll', this.showText);
        },
        attached () {},
        methods: {
            showText: function () {
                if(window.scrollY >= 200){
                    this.showContentText = true;
                }
                else{
                    this.showContentText = false;
                }
            },
            scrollDown: function () {
                window.scrollTo(0, 750);
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
    .photobook {
        border-radius:30px;
    }
    .content {
        margin-top: 100px;
        height: 924px;
        width: 100%;
    }

    .titles{
        font-family: "Source Sans Pro", sans-serif;
        color: black !important;
        font-weight: bold !important;
    }

    .titles h1 {
        font-size: 50px;
        font-weight: bold !important;
    }

    .titles h2 {
        font-size: 35px;
        font-weight: bold !important;
    }

    .content-text {
        font-family: "Source Sans Pro", sans-serif;
        color: black;
        width: 520px;
        font-size:1.5em;
        font-weight: normal;
    }



    .top-buffer{
        margin-top: 100px;
    }

    .arrow{
        text-align: center;
        font-size: 4em;
        color: rgb(99, 99, 99);
    }

    .arrow:hover{
        cursor: default;
    }

    .arrow>i:hover{
        cursor: pointer;
        color: rgb(149, 149, 149);
    }

    .bottom-buffer {
        margin-bottom: 150px;
    }

    /*media queries*/
    @media screen and (max-width: 991px) {
        .small_pic {
            display: none;
        }
    }

</style>
