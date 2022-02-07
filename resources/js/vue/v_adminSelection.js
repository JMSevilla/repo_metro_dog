ELEMENT.locale(ELEMENT.lang.en)
import constructJS from "../main.js"
import ResponseConfiguration from "../Response.js";
new Vue({
    el : '#v_adminSelection',

    data(){

        return{
                platformObject:{
                    role: '',
                    fname: '',
                    lname: '',
                }
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
            this.$message({
              type: 'success',
              message: 'Cookies Destroyed',
              
            });
          }).catch(() => {
            ({
              
            });          
          });
        },
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
              ResponseConfiguration.getResponse(r).then(__debounce => {
                  switch(true){
                      case __debounce[0].key === "cookie_admin_exist":
                          loading.close();
                          return true
                      case __debounce[0].key === "cookie_admin_not_exist":
                          loading.close();
                          return window.location.href = "index"
                      case __debounce[0].key === "cookie_invalid":
                          loading.close();
                          return window.location.href = "index"
                  }
              })
          })
          }, 3000)
        }
      }
})


