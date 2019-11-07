import ApiService from "./ApiService";

class VendorService  extends ApiService{
    constructor(){
        super();
        this.setModule('vendors');
    }
    save(event) {

        let id = event.vendor_id;
        if(event.id) {
            id += `/${event.id}`;
        }
        return this.post(id, event);
    }

}
export default VendorService;
