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
        this.scanningToken();
    },
    methods : {
        oncheckUser : function() {
            constructJS.checkUser_ClientRequest(this.checkObject).then(r => {
                console.log(r)
                // ResponseConfiguration.getResponse(r).then(resp => {
                //     switch(true){
                //         case resp[0].key == 'admin_not_exist':
                //             return window.location.href = "http://localhost/metrodog/admin_registration"
                //     }
                // })
            })
        },
        scanningToken: function(){
            let key = localStorage.getItem('key_identifier') ? localStorage.getItem('key_identifier') : "unknown"
            if(!key || key == null) {
                return false;
            } else { 
                constructJS.scanTokenClientRequest(
                    key
                ).then(r => {
                    console.log(r)
                    ResponseConfiguration.getResponse(r).then(__debounce => {
                        switch(true){
                            case __debounce[0].key === "cookie_admin_exist_platform_admin":
                                return window.location.href = "admin"
                            case __debounce[0].key === "cookie_admin_exist_platform_admin_selection":
                                return window.location.href = "adminSelection"
                            case __debounce[0].key === "cookie_invalid":
                                return false
                            case __debounce[0].key === "cookie_admin_not_exist":
                                return false
                        }
                    })
                })
            }
        },
        checkEnter: function(){
            this.onLogin();
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
                                    case __debounce[0].key.message === "success_admin":
                                        this.$notify.success({
                                            title: 'Success',
                                            message: 'Successfully Logged in',
                                            offset: 100
                                          });
                                          localStorage.setItem("key_identifier", this.taskObject.username)
                                          let info = []
                                          info.push({fname:__debounce[0].key.fname,lname:__debounce[0].key.lname,role:__debounce[0].key.role})
                                          localStorage.setItem("info",JSON.stringify(info))
                                          this.fullscreenLoading = false;
                                          //route -> choose platform -> admin select
                                          return window.location.href = "adminSelection"
                                    case __debounce[0].key === "account_disabled":
                                        this.$notify.warning({
                                            title: 'Warning',
                                            message: 'This account was disabled, please contact the admin',
                                            offset: 100
                                          });
                                          this.taskObject.password = "";
                                          this.fullscreenLoading = false;
                                          return false
                                    case __debounce[0].key === "invalid_password":
                                        this.$notify.error({
                                            title: 'Error',
                                            message: 'Invalid Password',
                                            offset: 100
                                          });
                                          this.taskObject.password = "";
                                          this.fullscreenLoading = false;
                                          return false
                                    case __debounce[0].key === "account_not_found":
                                        this.$notify.error({
                                            title: 'Error',
                                            message: 'This account was not found',
                                            offset: 100
                                          });
                                          this.taskObject.password = "";
                                          this.fullscreenLoading = false;
                                          return false
                                }
                            })
                        })
                    }, 2000)
                }
            })
        }
    }
})