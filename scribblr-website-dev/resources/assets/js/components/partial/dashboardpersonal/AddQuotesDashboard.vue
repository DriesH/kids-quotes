<template lang="html">
    <div class="col-md-8 col-sm-8 sidebar">
            <button type="button" class="btn btn-danger pull-right" name="hide" @click="hidePanel"><i class="fa fa-ban"></i> Hide</button>
            
            <form>
                <!-- NAME START -->
                <div class="form-group">
                    <label for="quoteName">Quote: </label>
                    <input type="text" class="form-control" id="quoteName" placeholder="Fullname" v-model="newChild.childName">
                </div>
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
                addingQuote: false
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
