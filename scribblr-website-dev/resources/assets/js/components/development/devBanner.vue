<template lang="html">
    <div class="banner" :style="{backgroundImage: 'url(../img/' + bannerBackground + ')'}">
        <div class="banner-text-area">
            <div class="container">
                <div class="banner-inner-text">
                    <h1 v-if="showBannerText" transition="fadeDown"><span>Memories for later.</span></h1>
                    <div id="button-undertext" v-if="showButton" transition="fadeDown">
                        <button type="button" name="button" class="signup-btn" >Sign up now.</button>
                        <p>
                            <span>It's free.</span>
                        </p>
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
                showBannerText: false,
                showButton: false,

                personal: '/personal',
                business: '/business',

                personalBG: 'banner-background-personal.jpg',
                businessBG: 'banner-background-business.jpg',

                bannerBackground: this.personalBG,

                subTextBtnPersonal: "It's free.",
                subTextBtnBusiness: "For as low as 9.99$&#47;month.",

                subTextBtn: this.subTextBtnPersonal,

                bannerMessagePersonal: 'Memories for later.',
                bannerMessageBusiness: 'The best ideas are born in the mind of a child.',

                bannerMessage: this.bannerMessagePersonal

            }
        },
        computed: {},
        ready () {
            this.showBannerText = true;
            this.showButton = true;

            switch ( window.location.pathname ) {
                case this.personal:
                    this.bannerBackground = 'banner-background-personal.jpg';
                    break;
                case this.business:
                    this.bannerBackground = 'banner-background-business.jpg';
                    break;
            }
        },
        attached () {},
        methods: {},
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
        height: 928px;
        width: 100%;
    }

    .banner-text-area {
        padding-top: 80px;
        text-align: center;
    }

    .banner-inner-text {
        margin-top: 380px;
    }

    button:focus {
        outline: 0;
    }

    .signup-btn {
        width: 450px;
        height: 65px;
        background: none;
        border-radius: 15px;
        border: 2px white solid;
        color: white;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
        font-size: 35px;
        padding: 0px;
        transition: 0.3s background-color, 0.3s color;
        margin-top: 120px;
    }

    .signup-btn:hover {
        background-color: white;
        color: rgba(0, 0, 0, 1);
    }

    p span {
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        font-size: 16px;
        color: white;
    }

    p {
        margin-top: 14px;
    }


</style>
