ELEMENT.locale(ELEMENT.lang.en)
new Vue({
    el : '#v_adminSelection',

    data(){

        return{
                platformObject:{
                    role: JSON.parse(localStorage.getItem("info"))[0].role,
                    fname: JSON.parse(localStorage.getItem("info"))[0].fname,
                    lname: JSON.parse(localStorage.getItem("info"))[0].lname,
                }
        }
    },
    created(){
        console.log(this.platformObject)
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
        }
      }
})


