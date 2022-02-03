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
    }
})


