
class SystemValidation { 
    validate_user_login(u, p) {
        return new Promise(resolve => {
            if(!u) {
                return resolve("emptyUsername")
            } else if (!p) {
                return resolve("emptyPassword")
            } else if(p.length <= 6) {
                return resolve("passwordExceed")
            } else { 
                return resolve("Good")
            }
        })
    }
}

export default new SystemValidation();