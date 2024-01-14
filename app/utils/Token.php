<?php

namespace app\utils;

use Exception;
use Random\RandomException;

class Token {
    /**
     * @throws RandomException
     */
    public static function genToken(): string {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        return $token;
    }

    /**
     * @throws Exception
     */
    public static function checkToken($token): bool {
        if(!(isset($_SESSION['token']) && hash_equals($_SESSION['token'], $token))) {
            throw new Exception("Broken the token :)", 500);
            die;
        }
        return true;
    }
}