<template lang="html">
    <div class="col-xs-4 col-sm-2">
        {{ $parent.currentSelectedChildId }}
        <form>
            <div class="form-group">
                <label for="quote">Quote: </label>
                <input type="text" class="form-control" id="quote" placeholder="Quote" v-model="newQuote.quote">
            </div>
            <button type="button" name="addChild" class="btn btn-success" @click="addNewQuote"><i class="fa fa-plus"></i> add</button>
        </form>
    </div>
    <div class="">

    </div>
</template>

<script>
    export default {
        data () {
            return {
                newQuote: {
                    quote: '',
                    child_id:
                }
            }
        },
        computed: {},
        ready () {
        },
        attached () {},
        methods: {
            addNewQuote: function () {
                this.$http.post('api/quote', this.newQuote).then((success_response) => {
                    console.log(success_response.body)
                    console.log(this.newQuote.child_id)
                },
                (error_response) => {
                    console.log('error')
                });
            }
        },
        components: {}
    }
</script>

<style lang="css">
</style>
