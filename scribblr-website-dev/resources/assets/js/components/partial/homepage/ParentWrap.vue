<template lang="html">
    <div>
        <banner v-bind:data.sync="data"></banner>
        <content-home-page v-if="currentLink == 'personal'"></content-home-page>
        <business-content-home-page v-if="currentLink == 'business'"></business-content-home-page>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentLink: '',
                data: [

                ],
            }
        },
        computed: {},
        ready () {
            this.currentLink = window.currentVersion;
            switch (this.currentLink) {
                case 'personal':
                    this.$http.get('/api/personal/data').then((succes_response) => {
                        this.data = JSON.parse(succes_response.body);
                    },
                    (error_callback) => {
                        this.data = JSON.parse(error_callback.body);
                    });
                    break;
                case 'business':
                    this.$http.get('/api/business/data').then((succes_response) => {
                        this.data = JSON.parse(succes_response.body);
                    },
                    (error_callback) => {
                        this.data = JSON.parse(error_callback.body);
                    });
                    break;
            }
        },
        methods: {},
        components: {}
    }
</script>

<style lang="css">
</style>
