<template lang="html">
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
                            <img class="small_pic" src="/img/boat.png" alt="boat quote" />
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
                            You are only a few clicks away from making your children's quotes memories you will never forget. <strong>litteraly.</strong>
                            Creating an account for personal use is completely free of charge and you can start making quotes immediately.
                            Create an account. Add your children. Start adding their quotes whenever and wherever you want.
                            Easy as pie!
                        </p>
                    </div>
                </div>

                <div class="col-sm-7 col-md-5">
                    <div class="pictures">
                            <img class="small_pic" src="/img/moon.png" alt="boat quote" />
                    </div>
                </div>
            </div>

            <div class="row animated top-buffer" transition="fadeLeft" v-show="showContentText">
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
                            <img class="small_pic" src="/img/photo-book.png" alt="boat quote" />
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
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
    .content {
        margin-top: 100px;
        height: 924px;
        width: 100%;
    }

    .titles{
        font-family: "Source Sans Pro", sans-serif;
        color: #442061;
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
        font-weight: 600;
        width: 520px;
        font-size: 16px;
    }

    .small_pic {
        width: 50%;
        height: auto;
        right: 20px;
        position: absolute;
    }

    .top-buffer{
        margin-top: 100px;
    }

    /*media queries*/
    @media screen and (max-width: 991px) {
        .small_pic {
            display: none;
        }
    }

</style>
