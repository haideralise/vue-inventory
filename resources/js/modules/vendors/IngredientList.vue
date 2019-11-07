<template>
    <div>
        <h3> {{vendor.name}} Ingredients  <button class="btn btn-primary" @click="addNew">+</button></h3>

        <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Unit</td>
                    <td>Price</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="ingredient in vendor.ingredients">
                    <td>{{ ingredient.id}}</td>
                    <td>{{ ingredient.name}}</td>
                    <td>{{ ingredient.unit }}</td>
                    <td>{{ ingredient.price }}</td>
                    <td>
                        <button class="btn btn-danger" @click="removeIngredient(ingredient)">x</button>
                        <button class="btn btn-info" @click="selectIngredient(ingredient)">e</button>

                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <div class="col-md-4">
            <ingredient-form
                @cancel="cancel"
                @save="save"
                :ingredient="currentIngredient"
                v-if="showFormData"></ingredient-form>
        </div>
    </div>
    </div>

</template>

<script>
    import IngredientForm from "./IngredientForm";
    import IngredientService from "../../services/IngredientService";
    var service = new IngredientService();
    export default {
        components: {IngredientForm},
        props: ['vendor'],
        name: "IngredientList",
        data(){
            return {
                currentIngredient: this.defaultIngredient(),
                showFormData : false
            };
        },
        methods : {
            selectIngredient(ingredient){
                this.currentIngredient = ingredient;
                this.showForm();
            },
            cancel(event) {
                this.currentIngredient = this.defaultIngredient();
                this.showForm(false);
            },
            save(event) {
                service.save(event).then(response => {
                   this.$emit('save', response);
                }).catch(error => {
                    let message = Object.values(error.response.data.errors).join(', ');
                    service.notification(message, 'error');
                });
            },
            addNew(){
                this.currentIngredient = this.defaultIngredient();
                this.showForm();
            },
            defaultIngredient(){
                return {
                    vendor_id : this.vendor.id,
                    price : 1,
                    unit : 'kg',
                    name : '',
                    id: null
                };
            },
            showForm(show=true){
                this.showFormData = show;
            },
            removeIngredient(ingredient){
                service.delete(`${ingredient.vendor_id}/${ingredient.id}`).then(response => {
                    let index = this.vendor.ingredients.findIndex(i => i.id == ingredient.id);
                    if(index > 0) {
                        this.vendor.ingredients.splice(index, 1);
                    }
                    service.notification(response.data.message);
                }).catch(error => service.unAuthorizeMessage(error));


            }
        }
    }
</script>

<style scoped>

</style>
