<template lang="html">
    <div class="panel panel-default animated">
        <div class="panel-heading">
            <h1>{{ $parent.currentSelectedChildName }}</h1>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-6 pull-left">
                <div class="thumbnail">
                    <form>
                        <div class="form-group">
                            <label for="quote">Quote: </label>
                            <input type="text" class="form-control" id="quote" placeholder="Quote...">
                            <textarea id="quoteTextArea" name="name" rows="4" cols="16" v-model="newQuote"></textarea>
                        </div>
                        <div id="upload_file">
                          <div v-if="!image">
                            <h2>Select an image</h2>
                            <input name="backgr_img" type="file" @change="onFileChange">
                            <div class="alert alert-info" role="alert">
                              <strong>Heads up!</strong> For best image quality, use an image with a <strong>1:1</strong> aspect ratio (eg. 300x300).
                            </div>
                          </div>
                          <div v-else>
                              <div class="quote">
                                  <span class="quote_text">{{ newQuote }}</span>
                                  <img :src="image" class="uploaded_img" />
                              </div>
                            <button @click="removeImage">Remove image</button>
                          </div>
                        </div>
                        <button type="button" name="addChild" class="btn btn-success center-block" @click="addNewQuote"><i class="fa fa-plus"></i> add</button>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 pull-right">
                <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 300, "gutter": 10 }'>
                    <div class="quote grid-item" id="widget">
                        <img src="/backgr_imgs/chalkboard.jpg" alt="chalkboard" id="target" />
                        <span class="quote_text"><p class="quoteBox">{{ newQuote }}</p></span>
                    </div>
                    <input type="button" id="btnSave" value="Save PNG"/>
                    <div id="img-out"></div>
                    <div class="quote grid-item" v-for="quote in $parent.previousQuotes">
                        <span class="quote_text"><p class="quoteBox">{{ quote.quote }}</p></span>
                        <img src="/backgr_imgs/chalkboard.jpg" alt="chalkboard" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['currentSelectedChildId'],
        data () {
            return {
                newQuote: '',
                image: ''
            }
        },
        computed: {},
        ready () {
        },
        attached () {},
        methods: {
            addNewQuote: function () {
                this.$http.post('api/quote', {quote: this.newQuote, child_id: this.currentSelectedChildId}).then((success_response) => {
                    console.log(success_response.body)
                },
                (error_response) => {
                    console.log('error')
                });
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            removeImage: function (e) {
                this.image = '';
            }
        }
    }
</script>

<style lang="css">
</style>
