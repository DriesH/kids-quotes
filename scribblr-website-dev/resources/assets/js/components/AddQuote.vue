<template lang="html">
    <div class="panel panel-default animated">
        <div class="panel-heading">
            <h1>{{ $parent.currentSelectedChildName }}</h1>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-6 pull-left">

                <div class="thumbnail">
                    <form>
                        <div class="form-group">
                            <label for="quote">Quote: </label>
                            <input type="text" class="form-control" id="quote" placeholder="Quote..." v-model="newQuote">
                        </div>
                        <button type="button" name="addChild" class="btn btn-success center-block" @click="addNewQuote"><i class="fa fa-plus"></i> add</button>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 pull-right">
                <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 300, "gutter": 10 }'>
                    <div class="quote grid-item">
                        <span class="quote_text">{{ newQuote }}</span>
                        <img src="/backgr_imgs/chalkboard.jpg" alt="chalkboard" v-crop:start="cropStart" />
                    </div>
                    <div class="quote grid-item" v-for="quote in $parent.previousQuotes">
                        <span class="quote_text">{{ quote.quote }}</span>
                        <img src="/backgr_imgs/chalkboard.jpg" alt="chalkboard" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['currentSelectedChildId'],
        data () {
            return {
                newQuote: ''
            }
        },
        computed: {},
        ready () {
        },
        attached () {},
        methods: {
            addNewQuote: function () {
                this.$http.post('api/quote', {quote: this.newQuote, child_id: this.currentSelectedChildId}).then((success_response) => {
                    console.log(success_response.body)
                },
                (error_response) => {
                    console.log('error')
                });
            }
        }
    }
</script>

<style lang="css">
</style>
