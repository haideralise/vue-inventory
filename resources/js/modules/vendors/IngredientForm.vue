<template>
<div class="col-md-12">
    <form>
        Name :
        <input type="text" class="form-control" name="name" v-model="ingredient.name">
        Unit
        <input type="text" class="form-control" name="unit" v-model="ingredient.unit">
        Price
        <input type="text" class="form-control" name="price" v-model="ingredient.price">
        <button type="button" class="btn btn-primary" @click="save(ingredient)">Save</button>
        <button type="button" class="btn btn-primary" @click="cancel">Cancel</button>
    </form>
</div>
</template>

<script>
    export default {
        props: ['ingredient'],
        name: "IngredientForm",
        methods: {
            cancel(){
                this.$emit('cancel', true)
            },
            save(ingredient){
                this.$emit('save', ingredient)
            }
        }
    }
</script>

<style scoped>

</style>
