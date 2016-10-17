<template lang="html">
    <div>
        <dev-nav-bar></dev-nav-bar>
        <dev-banner></dev-banner>
        <dev-content-home-page></dev-content-home-page>
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
            this.currentLink = window.location.pathname;
            switch (this.currentLink) {
                case '/personal':
                    this.$http.get('/api/personal/data').then((succes_response) => {
                        this.data = JSON.parse(succes_response.body);
                    },
                    (error_callback) => {
                        this.data = JSON.parse(error_callback.body);
                    });
                    break;
                case '/business':
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
