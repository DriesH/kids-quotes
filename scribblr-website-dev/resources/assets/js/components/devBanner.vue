<template lang="html">
    <div class="banner" v-bind:style="{backgroundImage: 'url(../img/banner-background-personal.jpg)'}">
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
                showButton: false
            }
        },
        computed: {},
        ready () {
            this.showBannerText = true;
            this.showButton = true;
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
