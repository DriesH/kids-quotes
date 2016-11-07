<template lang="html">
    <div class="banner" :style="{backgroundImage: 'url(../img/' + data[0].bannerBg + ')'}">
        <div class="banner-text-area">
            <div class="container">
                <div class="banner-inner-text">
                    <h1 v-if="showBannerText" transition="fadeDown"><span>{{ data[0].bannerMsg }}</span></h1>
                    <div id="button-undertext" v-if="showButton" transition="fadeDown">

                        <a v-if="data[0].name == 'Personal'" class="signup-btn" href="/register">Sign up now.</a>
                        <a v-else style="cursor:pointer;" class="signup-btn" @click="scrollDown($event)">Sign up now.</a>
                        <p>
                            <span>{{ data[0].subTextBtn }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'data'
        ],
        data () {
            return {
                showBannerText: false,
                showButton: false
            }
        },
        computed: {},
        ready () {
            this.showBannerText = true;
            this.showButton = true;
        },
        attached () {},
        methods: {
            scrollDown: function (e) {
                e.preventDefault();
                window.scrollTo(0, document.body.scrollHeight);
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
    h1 span {
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        color: white;
        font-size: 85px;
    }

    .banner {
        background-position: center;
        background-size: cover;
        max-height: 928px;
        width: 100%;
        min-height: 90vh;
    }

    .banner-text-area {
        padding-top: 80px;
        text-align: center;
    }

    .banner-inner-text {
        margin-top: 30vh;
    }

    #button-undertext {
        margin-top: 80px;
    }

    a:focus {
        outline: 0;
    }

    .signup-btn {
        padding: 20px 45px !important;
        width: 450px;
        height: 65px;
        background: none;
        border-radius: 15px;
        border: 2px white solid;
        color: white;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
        font-size: 35px;
        transition: 0.3s background-color, 0.3s color;
        margin-top: 80px;
    }

    .signup-btn:hover {
        background-color: white;
        color: rgba(0, 0, 0, 1);
        text-decoration: none;
    }

    p span {
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        font-size: 16px;
        color: white;
    }

    p {
        margin-top: 35px;
    }

    @media screen and (max-width: 767px) {
        h1 span {
            font-size: 55px;
        }
        .signup-btn {
            width: 250px;
            height: 45px;
            font-size: 25px;
        }
        .banner {
            background-position: -175px;
            background-size: cover;
            height: 100vh;
        }
    }



</style>
