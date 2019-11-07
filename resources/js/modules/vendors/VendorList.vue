<template>
    <div>
        <div class="row">
            <button class="btn btn-primary" @click="addNewVendor">+</button>
                <table class="table">
                    <thead>
                    <tr>
                        <td>#ID</td>
                        <td>Name</td>
                        <td>Contact</td>
                        <td>Address</td>
                        <td>Ingredients</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="vendor in vendors">
                        <td>{{ vendor.id}}</td>
                        <td>{{ vendor.name}}</td>
                        <td>{{ vendor.contact }}</td>
                        <td>{{ vendor.address }}</td>
                        <td>{{ vendor.ingredients.length }}</td>
                        <td>
                            <button class="btn btn-danger">x</button>
                            <button class="btn btn-info" @click="selectVendor(vendor)">e</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
        </div>
        <div class="row">
            <vendor-form @save="save" @cancel="cancel" :vendor="currentVendor"></vendor-form>
        </div>
        <div v-if="currentVendor.id">
            <ingredient-list @save="saveIngredient" :vendor="currentVendor"></ingredient-list>
        </div>

    </div>

</template>

<script>
    import IngredientForm from "./IngredientForm";
    import IngredientList from "./IngredientList";
    import VendorService from "../../services/VendorService";
    const service = new VendorService();
    export default {
        components: {IngredientList, IngredientForm},
        data() {
            return {
                response: vendors,
                vendors: vendors.data,
                currentVendor : this.defaultVendor(),
            }
        },
        methods : {
            selectVendor(vendor){
                this.currentVendor = vendor;
            },
            saveIngredient(payload){
                this.appendOrUpdateIngredient(payload.data.ingredient);
            },
            appendOrUpdateIngredient(ingredient){
                let vendor = this.vendors.findIndex((el) => el.id == ingredient.vendor_id);
                let existing = this.vendors[vendor].ingredients.findIndex(ing => ing.id == ingredient.id);
                if(existing == -1) {
                    this.vendors[vendor].ingredients.push(ingredient);
                }else {
                    this.vendors[vendor].ingredients[existing] = ingredient;
                }
            },
            save(payload){
                service.post(payload.id ? payload.id : null , payload)
                    .then(response => {
                        let vendor = response.data.vendor;
                        let index = this.vendors.findIndex(v => v.id == vendor.id);
                        if(index > 0) {
                            this.vendors[index] = vendor;
                        }else {
                            this.vendors.unshift(vendor);
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            cancel(payload) {

            },
            addNewVendor(){
                this.selectVendor(this.defaultVendor()) ;
            },
            defaultVendor(){
                return {name: '',contact : '', address : '', id: null};
            },
            removeIngredient(ingredient){
                let index = this.currentVendor.ingredients.findIndex(i => i.id == ingredient);
                if(index > 0) {
                    this.currentVendor.ingredients.splice(index, 1);
                }
            }
        }

    }
</script>

<style scoped>

</style>
