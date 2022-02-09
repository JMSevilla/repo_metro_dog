ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../main.js"
import ResponseConfiguration from "../Response.js"
new Vue({
    el : '#v_adminSelection',

    data(){

        return{
                platformObject:{
                    role: '',
                    fname: '',
                    lname: '',
                },
                fullscreenLoadingOnLogout: false
        }
    },
    created(){
        console.log(this.platformObject)
        this.adminScanning();
    },
    mounted(){
      // JSON.parse(localStorage.getItem("info"))[0].role
      if(!localStorage.getItem('info') 
      || localStorage.getItem('info') == null ||
       localStorage.getItem('info') == undefined){
        return false;
      }else {
        this.platformObject.role = JSON.parse(localStorage.getItem("info"))[0].role
        this.platformObject.fname = JSON.parse(localStorage.getItem("info"))[0].fname
        this.platformObject.lname = JSON.parse(localStorage.getItem("info"))[0].lname
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
                      return window.location.href = "admin"
                    case __debounce[0].key === "cookie_admin_not_exist":
                        return window.location.href = "index"
                    case __debounce[0].key === "cookie_invalid":
                        return window.location.href = "index"
                }
            })
        })
        },
        onadminselect: function(){
            constructJS.updateOnAdminSelectionClientRequest().then(r => {
              console.log(r)
              ResponseConfiguration.getResponse(r).then(__debounce => {
                console.log(__debounce)
              })
            })
        }
      }
})


