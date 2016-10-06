<template lang="html">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-body">
                    <div v-if="$parent.errorMessagesForm.length > 0">
                        <div v-for="error in $parent.errorMessagesForm" class="alert alert-danger animated shake">
                            <strong>{{ error[0] }}</strong>
                        </div>
                    </div>
                    <slot name="body">
                        <button type="button" name="close" class="pull-right" @click="$parent.showHideForm"><i class="fa fa-times"></i></button>
                        <form>
                            <div class="form-group">
                                <label for="childName">Full name: </label>
                                <input type="text" class="form-control" id="childName" placeholder="Fullname" v-model="$parent.newChild.childName">
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="boy" value="boy" checked v-model="$parent.newChild.gender">
                                        Boy
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="girl" value="girl" v-model="$parent.newChild.gender">
                                        Girl
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dateOfBirth">Date Of Birth:</label>
                                <input type="text" class="form-control" id="dateOfBirth" placeholder="01-01-2001" v-model="$parent.newChild.dateOfBirth">
                            </div>
                            <button type="button" name="addChild" class="btn btn-success" @click="$parent.addNewChild"><i class="fa fa-plus"></i> add</button>
                        </form>
                    </slot>
                </div>
            </div>
        </div>
    </div>




</template>

<script>
export default {
    data () {
        return {
        }
    },
    computed: {},
    ready () {
    },
    attached () {},
    methods: {},
    components: {}
}
</script>

<style lang="css">
#upload_file {
  text-align: center;
}

.uploaded_img {
  width: 300px;
  height: 300px;
  margin: auto;
  display: block;
  margin-bottom: 10px;
  border: 1px black solid;
}

</style>
