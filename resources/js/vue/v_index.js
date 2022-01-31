ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../main.js"
import SystemValidation from "../validation.js"
new Vue({
    el : '#v_loginpage',
    data: () => ({
        taskObject: {
            username: '', password: '', trigger : 1
        }
    }),
    methods : {
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
                        title: 'Password Less That 6 characters',
                        message: 'Sorry the password is less that 6 characters',
                        offset: 100
                      });
                      return false;
                } else { 
                    constructJS.checkUser_ClientRequest(this.taskObject).then(r => {
                        console.log(r)
                    })
                }
            })
        }
    }
})