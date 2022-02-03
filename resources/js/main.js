import state_initiate from "./environment.js"



class RequestConfiguration {
    checkUserConfig(callback){
        const promise = new Promise(resolve => { 
            $.post(state_initiate.instance.app + state_initiate.instance.HelperConfig.checkUserHelper.Route, callback, (response) => {
                return resolve(response)
            })
        })
        return promise;
    }
    postAdminRegistration(callback){
        const promise = new Promise(resolve => {
            $.post(state_initiate.instance.app + state_initiate.instance.HelperConfig.adminRegHelper.Route, callback, (response)=> {
                return resolve(response)
            })
        })
        return promise;
    }
    async postLogin(callback) { 
        const promise = new Promise(resolve => {
            $.post(state_initiate.instance.app + state_initiate.instance.HelperConfig.checkUserHelper.Route, callback, (response) => {
                return resolve(response)
            })
        })
        return await promise;
    }
}

class RequestVerifier extends RequestConfiguration { 
    checkUser_ClientRequest(payload) {
        if(payload.trigger === 1) {
            return this.checkUserConfig(payload);
        }
    }
    postAdmin_ClientRequest(payload){
        if(payload.trigger === 1){
            return this.postAdminRegistration(payload)
        }
    }
    postLogin_ClientRequest(payload) {
        if(payload.loginTrigger === 1) {
            return this.postLogin(payload)
        }
    }
}

export default new RequestVerifier();