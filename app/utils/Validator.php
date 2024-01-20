<?php

namespace app\utils;

class Validator {
    private int $usernameLength = 3;

    public function userValidation($user): array {
        $errors = [];
        $username = $this->validateUsername($user['username']);
        if($username) $errors[] = $username;
        $email = $this->validateEmail($user['email']);
        if($email) $errors[] = $email;
        $password = $this->passwordValidation($user['password']);
        if($password) $errors[] = $password;
        $birthday = $this->validateBirthday($user['birthday']);
        if($birthday) $errors[] = $birthday;
        $url = $this->validateUrl($user['url']);
        if($url) $errors[] = $url;
        $phone = $this->validatePhone($user['phone']);
        if($phone) $errors[] = $phone;

        return $errors;
    }

    public function validateBirthday($birthday): array {
        $birthday = str_replace(['/', '.', '-'], '-', $birthday);
        $arr = explode("-", $birthday);
        if(strlen($arr[0]) === 4) {
            $birthday = "{$arr[2]}-{$arr[1]}-{$arr[0]}";
        }
        return preg_match("/^((0[1-9])|([12][0-9])|(3[01]))-([01][0-2])-(\d{4})$/", $birthday) ? [] : ['message' => 'Invalid birthday.'];
    }

    public function passwordValidation($password): array {
        return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\/|\\|\|!@#$%^&*+()_-])[A-Za-z\/|\\|\|!@#$%^&*+()_-]{8,}$/", $password)
            ? []
            : ['message' => 'Password must contain one lowercase letter of the English alphabet, one uppercase letter and a special character.'];
    }

    private function validateEmail($email): array {
        return preg_match('/^[a-z]+@[a-z-]+\\.[a-z]+$/', $email) ? [] : ['message' => 'Invalid email'];
    }

    private function validateUsername($username): array {
        return preg_match('/^[a-zA-Z]+$/', $username) ? [] : ['message' => "Username must be only english letters lower case and at least {$this->usernameLength} characters."];
    }

    private function validateUrl(mixed $url): array {
        return preg_match("#^(http(s)?://)?(www\.)?([a-z-]+)\.([a-z]+)$#", $url) ? [] : ['message' => 'Invalid URL'];
    }

    private function validatePhone(mixed $phone): array {
        return preg_match('/^\d{10}$/', $phone) ? [] : ['message' => 'Invalid phone number'];
    }
}