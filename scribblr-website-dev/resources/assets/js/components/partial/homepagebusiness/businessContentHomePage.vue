<template lang="html">
    <a href="#" class="center-block arrow" @click="scrollDown"><i class="fa fa-angle-double-down"></i></a>

    <div class="container top-buffer">
        <div class="row">
            <div class="col-md-8">
                <h1 style="color:black; text-align:left; font-weight: bold; font-size: 3em; margin-top: 0;">Think like a child again.</h1>
                <p style="color:black; text-align:left; font-weight: normal; font-size: 1.5em;">
                    We all know that we lose creativity with age. With Scribblr Business edition we give your company the ability to think divergently over different ideas or problems. This way, you won't get stuck with the same old stereotypical answer, but you will start innovating!
                    Combine your company's knowledge with the creativity captured inside a child's mind to create the ideas of the future.
                </p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive img-rounded" src="/img/happy-child-bubbles.jpg" alt="happy child blowing bubles" />
            </div>
        </div>


        <div class="row top-buffer">
            <div class="col-md-8">
                <h1 style="color:black; text-align:left; font-weight: bold; font-size: 3em; margin-top: 0;">Let the storm rage on!</h1>
                <p style="color:black; text-align:left; font-weight: normal; font-size: 1.5em;">
                    Probably the best way to come up with new and innovative ideas is to think like a child. Easier said than done. NOT.
                    Scribblr Business comes with an amazing brainstorm tool for you and your company to use.
                    Each quote you get to see comes with an astonishing kid-like illustration drawn by our design team. Each and every one unique
                    and linked to the quote you see.
                    As you can see, we provide everything your company needs to come up with divergent ideas and perspectives.
                    No more excuses!
                </p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive img-rounded" src="/img/happy-child-paint.jpg" alt="happy child with paint on her face" />
            </div>
        </div>

        <div class="row top-buffer">
            <div class="col-md-8">
                <h1 style="color:black; text-align:left; font-weight: bold; font-size: 3em; margin-top: 0;">Quality or quantity? We go for both!</h1>
                <p style="color:black; text-align:left; font-weight: normal; font-size: 1.5em;">
                    Sribblr Business edition is packed with an immense amount of quotes provided from real children and their parents.
                    Our professional team is constantly updating the list of quotes to make sure you only get to see the quotes that might
                    be of value for a brainstorm.
                </p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive img-rounded" src="/img/happy-child-money.jpg" alt="happy child holding money" />
            </div>
        </div>




        <div class="row top-buffer">
            <h1 style="color:black; text-align:center; font-weight: bold; font-size: 3em;">Check out our plans!</h1>
        </div>

        <div class="row top-buffer" id='price-wrap'>
            <div class="price-box" @click="goToPayment('monthly')">
                <div class="header blue">
                    <h2>Monthly access</h2>
                    <h4><span>$</span>49.99 / month</h4>
                </div>
                <div class="body-price-box">
                    <h3>Hmm, looks good to me...</h3>
                </div>
            </div>

            <div class="price-box" @click="goToPayment('year')">
                <div class="header orange">
                    <h2>Yearly access</h2>
                    <h4><span>$</span>449.99 / year</h4>
                </div>
                <div class="body-price-box">
                    <h3>I need this one!</h3>

                </div>
            </div>

            <div class="price-box" @click="goToPayment('permanent')">
                <div class="header grey">
                    <h2>Permanent access</h2>
                    <h4><span>$</span>4999.99</h4>
                </div>
                <div class="body-price-box">
                    <h3>I must have this!</h3>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {}
        },
        ready () {

        },
        computed: {},
        methods: {
            scrollDown: function () {
                window.scrollTo(0, 750);
            },
            goToPayment: function (plan) {
                switch (plan) {
                    case 'monthly':
                        window.location.href = '/business/buy?version=monthly';
                        break;
                    case 'yearly':
                        window.location.href = '/business/buy?version=yearly';
                        break;
                    case 'permanent':
                        window.location.href = '/business/buy?version=permanent';
                        break;
                }
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
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
    .top-buffer{
        margin-top: 100px;
    }
    /* wrapper around the 3 boxes */
    #price-wrap{
        margin-top: 25px;
        margin-bottom: 100px;
        display: flex;
    }

    /* pricebox */
    .price-box{
        height: 300px;
        width: 33.33333%;
        margin: 0 5px 0 5px;
        transition: 0.5s height, 0.5s transform;
    }
    .price-box:first-child {
        background-color: #2196F3;
    }
    .price-box:nth-child(2) {
        background-color: #FF5722;
    }
    .price-box:last-child {
        background-color: #9E9E9E;
    }

    .price-box:hover{
        height: 350px;
        transform: translateY(-20px);
        cursor: pointer;
    }

    .price-box:hover > .body-price-box h3 {
        background-color: white;
    }

    /* header */
    .header{
        height: 200px;
        padding: 20% 5%;
    }
    .header>h1,h2,h3,h4,h5,h6 {
        text-align: center;
        margin: 0;
        color: white;
        font-weight: normal;
    }
    .blue {
        background-color: #0D47A1;
        border: none;
        color: white;
    }
    .orange {
        background-color: #BF360C;
        border: none;
        color: white;
    }
    .grey {
        background-color: #212121;
        border: none;
        color: white;
    }
    .header h4{
        position: relative;
    }
    .header h4 span{
        font-size: 10px;
    }

    .body-price-box{
        width: 100%;
        height: auto;
    }

    .body-price-box>h3{
        margin-top: 10%;
        margin-left: auto;
        margin-right: auto;
        font-weight: 100;
        border-radius: 5px;
        background-color: #d4d4d4;
        color: black;
        padding: 10px;
        width: 80%;
    }

</style>
