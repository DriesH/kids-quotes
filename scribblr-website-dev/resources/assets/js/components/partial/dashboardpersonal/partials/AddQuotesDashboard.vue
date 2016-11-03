<template lang="html">
    <div class="col-md-6 col-sm-6 sidebar">
        <!-- FORM START -->
        <form class="col-md-8 pull-right" @submit="addQuote($event)">

            <div class="alert alert-danger" role="alert" v-if="errors.errorQuote">
                <p>
                    {{ errors.messageQuote }}
                </p>
            </div>

            <div class="alert alert-danger" role="alert" v-if="errors.errorPicture">
                <p>
                    {{ errors.messagePicture }}
                </p>
            </div>



            <!-- NAME START -->
            <div class="form-group">
                <label for="quoteName">Quote: </label>
                <input type="text" class="form-control" id="quoteName" placeholder="Your quote..." v-model="quote.quoteName" maxlength="105">
            </div>
            <!-- NAME END -->

            <!-- DEFAULT BACKGROUND SELECTOR START -->
            <h4>Select a default background, or choose a custom one.</h4>
            <div class="cc-selector-2">
                <div v-for="defaultImg in defaultImgs">
                    <input id="{{defaultImg}}" type="radio" name="background" value="{{defaultImgs.indexOf(defaultImg)}}" v-model="backgroundChosen"/>
                    <label class="drinkcard-cc" for="{{defaultImg}}" v-bind:style="{ backgroundImage : 'url(' + prefixDefault + defaultImg + ')' }"></label>
                </div>
                <div style="height:80px;">
                    <input id="customBackground" type="radio" name="background" value="custom" v-model="backgroundChosen"/>
                    <label class="drinkcard-cc pull-left" for="customBackground" style="background-image: url(/pictures/custom-add.png)"></label>
                    <p class="pull-left" style="padding-top:25px;">
                        Custom background
                    </p>
                </div>
            </div>
            <!-- DEFAULT BACKGROUND SELECTOR END -->

            <!-- CUSTOM BACKGROUND START -->
            <div id="upload_file" v-if="backgroundChosen === 'custom'">
                <div class="form-group">
                    <label for="backgr_img"><h4>Select an image</h4></label>
                    <input @change="previewBackground" name="backgr_img" type="file" v-model="quote.backgrImg" id="testimage">
                </div>
                <div class="alert alert-info" role="alert">
                    <strong>Heads up!</strong> For best image quality, use an image with a <strong>1:1</strong> aspect ratio (eg. 400x400).
                </div>
            </div>
            <!-- CUSTOM BACKGROUND END -->

            <!-- PREVIEW START -->
            <div class="quote" id="widget" v-if="backgroundChosen !== 'custom'">
                <img v-bind:src="previewBackgroundIMG = prefixDefault + defaultImgs[backgroundChosen]" id="target" />
                <span class="quote_text"><p class="quoteBox">{{ quote.quoteName }}</p></span>
            </div>

            <div v-else>
                <div class="quote grid-item" id="widget">
                    <img :src="previewBackgroundIMG" class="uploaded_img" />
                    <span class="quote_text"><p class="quoteBox">{{ quote.quoteName }}</p></span>
                </div>
            </div>

            <div id="img-out"></div>
            <!-- PREVIEW END -->

            <!-- BUTTONS START -->
            <button type="submit" name="add" class="btn btn-success" ><i class="fa fa-plus"></i> Add Quote</button>
            <button type="button" class="btn btn-danger pull-right" name="hide" @click="closeAddQuoteForm"><i class="fa fa-ban"></i> Cancel</button>
            <!-- BUTTONS END -->
        </form>
        <!-- FORM END -->

    </div>
</template>

<script>
    export default {
        props: [
            'addQuoteShow',
            'selectedChild'
        ],
        data () {
            return {
                quote: {
                    quoteName: '',
                    backgrImg: ''
                },
                errors: {
                    errorQuote: false,
                    messageQuote: 'You have to fill in a quote! Silly you!',
                    errorPicture: false,
                    messagePicture: 'You have to add a picture! Otherwise your quote will be so... empty!'
                },
                previewBackgroundIMG: '',
                backgroundChosen: 0,
                formData: new FormData(),
                defaultImgs: ['wood.jpg', 'chalkboard.jpg', 'dirt.jpg'],
                prefixDefault: '/pictures/'
            }
        },
        ready () {

        },
        watch: {
            backgroundChosen: function(value) {
                if(value === 'custom'){
                    this.previewBackgroundIMG = '';
                }
            }
        },
        methods: {
            closeAddQuoteForm: function () {
                this.addQuoteShow = false;
                var sideBar = document.getElementById('sidebar-div');
                if(this.hasClass(sideBar, 'overlay-sidebar-shadow')) {
                    sideBar.className = 'col-sm-3 col-md-2 sidebar';
                }
            },
            addQuote: function(event) {
                event.preventDefault();
                if(this.quote.quoteName !== '' && this.previewBackgroundIMG !== '') {
                    this.errors.errorQuote = false;
                    this.errors.errorPicture = false;
                    var fileInputEl = $("#testimage");
                    var self = this;
                    html2canvas($("#widget"), {
                        onrendered: function(canvas) {
                            var theCanvas = canvas;
                            document.body.appendChild(canvas);

                            console.log('html2canvas');

                            // Convert and download as image
                            $("#img-out").append(canvas);
                            self.canvas = document.getElementsByTagName('canvas')[0].toDataURL();
                            // Clean up
                            //document.body.removeChild(canvas);
                            if(self.backgroundChosen === 'custom') {
                                self.formData.append("backgroundImage", fileInputEl[0].files[0]);  // custom image
                            }
                            else{
                                self.formData.append("backgroundImage", self.defaultImgs[self.backgroundChosen]);
                            }

                            self.formData.append("imgWithQuote", self.canvas);                    // quote + image base64
                            self.formData.append("quote", self.quote.quoteName);                  // quote raw text
                            self.formData.append("child_id", self.selectedChild);                 // child_id of current child you're adding quote

                            self.$http.post('api/quote', self.formData).then((success_response) => {
                                console.log(success_response.body);
                                self.closeAddQuoteForm();
                            },
                            (error_response) => {
                                console.log('error')
                            });
                        }
                    });
                }
                else if( this.quote.quoteName === '' &&  this.previewBackgroundIMG === '' ) {
                    this.errors.errorQuote = true;
                    this.errors.errorPicture = true;
                }
                else if(this.quote.quoteName === '' ){
                    this.errors.errorQuote = true;
                    this.errors.errorPicture = false;
                }
                else if(this.previewBackgroundIMG === '' ) {
                    this.errors.errorQuote = false;
                    this.errors.errorPicture = true;
                }
            },
            //preview the backgroun that was uploaded by the user
            previewBackground: function(event) {
                console.log('hey i got called!');
                var input = event.target;

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    var vm = this;

                    reader.onload = function(e) {
                        vm.previewBackgroundIMG = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            },
            hasClass: function (element, cls) {
                return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
            }
        },
        components: {

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
    .quote {
        position: relative;
        overflow: hidden;
    }
    .quote img {
        border-radius: 10px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .quote_text {
        color: white;
        font-size: 40px;
        font-family: 'Amatic', cursive;
        position: absolute;
        top: 20px;
        left: 10px;
        word-break: break-all;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .quote_text:hover{
        cursor: default;
    }
    .uploaded_img {
        width: 400px;
        height: 400px;
    }
    #quoteTextArea {
        resize: none;
        overflow: hidden;
        word-wrap: normal;
    }
    .quoteBox {
        white-space: pre-line;
    }
    #widget{
        display: block;
        width: 400px;
        height: 400px;
        margin-bottom: 10px;
    }
    #img-out{
        display: none;
        width: 400px;
        height: 400px;
    }
    #img-out>canvas{
        width: 400px;
        height: 400px;
    }
</style>
