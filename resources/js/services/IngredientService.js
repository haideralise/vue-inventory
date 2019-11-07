import ApiService from "./ApiService";

class IngredientService  extends ApiService{
    constructor(){
        super();
        this.setModule('ingredients');
    }
    save(event) {

        let id = event.vendor_id;
        if(event.id) {
            id += `/${event.id}`;
        }
        return this.post(id, event);
    }

}
export default IngredientService;
