<template lang="html">
    <div class="col-md-8 col-sm-8 sidebar">
        <button type="button" class="btn btn-danger" name="hide" @click="hidePanel"><i class="fa fa-ban"></i> Hide</button>
    </div>
</template>

<script>
    export default {
        props: [
            'addQuoteShow'
        ],
        data () {
            return {

            }
        },
        computed: {

        },
        ready () {

        },
        methods: {
            hidePanel: function () {
                this.addQuoteShow = false;
            },
        },
        components: {

        }
    }
</script>

<style lang="css" scoped>
</style>
