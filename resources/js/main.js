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
    postUserRegistration(callback){
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
    async scanToken(callback) {
        const promise = new Promise((resolve, reject) => {
            $.ajax({
                url : state_initiate.instance.cookieManagement + state_initiate.instance.CookieConfig.scanToken.Route,
                method : 'post',
                data : {
                    tokenName : callback,
                    scanCookie : true
                },
                success : function(response) {
                    return resolve(response)
                },
                error : function(e) {
                    return reject(e)
                }
            })
        })
        return await promise;
    }
    fetchQuestion(){
        return new Promise(resolve => {
            $.ajax({
                method: 'post',
                url : state_initiate.instance.app + state_initiate.instance.HelperConfig.adminRegHelper.Route,
                data : {
                    getQuestions: true
                },
                success : function(response) {
                    return resolve(response)
                }
            })
        })
    }

    fetchBranch(){
        return new Promise(resolve => {
            $.ajax({
                method: 'post',
                url : state_initiate.instance.app + state_initiate.instance.HelperConfig.adminRegHelper.Route,
                data : {
                    getBranch: true
                },
                success : function(response) {
                    return resolve(response)
                }
            })
        })
    }
    updateOnAdminPlatformSelect() {
        const promise = new Promise((resolve) => {
            $.ajax({
                method : 'post',
                url : state_initiate.instance.app + state_initiate.instance.HelperConfig.checkUserHelper.Route,
                data : {
                    update_on_select_admin : true,
                    tokenName : localStorage.getItem('key_identifier')
                },
                success : function(response){
                    return resolve(response)
                }
            })
        })
        return promise;
    }
    // Chage Platform Admin Dashboard
    updateOnAdminChangePlatformSelect() {
        const promise = new Promise((resolve) => {
            $.ajax({
                method : 'post',
                url : state_initiate.instance.app + state_initiate.instance.HelperConfig.checkUserHelper.Route,
                data : {
                    update_on_admin_selection : true,
                    tokenName : localStorage.getItem('key_identifier')
                },
                success : function(response){
                    return resolve(response)
                }
            })
        })
        return promise;
    }

    adminSelectionLogout(){
        const promise = new Promise((resolve) => {
            $.ajax({
                method : 'post',
                url : state_initiate.instance.app + state_initiate.instance.HelperConfig.checkUserHelper.Route,
                data : {
                    update_on_logout_admin : true,
                    tokenName : localStorage.getItem('key_identifier')
                },
                success : function(response){
                    return resolve(response)
                }
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
    postAdmin_ClientRequest(payload){
        if(payload.trigger === 1){
            return this.postAdminRegistration(payload)
        }
    }
    postUserRegistration_ClientRequest(payload){
        if(payload.uamtrigger === 1){
            return this.postUserRegistration(payload)
        }
    }
    postLogin_ClientRequest(payload) {
        if(payload.loginTrigger === 1) {
            return this.postLogin(payload)
        }
    }
    scanTokenClientRequest(payload){
       if(!payload){
        return false;
       }else{
        return this.scanToken(payload)
       }
    }
    fetchQuestionClientRequest(){
        return this.fetchQuestion();
    }
    fetchBranchClientRequest(){
        return this.fetchBranch();
    }
    updateOnAdminSelectionClientRequest(){
        return this.updateOnAdminPlatformSelect()
    }
    updateOnAdminSelectionLogoutClientRequest(){
        return this.adminSelectionLogout()
    }
    updateOnAdminChangePlatformClientRequest(){
        return this.updateOnAdminChangePlatformSelect()
    }

}

export default new RequestVerifier();