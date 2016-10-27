<template lang="html">
    <div class="col-md-6 col-sm-6 sidebar">
        <!-- FORM START -->
        <form class="col-md-8 pull-right">
            <!-- NAME START -->
            <div class="form-group">
                <label for="quoteName">Quote: </label>
                <input type="text" class="form-control" id="quoteName" placeholder="Your quote..." v-model="quote.quoteName">
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

            <div id="upload_file">
                <div v-if="backgroundChosen === 'custom'">
                    <h2>Select an image</h2>
                    <input @change="previewBackground" name="backgr_img" type="file" v-model="backgrImg" id="testimage">
                    <div class="alert alert-info" role="alert">
                        <strong>Heads up!</strong> For best image quality, use an image with a <strong>1:1</strong> aspect ratio (eg. 300x300).
                    </div>
                </div>
            </div>

            <!-- BUTTONS START -->
            <button type="button" name="add" class="btn btn-success"><i class="fa fa-plus"></i> Add Quote</button>
            <button type="button" class="btn btn-danger pull-right" name="hide" @click="closeAddQuoteForm"><i class="fa fa-ban"></i> Cancel</button>
            <!-- BUTTONS END -->
        </form>
        <!-- FORM END -->

    </div>
</template>

<script>
    export default {
        props: [
            'addQuoteShow'
        ],
        data () {
            return {
                quote: {
                    quoteName: '',
                    backgrImg: ''
                },
                backgroundChosen: 0,
                formData: new FormData(),
                defaultImgs: ['wood.jpg', 'chalkboard.jpg', 'paper.jpg'],
                prefixDefault: '/pictures/'
            }
        },
        computed: {

        },
        ready () {

        },
        methods: {
            closeAddQuoteForm: function () {
                this.addQuoteShow = false;
                var sideBar = document.getElementById('sidebar-div');
                if(this.hasClass(sideBar, 'overlay-sidebar-shadow')) {
                    sideBar.className = 'col-sm-3 col-md-2 sidebar';
                }
            },
            addQuote: function() {
                var fileInputEl = $("#testimage");
                var self = this;
                html2canvas($("#widget"), {
                    onrendered: function(canvas) {
                        var theCanvas = canvas;
                        document.body.appendChild(canvas);

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
                        self.formData.append("quote", self.newQuote);                         // quote raw text
                        self.formData.append("child_id", self.currentSelectedChildId);        // child_id of current child you're adding quote

                        self.$http.post('api/quote', self.formData).then((success_response) => {
                            console.log(success_response.body)
                        },
                        (error_response) => {
                            console.log('error')
                        });
                    }
                });
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
</style>
