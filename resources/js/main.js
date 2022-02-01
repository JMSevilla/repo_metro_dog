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
}

class RequestVerifier extends RequestConfiguration { 
    checkUser_ClientRequest(payload) {
        if(payload.trigger === 1) {
            return this.checkUserConfig(payload);
        }
    }
}

export default new RequestVerifier();