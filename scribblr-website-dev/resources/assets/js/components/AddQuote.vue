<template lang="html">
    <div class="col-xs-4 col-sm-2">
        <form>
            <div class="form-group">
                <label for="quote">Quote: </label>
                <input type="text" class="form-control" id="quote" placeholder="Quote" v-model="">
            </div>
            <button type="button" name="addChild" class="btn btn-success" @click="$parent.addNewChild"><i class="fa fa-plus"></i> add</button>
        </form>
    </div>
</template>

<script>
    export default {
        data () {
            return {
            }
        },
        computed: {},
        ready () {
            this.$http.get('/api/quote/' + $parent.currentSelectedChildId).then((success_response) => {
                console.log(success_response.body)
            },
            (error_response) => {
                alert('error');
            });
        },
        attached () {},
        methods: {
            addNewQuote: function () {
                this.$http.post('/');
            }
        },
        components: {}
    }
</script>

<style lang="css">
</style>
