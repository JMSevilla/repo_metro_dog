ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../../main.js"
import ResponseConfiguration from "../../Response.js"
new Vue({
    el : '#admin_dash_nav',

    data(){

        return{
              
                fullscreenLoadingOnLogout: false
        }
    },

    methods: {
        onLogout() {
            this.$confirm('Are you sure you want to Log Out?', 'Warning', {
              confirmButtonText: 'OK',
              cancelButtonText: 'Cancel',
              type: 'warning'
            }).then(() => {
              this.fullscreenLoadingOnLogout = true
              setTimeout(() => {
                constructJS.updateOnAdminSelectionLogoutClientRequest().then(r => {
                  ResponseConfiguration.getResponse(r).then(__debounce => {
                    switch(true){
                      case __debounce[0].key === "admin_logout":
                          this.fullscreenLoadingOnLogout = false;
                          return window.location.href = "index";
                    }
                  })
                })
              }, 1000)
            })
          },
          adminScanning: function() {
            let key = localStorage.getItem('key_identifier') ? localStorage.getItem('key_identifier') : "unknown"
            if(!key || key == null) {
                return false;
            }
            constructJS.scanTokenClientRequest(
                key
            ).then(r => {
                ResponseConfiguration.getResponse(r).then(__debounce => {
                    switch(true){
                        case __debounce[0].key === "cookie_admin_exist_platform_admin":
                            return true
                        case __debounce[0].key === "cookie_admin_exist_platform_admin_selection":
                            return window.location.href = "adminSelection"
                        case __debounce[0].key === "cookie_invalid":
                            return window.location.href = "index"
                    }
                })
            })
          },
          changePlatform: function(){
            constructJS.updateOnAdminChangePlatformClientRequest().then(r => {
                console.log(r)
                ResponseConfiguration.getResponse(r).then(__debounce => {
                  console.log(__debounce)
                  switch(true){
                    case __debounce[0].key === "change_platform":
                        // this.fullscreenLoadingOnLogout = false;
                        return this.adminScanning()
                  }
                })
              })
           
            }
    }
})