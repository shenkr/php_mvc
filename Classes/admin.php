<?php

class Admin
{
    public static function isLogged() {
        if(isset($_COOKIE['SSID'])) {
            return true;
        }
        else {
            false;
        }
    }

    private static $cookie_expire = 3600;

    private static function generateRandom($length = 64) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function login() {
        $hash = self::generateRandom();

        setcookie("SSID", $hash, time() + self::$cookie_expire, '/');
    }

    public static function logout() {

        setcookie("SSID", null, -$cookie_expire, '/');
    }
}
?>