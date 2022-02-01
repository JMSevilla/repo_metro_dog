ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../main.js"
import SystemValidation from "../validation.js"
import ResponseConfiguration from "../Response.js"
new Vue({
    el : '#v_loginpage',
    data: () => ({
        taskObject: {
            username: '', password: '', trigger : 1
        }
    }),
    created(){ 
        this.oncheckUser()
    },
    methods : {
        oncheckUser : function() {
            constructJS.checkUser_ClientRequest(this.taskObject).then(r => {
                ResponseConfiguration.getResponse(r).then(resp => {
                    switch(true){
                        case resp[0].key == 'admin_not_exist':
                            return window.location.href = "http://localhost/metrodog/admin_registration"
                    }
                })
            })
        },
        onLogin : function() {
            SystemValidation.validate_user_login(
                this.taskObject.username, this.taskObject.password
            ).then(response => {
                if(response === "emptyUsername") { 
                    this.$notify.error({
                        title: 'Empty Username',
                        message: 'Sorry the username is empty',
                        offset: 100
                      });
                      return false;
                } else if(response === "emptyPassword") { 
                    this.$notify.error({
                        title: 'Empty Password',
                        message: 'Sorry the password is empty',
                        offset: 100
                      });
                      return false;
                } else if(response === "passwordExceed") { 
                    this.$notify.error({
                        title: 'Password Length Invalid',
                        message: 'Sorry the password is less that 6 characters',
                        offset: 100
                      });
                      return false;
                } else { 
                    // 
                }
            })
        }
    }
})