<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        Naam kind: {{ test }}
                    </div>
                </div>
            </div>
        </div>
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
                this.test =  response //response.body[0].name
                console.log(response)
            }, (response) => {
                console.log('error' + response)
            });
        }
    }
</script>
