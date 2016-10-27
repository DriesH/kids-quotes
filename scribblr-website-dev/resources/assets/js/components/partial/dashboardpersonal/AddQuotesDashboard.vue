<template lang="html">
    <div class="col-md-6 col-sm-6 sidebar">

            <form class="col-md-6 pull-right">
                <!-- NAME START -->
                <div class="form-group">
                    <label for="quoteName">Quote: </label>
                    <input type="text" class="form-control" id="quoteName" placeholder="Your quote..." v-model="quote.quoteName">
                </div>

                <div class="cc-selector-2">
                    <div v-for="defaultImg in defaultImgs">
                        <input id="{{defaultImg}}" type="radio" name="background" value="{{defaultImgs.indexOf(defaultImg)}}" v-model="backgroundChosen"/>
                        <label class="drinkcard-cc" for="{{defaultImg}}" v-bind:style="{ backgroundImage : 'url(' + prefixDefault + defaultImg + ')' }"></label>
                    </div>
                    <div>
                        <input id="customBackground" type="radio" name="background" value="custom" v-model="backgroundChosen"/>
                        <label class="drinkcard-cc" for="customBackground"></label>
                    </div>
                </div>

                <button type="button" name="add" class="btn btn-success"><i class="fa fa-plus"></i> Add Quote</button>

                <button type="button" class="btn btn-danger pull-right" name="hide" @click="closeAddQuoteForm"><i class="fa fa-ban"></i> Hide</button>



                <!-- NAME END -->
            </form>
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
                quote: {
                    quoteName: '',
                    backgrImg: ''
                },
                defaultImgs: ['wood.jpg', 'chalkboard.jpg', 'paper.jpg']
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
