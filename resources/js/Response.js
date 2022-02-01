class ResponseJS { 
    getResponse(payload) {
        return new Promise(resolve => { 
            const initiate = JSON.parse(payload)
            return resolve(initiate)
        })
    }
}

export default new ResponseJS();