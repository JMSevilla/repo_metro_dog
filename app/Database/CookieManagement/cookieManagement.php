<?php

interface ICookie
{
    public function cookieSetter(
        $tokenRequest,
        $tokenTimeStamp,
        $tokenPath,
        $isSecure,
        $isHttp,
        $isSameSite,
        $tokenName
    );
}

class TokenParams
{
    public static $tokenInitialize = null;
}

class CookieManagement implements ICookie
{
    public function cookieSetter(
        $tokenRequest,
        $tokenTimeStamp,
        $tokenPath = null,
        $isSecure = false,
        $isHttp = false,
        $isSameSite = 'None',
        $tokenName
    ) {
        TokenParams::$tokenInitialize = array(
            'expires' => $tokenTimeStamp,
            'path' => $tokenPath,
            'secure' => $isSecure,
            'httponly' => $isHttp,
            'samesite' => $isSameSite
        );
        setcookie($tokenName, $tokenRequest, TokenParams::$tokenInitialize);
    }
}
