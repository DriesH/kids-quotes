<template lang="html">
    <div class="col-md-8 col-sm-8 sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-danger pull-right" name="hide" @click="hidePanel"><i class="fa fa-ban"></i> Hide</button>
                </div>
            </div>
            <div class="row" v-if="addingQuote">
                <form>
                    <!-- NAME START -->
                    <div class="form-group">
                        <label for="childName">Full name: </label>
                        <input type="text" class="form-control" id="childName" placeholder="Fullname" v-model="newChild.childName" :class="{ 'error-form' : errorMessagesForm.childName }">
                    </div>
                    <!-- NAME END -->
                </form>
            </div>
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
