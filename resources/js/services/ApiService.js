class ApiService {
    constructor(){
        this.url = `http://localhost:8000/api`;
        this.section = '';
        this.module = '';
    }
    setModule(module){
        this.module = module;
    }
    prepareUrl(id = null){
        let url = `${this.url}/${this.module}/`;
        if(id) {
            url += id;
        }
        return url;
    };
    get(id=null, data = {}){
        return axios.get(this.prepareUrl(id), data);
    }
    post(id = null, data = {}){
        return axios.post(this.prepareUrl(id), data);
    }
    patch(id = null, data = {}){
        return axios.patch(this.prepareUrl(id), data);
    }
    put(id = null, data = {}){
        return axios.post(this.prepareUrl(id), data);
    }

    delete(id = null, data = {}) {
        return axios.delete(this.prepareUrl(id), data)
    }

    unAuthorizeMessage(error){
        this.notification(error.response.data.message, 'error');
    }

    notification(message, type){
        alert(message);
    }

}
export default ApiService;
