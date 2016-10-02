<template lang="html">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-body">
                    <div class="alert alert-danger" v-if="$parent.errorMessagesForm.error === true">
                        <strong v-if="$parent.errorMessagesForm.childName">{{ $parent.errorMessagesForm.childName }}</strong>
                        <br>
                        <strong v-if="$parent.errorMessagesForm.gender">{{ $parent.errorMessagesForm.gender }}</strong>
                        <br>
                        <strong v-if="$parent.errorMessagesForm.dateOfBirth">{{ $parent.errorMessagesForm.dateOfBirth }}</strong>
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
                                <label for="">Date Of Birth:</label>
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
</style>
