<template lang="html">
    <nav>
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand pull-left lobster logo" href="/">
                    Scribblr
                    <span class="sub-logo">Personal</span>
                </a>

            </div>
            <ul class="nav navbar-nav navbar-right login-reg">
                <li><a href="">For Your Business</a></li>
                <li class="devider">|</li>
                <li><a href="">Sign up</a></li>
                <li><a href="">Log In</a></li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        data () {
            return {}
        },
        computed: {},
        ready () {},
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
        position: fixed;
    }

    .lobster {
        font-family: 'Lobster', cursive;
        color: white;
    }

    .logo {
        font-size: 30px;
        padding: 27px 15px !important;
    }

    .logo:hover, .logo:hover>.sub-logo {
        color: rgb(255, 135, 153);
        background: none;
    }

    .sub-logo {
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        font-size: 16px;
        color: white;
        display: block;
        margin-left: 30px;
    }

    .login-reg>li>a {
        color: white;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .login-reg>li>a:hover {
        color: rgb(255, 135, 153);
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
