<template lang="html">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row placeholders">

            <!-- ADD QUOTE BTN START -->
            <div class="add-btn col-md-12 col-xs-12 col-lg-12">
                <button type="button" name="button" class="btn btn-success" @click="openAddQuoteForm"><i class="fa fa-plus"></i>  ADD NEW QUOTE</button>
            </div>
            <!-- ADD QUOTE BTN END -->

            <!-- GRID WITH QUOTES START -->
            <div id="grid" data-columns>
                <div class="thumbnail quotes">
                    <img src="/business_imgs/apple.jpg" alt="" />
                </div>
            </div>
            <!-- GRID WITH QUOTES END -->

        </div>

        <!-- ADDQUOTES START -->
        <add-quotes-dashboard v-if="addQuoteShow" style="z-index: 100;" v-bind:add-quote-show.sync="addQuoteShow" :class="{ 'overlay-sidebar-shadow': addQuoteShow }"></add-quotes-dashboard>
        <!-- ADDQUOTES START -->
    </div>
</template>

<script>
    export default {
        data () {
            return {
                addQuoteShow: false //show - hide form add quote
            }
        },
        computed: {},
        ready () {},
        methods: {
            openAddQuoteForm: function () {
                this.addQuoteShow = true;
            },
            getPreviousQuotes: function () {
                //get previous quotes from current child
                this.$http.get('/api/quote/' + id).then((success_response) => {
                    this.previousQuotes = JSON.parse(success_response.body);
                },
                (error_response) => {
                    alert('error');
                });
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
</style>
