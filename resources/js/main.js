import state_initiate from "./environment.js"

class ResponseJS { 
    getResponse(payload) {
        return new Promise(resolve => { 
            const initiate = JSON.parse(payload)
            return resolve(initiate)
        })
    }
}

class RequestConfiguration {
    checkUserConfig(){
        const promise = new Promise(resolve => { 
            $.post(state_initiate.instance.app + state_initiate.instance.HelperConfig.checkUserHelper, (response) => {
                return resolve(response)
            })
        })
        return promise;
    }
}

class RequestVerifier extends RequestConfiguration { 
    checkUser_ClientRequest(payload) {
        if(payload.trigger === 1) {
            return this.checkUserConfig();
        }
    }
}

export default new RequestVerifier();