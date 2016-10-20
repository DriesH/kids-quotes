<template lang="html">
    <nav class="navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand pull-left lobster logo" :href="current">
                    Scribblr
                    <span class="sub-logo">{{ $parent.data[0].name }}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right login-reg">
                    <li><a :href="$parent.data[0].switchHref">{{ $parent.data[0].switchHrefText }}</a></li>
                    <li class="devider">|</li>

                    <li v-if="data.user === null"><a href="/login">Log In</a></li>
                    <li v-if="data.user === null"><a href="/register">Sign up</a></li>

                    <li v-if="data.user !== null"><a href="#">{{ data.user.name }}</a></li>
                    <li v-if="data.user !== null"><a href="/logout">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        data () {
            return {
                current: window.location.pathname, //fix later slechte oplossing!!
                data: {
                    user: user.isLoggedIn
                }
            }
        },
        computed: {

        },
        ready () {
        },
        attached () {},
        methods: {},
        components: {}
    }
</script>

<style lang="css" scoped>
    nav {
        width: 100%;
        height: 80px;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .lobster {
        font-family: 'Lobster', cursive;
        color: white;
    }

    .logo {
        font-size: 30px;
        padding: 27px 15px !important;
        transition: 0.3s color;
    }

    .sub-logo {
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        font-size: 16px;
        color: white;
        display: block;
        margin-left: 30px;
        transition: 0.3s color;
    }

    .logo:hover, .logo:hover>.sub-logo {
        color: rgb(190, 11, 62);
        background: none;
    }

    .login-reg>li>a {
        color: white;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        padding-top: 30px;
        padding-bottom: 30px;
        transition: 0.3s color;
    }

    .login-reg>li>a:hover {
        color: rgb(190, 11, 62);
        background: none;
    }

    .devider {
        color: white;
        font-family: 'Source Sans Pro', sans-serif;
        padding-top: 19px;
        padding-bottom: 22.5px;
        line-height: 35px;
        font-size: 30px;
    }



</style>
