<template lang="html">
    <nav class="navbar-fixed-top" :class="{ 'nav-background' : navBarBackground }">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand pull-left lobster logo" :href="'/' + data.current">
                    Scribblr
                    <span class="sub-logo">{{ ajaxData[0].name }}</span>

                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right login-reg">
                    <li><a :href="ajaxData[0].switchHref">{{ ajaxData[0].switchHrefText }}</a></li>
                    <li class="devider">|</li>

                    <li v-if="!data.user.isLoggedIn"><a href="/login">Log In</a></li>
                    <li v-if="!data.user.isLoggedIn"><a href="/register">Sign up</a></li>

                    <li v-if="data.user.isLoggedIn"><a style="cursor: default;">{{ data.user.name }} <i class="fa fa-user"></i></a></li>
                    <li v-if="data.user.isLoggedIn"><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        data () {
            return {
                data: {
                    current: currentVersion,
                    user: {
                        isLoggedIn: isLoggedIn,
                        name: userName
                    }
                },
                navBarBackground: false,
                ajaxData: [

                ]
            }
        },
        computed: {

        },
        ready () {
            window.addEventListener('scroll', this.showNavBackground);

            switch (this.data.current) {
                case 'personal':
                    this.$http.get('/api/personal/data').then((succes_response) => {
                        this.ajaxData = JSON.parse(succes_response.body);
                    },
                    (error_callback) => {
                        this.ajaxData = JSON.parse(error_callback.body);
                    });
                    break;
                case 'business':
                    this.$http.get('/api/business/data').then((succes_response) => {
                        this.ajaxData = JSON.parse(succes_response.body);
                    },
                    (error_callback) => {
                        this.ajaxData = JSON.parse(error_callback.body);
                    });
                    break;
            }
        },
        attached () {},
        methods: {
            showNavBackground: function () {
                if(window.scrollY >= 5){
                    this.navBarBackground = true;
                }
                else{
                    this.navBarBackground = false;
                }
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
    .sub-logo {
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        font-size: 16px;
        color: white;
        display: block;
        margin-left: 30px;
        transition: 0.1s color;
    }

    .logo:hover, .logo:hover>.sub-logo {
        color: rgba(200, 200, 200, 1);
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
        color: rgba(200, 200, 200, 1);
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

    .nav-background {
        background: rgba(60, 60, 60, 0.6);
    }



</style>
