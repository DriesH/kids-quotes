<template lang="html">
    <a href="#" class="center-block arrow" @click="scrollDown"><i class="fa fa-angle-double-down"></i></a>
    <div class="container-fluid">
        <div class="pricing-plans">
            <div class="wrap">
                <div class="price-head">
                    <h1>TExt die moet nog kome</h1>
                </div>
                <div class="pricing-grids">
                    <div class="pricing-grid1">
                        <div class="price-value">
                            <h2><a href="/business/buy?version=monthly">Monthly access</a></h2>
                            <h5><span class="currency">$</span><span class="price">49.99</span><label> / month</lable></h5>
                            <div class="sale-box">
                                <span class="on_sale title_shop">POPULAR</span>
                            </div>
                        </div>
                        <div class="price-bg">
                            <div class="cart1">
                                <a class="popup-with-zoom-anim" href="/business/buy?version=monthly">Purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-grid2">
                        <div class="price-value two">
                            <h3><a href="/business/buy?version=yearly">Yearly access</a></h3>
                            <h5><span class="currency">$</span><span class="price">499.99</span><label> / year</lable></h5>
                            <div class="sale-box two">
                            </div>
                        </div>
                        <div class="price-bg">
                            <div class="cart2">
                                <a class="popup-with-zoom-anim" href="/business/buy?version=yearly">Purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-grid3">
                        <div class="price-value three">
                            <h4><a href="/business/buy?version=permanent">Permanent access</a></h4>
                            <h5><span class="currency">$</span><span class="price">4999.99</span><label> once</lable></h5>
                            <div class="sale-box three">
                                <span class="on_sale title_shop">EXCLUSIVE</span>
                            </div>
                        </div>
                        <div class="price-bg">
                            <div class="cart3">
                                <a class="popup-with-zoom-anim" href="/business/buy?version=permanent">Purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>
        </div>
        <!--//End-pricingplans-->
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
            }
        },
        components: {}
    }
</script>

<style lang="css">
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
</style>
