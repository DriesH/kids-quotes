<template lang="html">
    <div class="col-md-6 col-sm-6 sidebar">

            <form class="col-md-6 pull-right">
                <!-- NAME START -->
                <div class="form-group">
                    <label for="quoteName">Quote: </label>
                    <input type="text" class="form-control" id="quoteName" placeholder="Your quote..." v-model="quote.quoteName">
                </div>

                <button type="button" name="add" class="btn btn-success"><i class="fa fa-plus"></i> Add Quote</button>

                <button type="button" class="btn btn-danger pull-right" name="hide" @click="hidePanel"><i class="fa fa-ban"></i> Hide</button>



                <!-- NAME END -->
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'addQuoteShow'
        ],
        data () {
            return {
                quote: {
                    quoteName: ''
                }
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
