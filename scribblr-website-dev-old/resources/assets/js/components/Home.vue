<template lang="html">
    <div id="hero-img">
        {{ test }}
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                test: ''
            }
        },
        ready: function () {
            this.$http.get('/api/children').then((response) => {
                this.test = response //response.body[0].name
                console.log(response)
            }, (response) => {
                console.log('error' + response)
            });
        }
    }
</script>

<style lang="css" scoped>

</style>
