<template lang="html">
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
