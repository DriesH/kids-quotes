<template lang="html">
    <div>
        <div class="jumbotron" v-if="state == 0">

            <h1>Completely random!</h1>
            <p>
                Totally random kids quotes from very different themes!
            </p>
            <button type="button" name="button" class="btn btn-default center-block" @click="state=1"><i class="fa fa-lightbulb-o"></i> LET'S GO!</button>
        </div>

        <div v-if="state == 1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="jumbotron">
                        <h1>{{ quote }}</h1>
                        <p>
                            {{ theme }}
                        </p>
                        <img class="illustration" :src="path + illustration" alt="" />
                    </div>
                    <button type="button" name="generate" class="btn btn-primary center-block" @click="$parent.randomize"><i class="fa fa-undo"></i> RANDOM QUOTE</button>
                </div>
            </div>
            <button type="button" name="button" @click="state=0" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'state',
            'quote',
            'theme',
            'illustration',
            'path'
        ],
        data () {
            return {}
        },
        computed: {},
        ready () {},
        methods: {},
        components: {}
    }
</script>

<style lang="css" scoped>
    .illustration {
        width: 50%;
        height: auto;
        margin-left: 25%;
        margin-right: 25%;
    }
</style>
