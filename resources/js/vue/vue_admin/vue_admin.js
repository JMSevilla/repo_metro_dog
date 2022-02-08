ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../../main.js"
import ResponseConfiguration from "../../Response.js"
new Vue({
    el : '#admin_dash',
    created(){
        this.adminScanning()
    },
    methods : {
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
          }
    }
})