<template lang="html">
    <div class="col-xs-4 col-sm-2 animated">
        {{ $parent.currentSelectedChild }}
        <div class="thumbnail">
            <form>
                <div class="form-group">
                    <label for="quote">Quote: </label>
                    <input type="text" class="form-control" id="quote" placeholder="Quote..." v-model="newQuote">
                </div>
                <button type="button" name="addChild" class="btn btn-success" @click="addNewQuote"><i class="fa fa-plus"></i> add</button>
            </form>
        </div>

        <div class="">
            <ul>
                <li v-for="quote in $parent.previousQuotes">{{ quote.quote }}</li>
            </ul>
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
