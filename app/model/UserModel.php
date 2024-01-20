<?php

namespace app\model;

class UserModel extends AppModel {
    public $attributes = [
        'username' => '',
        'email' => '',
        'password' => '',
        'birthday' => '',
        'url' => '',
        'phone' => ''
    ];

    public function add(array $user) {
        $options = [
            'memory_cost' => 2048,
            'time_cost' => 4,
            'threads' => 3,
        ];
        $user['password'] = password_hash($user['password'], PASSWORD_ARGON2I, $options);
        $this->load($user);
        $id = $this->save('users', false);
        $this->attributes['id'] = $id;
        unset($this->attributes['password']);
        return $this->attributes;
    }

    public function remove(string $id) {
        $user = \R::load('users', $id);
        if($user['id'] != 0) {
            \R::trash($user);
            return $user;
        }
        return null;
    }

    public function getUserById(string $id) {
        return \R::findOne('users', 'id = ?', [$id]);
    }

    public function getUserList(): array {
        return \R::findAll('users');
    }
}