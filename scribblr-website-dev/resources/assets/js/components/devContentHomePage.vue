<template lang="html">
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-sm-5 col-md-6">
                    <div class="titles">
                        <h1>What is Scribblr?</h1>
                        <h2>A platform for remembering quotes.</h2>
                    </div>
                    <div class="content-text">
                        <p>
                            On Scribblr you can add your children’s best quotes. You can put them
                            over all kinds of preset backgrounds, or upload your own background.
                            And ofcourse our best feature, printing a book of all your quotes!
                        </p>
                    </div>
                </div>

                <div class="col-sm-7 col-md-5">
                    <!-- COMING SOON!
                    <div class="pictures">
                        <div class="picture">
                            <img src="" alt="" />
                        </div>
                    </div>-->
                </div>

            </div>

        </div>
    </div>

</template>

<script>
    export default {
        data () {
            return {}
        },
        computed: {},
        ready () {},
        attached () {},
        methods: {},
        components: {}
    }
</script>

<style lang="css" scoped>
    .content {
        margin-top: 100px;
        height: 924px;
        width: 100%;
    }

    .titles{
        font-family: "Source Sans Pro", sans-serif;
        color: #442061;
        font-weight: bold !important;
    }

    .titles h1 {
        font-size: 50px;
        font-weight: bold !important;
    }

    .titles h2 {
        font-size: 35px;
        font-weight: bold !important;
    }

    .content-text {
        font-family: "Source Sans Pro", sans-serif;
        color: black;
        font-weight: 600;
        width: 520px;
        font-size: 16px;
    }


</style>
