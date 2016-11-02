<template lang="html">
    <div>
        <div class="jumbotron" v-if="state == 0">
            <h1>Brainstorm tool</h1>
            <h5>(random!)</h5>
            <p>
                If you are using this tool in a group, we recommend you to use the 'Brain writing' technique. Everyone in the group has a pen and a sheet of paper. Look at the randomly selected quote and write the first thing that comes to mind when you read the quote and see the illustration next to it. When everyone has finished writing down one word or idea, rotate your sheet to the person sitting next to you. Now build off what the others wrote on their paper. Continue doing this until everyone has written on everyone else's sheet. This way, every idea has a different and unique approach to it. This technique combined with the genius way that children think, makes for a great and innovative brainstorm session!
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
