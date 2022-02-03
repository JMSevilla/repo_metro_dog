ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../main.js"
import SystemValidation from "../validation.js"
import ResponseConfiguration from "../Response.js"
new Vue({
    el : '#v_loginpage',
    data: () => ({
        taskObject: {
            username: '', password: '', loginTrigger : 1
        },
        checkObject : {
            trigger : 1
        },
        fullscreenLoading : false,
        /* taskObject caused of conflict when backend responses JSON */
    }),
    created(){ 
        this.oncheckUser()
    },
    methods : {
        oncheckUser : function() {
            constructJS.checkUser_ClientRequest(this.checkObject).then(r => {
                console.log(r)
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
                    this.fullscreenLoading = true;
                    setTimeout(() => {
                        constructJS.postLogin_ClientRequest(this.taskObject).then(r => {
                            console.log(r)
                            ResponseConfiguration.getResponse(r).then(__debounce => {
                                switch(true){
                                    case __debounce[0].key === "success_admin":
                                        this.$notify.success({
                                            title: 'Success',
                                            message: 'Successfully Logged in',
                                            offset: 100
                                          });
                                          this.fullscreenLoading = false;
                                          //route -> choose platform -> admin select
                                          return true;
                                    case __debounce[0].key === "account_disabled":
                                        this.$notify.warning({
                                            title: 'Warning',
                                            message: 'This account was disabled, please contact the admin',
                                            offset: 100
                                          });
                                          this.fullscreenLoading = false;
                                          return false
                                    case __debounce[0].key === "invalid_password":
                                        this.$notify.error({
                                            title: 'Error',
                                            message: 'Invalid Password',
                                            offset: 100
                                          });
                                          this.fullscreenLoading = false;
                                          return false
                                    case __debounce[0].key === "account_not_found":
                                        this.$notify.error({
                                            title: 'Error',
                                            message: 'This account was not found',
                                            offset: 100
                                          });
                                          this.fullscreenLoading = false;
                                          return false
                                }
                            })
                        })
                    }, 3000)
                }
            })
        }
    }
})