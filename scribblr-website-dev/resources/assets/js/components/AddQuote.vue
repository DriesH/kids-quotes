<template lang="html">
    <div class="panel panel-default animated">
        <div class="panel-heading">
            <h1>{{ $parent.currentSelectedChildName }}</h1>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-6 pull-left">
                <div class="thumbnail">
                    <form enctype="multipart/form-data" id="quoteForm" @submit="addNewQuote">
                        <div class="form-group">
                            <label for="quote">Quote: </label>
                            <textarea id="quoteTextArea" name="name" rows="4" cols="16" v-model="newQuote" placeholder="Quote..."></textarea>
                        </div>
                        <div id="upload_file">
                          <div v-if="!image">
                            <h2>Select an image</h2>
                            <input name="backgr_img" type="file" v-model="backgr_img" id="testimage">
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
                        <button id="addQuote" type="submit" name="addQuote" class="btn btn-success center-block" ><i class="fa fa-plus"></i> add</button>
                    </form>
                </div>

                <div class="cc-selector-2">
                    <div v-for="defaultImg in defaultImgs">
                        <input id="{{defaultImg}}" type="radio" name="background" value="{{defaultImg}}" v-model="backgroundChosen"/>
                        <label class="drinkcard-cc" for="{{defaultImg}}" v-bind:style="{ backgroundImage : 'url(' + prefixDefault + defaultImg + ')' }"></label>
                    </div>
                </div>



            </div>
            <div class="col-xs-12 col-md-6 pull-right">
                <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 300, "gutter": 10 }'>

                    <!-- PREVIEW -->
                    <div class="quote grid-item" id="widget">
                        <img v-bind:src="prefixDefault + backgroundChosen" id="target" />
                        <span class="quote_text"><p class="quoteBox">{{ newQuote }}</p></span>
                    </div>

                    <div id="img-out"></div>

                    <!-- OLD QUOTES -->
                    <div class="quote grid-item" v-for="quote in $parent.previousQuotes">
                        <span class="quote_text"><p class="quoteBox">{{ quote.quote }}</p></span>
                        <img v-bind:src="quote.backgr_img" />
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
                backgr_img: null,
                formData: new FormData(),
                defaultImgs: ['wood.jpg', 'chalkboard.jpg', 'paper.jpg'],
                backgroundChosen: 'wood.jpg',
                prefixDefault: '/pictures/'
            }
        },
        computed: {},
        ready () {
        },
        attached () {},
        methods: {
            addNewQuote: function (e) {
                e.preventDefault();
                var fileInputEl = $("#testimage");
                var self = this;
                html2canvas($("#widget"), {
                    onrendered: function(canvas) {
                        var theCanvas = canvas;
                        document.body.appendChild(canvas);

                        // Convert and download as image
                        //Canvas2Image.saveAsPNG(canvas);
                        $("#img-out").append(canvas);
                        // Clean up
                        //document.body.removeChild(canvas);
                        self.canvas = document.getElementsByTagName('canvas')[0].toDataURL();
                        self.formData.append("userfile", fileInputEl[0].files[0]);
                        self.formData.append("imgWithQuote", self.canvas);
                        self.formData.append("quote", self.newQuote);
                        self.formData.append("child_id", self.currentSelectedChildId);
                        self.formData.append("backgroundChosen", self.backgroundChosen);


                        self.$http.post('api/quote', self.formData).then((success_response) => {
                            console.log(success_response.body)
                        },
                        (error_response) => {
                            console.log('error')
                        });
                    }
                });


            },
            bindFile: function(e){
                this.fileUploadFormData.append('file', e.target.files[0]);
            }
        }
    }
</script>

<style lang="css" scoped>
    .cc-selector-2 input{
        position:absolute;
        z-index:999;
    }
    .cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
    .cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
        -webkit-filter: none;
           -moz-filter: none;
                filter: none;
    }
    .drinkcard-cc{
        cursor:pointer;
        background-size:contain;
        background-repeat:no-repeat;
        display:inline-block;
        width:100px;height:70px;
        -webkit-transition: all 100ms ease-in;
           -moz-transition: all 100ms ease-in;
                transition: all 100ms ease-in;
        -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
           -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
                filter: brightness(1.8) grayscale(1) opacity(.7);
    }
    .drinkcard-cc:hover{
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
           -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
                filter: brightness(1.2) grayscale(.5) opacity(.9);
    }
</style>
