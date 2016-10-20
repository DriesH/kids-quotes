<template lang="html">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main push">
        <div class="row placeholders">
            <div id="grid" data-columns>
                <div class="thumbnail" v-for='child in currentChildren'>
                    <img src="/business_imgs/elf.jpg" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentChildren: [

                ],
            }
        },
        computed: {},
        ready () {
            this.$http.get('/api/child').then((success_response) => {
                this.currentChildren = JSON.parse(success_response.body)
            },
            (error_response) => {
                alert('error');
            });
        },
        methods: {},
        components: {}
    }
</script>

<style lang="css">
</style>
