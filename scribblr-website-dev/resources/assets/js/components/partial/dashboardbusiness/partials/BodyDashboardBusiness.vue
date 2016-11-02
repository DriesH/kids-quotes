<template lang="html">
    <div class="col-sm-12 col-md-12 main">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="jumbotron">
                    <h3>{{ quote }}</h3>
                </div>
                <button type="button" name="generate" class="btn btn-primary center-block"><i class="fa fa-undo"></i> RANDOM QUOTE</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                quote: 'Look mommy! Someone ate the moon!'
            }
        },
        computed: {},
        ready () {},
        methods: {},
        components: {}
    }
</script>

<style lang="css" scoped>
</style>
