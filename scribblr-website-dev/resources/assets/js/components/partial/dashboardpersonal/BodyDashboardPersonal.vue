<template lang="html">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row placeholders">
            <div v-if='selectedChild !== "none"'>
                <!-- ADD QUOTE BTN START -->
                <div class="add-btn col-md-12 col-xs-12 col-lg-12">
                    <button type="button" name="button" class="btn btn-success center-block" @click="openAddQuoteForm"><i class="fa fa-plus"></i>  ADD NEW QUOTE</button>
                    {{selectedChild}}
                </div>
                <!-- ADD QUOTE BTN END -->

                <!-- GRID WITH QUOTES START -->
                <div id="grid" data-columns>
                    <div class="thumbnail quotes">
                        <!--<img src="" alt="" />-->
                    </div>
                </div>
                <!-- GRID WITH QUOTES END -->
            </div>

            <div v-else id='quote-overview-text'>
                <h1>Quote that inspires you!</h1>
            </div>


            <!-- ADDQUOTES START -->
            <add-quotes-dashboard v-if="addQuoteShow" style="z-index: 100;" v-bind:add-quote-show.sync="addQuoteShow" :class="{ 'overlay-sidebar-shadow': addQuoteShow }"></add-quotes-dashboard>
            <!-- ADDQUOTES START -->
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'selectedChild'
        ],
        data () {
            return {
                addQuoteShow: false, //show - hide form add quote
                previousQuotes: ''
            }
        },
        computed: {},
        ready () {},
        watch:{
            selectedChild: function (value) {
                if(!this.initSal) {
                    salvattore.init();
                    this.initSal = true;
                }
                this.getPreviousQuotes(this.selectedChild);
            }
        },
        methods: {
            openAddQuoteForm: function () {
                this.addQuoteShow = true;
                var sideBar = document.getElementById('sidebar-div');
                if(!this.hasClass(sideBar, 'overlay-sidebar-shadow')) {
                    sideBar.className += 'overlay-sidebar-shadow';
                }
            },
            getPreviousQuotes: function (id) {
                //get previous quotes from current child
                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body);
                    console.log(this.previousQuotes);
                },
                (error_response) => {
                    alert('error');
                });
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>
    .add-btn {
        padding: 5px;
        margin-bottom: 21px;
    }

    #quote-overview-text h1{
        font-family: 'Lobster', cursive;
        color: #34495e;
        text-shadow: rgb(224, 224, 224) 1px 1px 0px;
        font-size: 5em;
        padding: 20%;
    }
</style>
