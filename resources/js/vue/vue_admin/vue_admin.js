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
            const loading = this.$loading({
              lock: true,
              text: 'Loading',
              spinner: 'el-icon-loading',
              background: 'rgba(0, 0, 0, 0.7)'
            });
            setTimeout(() => {
              constructJS.scanTokenClientRequest(
                key
            ).then(r => {
                console.log(r)
                ResponseConfiguration.getResponse(r).then(__debounce => {
                    switch(true){
                        case __debounce[0].key === "cookie_admin_exist_platform_admin":
                            loading.close();
                            return true
                        case __debounce[0].key === "cookie_admin_exist_platform_admin_selection":
                            loading.close();
                            return window.location.href = "adminSelection"
                        case __debounce[0].key === "cookie_invalid":
                            loading.close();
                            return window.location.href = "index"
                    }
                })
            })
            }, 1000)
          }
    }
})