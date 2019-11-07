<template>
<div>
    <form>
        Name :
        <input type="text" class="form-control" name="name" v-model="vendor.name">
        Contact
        <input type="text" class="form-control" name="contact" v-model="vendor.contact">
        Address
        <input type="text" class="form-control" name="name" v-model="vendor.address">

    </form>
    <button class="btn btn-primary" @click="save">Save</button>

    <button class="btn btn-default" @click="cancel">Cancel</button>
</div>
</template>

<script>
    export default {
        props: ['vendor'],
        name: "VendorForm",
        methods : {
            save(){
                this.$emit('save', this.vendor)
            },
            cancel(){
                this.$emit('save', false)
            },

        }
    }
</script>

<style scoped>

</style>
