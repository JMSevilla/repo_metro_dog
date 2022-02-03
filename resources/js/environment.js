
const instance = { 
    app : 'app/HTTP/Helpers',
    cookieManagement : 'app/Database/CookieManagement',
    HelperConfig : {
        checkUserHelper : {
            Route : '/checkUser_Helper.php'
        },
        adminRegHelper : {
            Route: '/adminReg_Helper.php'
        }
    },
    CookieConfig : {
        scanToken : { 
            Route : '/cookieManagement.php'
        }
    }
}

export default {instance}