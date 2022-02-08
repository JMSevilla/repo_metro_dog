ELEMENT.locale(ELEMENT.lang.en)

new Vue({
    el : '#admin_dash_nav',




    methods: {
        onLogout: function(){
            this.$confirm('Are you sure you want to Log out?', 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
              })
            },
        changePlatform: function(){
            window.location.href = "adminSelection"
            }
    }
})

