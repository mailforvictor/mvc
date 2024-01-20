<?php

namespace app\controller;

use app\model\UserModel;
use app\utils\Validator;
use JetBrains\PhpStorm\NoReturn;
use mvc\Token;


class UserController extends AppController {
    private UserModel $user;
    public array $response = [];

    public function __construct($route) {
        parent::__construct($route);
        $this->user = new UserModel();
        $this->response['token'] = Token::getToken();
    }

    public function indexAction(): void {
    }

    #[NoReturn] public function getUsersAction(): void {
        if($this->isAjax() && $this->isGet()) {
            http_response_code(200);
            $this->response['data'] = $this->user->getUserList();
            echo json_encode($this->response);
        }
        die;
    }

    #[NoReturn] public function getAction(): void {
        if($this->isAjax() && $this->isPost()) {
            extract($this->post_query);
            $user = $this->user->getUserById($id);
            if($user) {
                http_response_code(200);
                $this->response['data'] = $user;
                echo json_encode($this->response);
            } else {
                http_response_code(404);
                $this->response['data'] = 'User not found';
                echo json_encode($this->response);
            }
        }
        die;
    }

    #[NoReturn] public function deleteAction(): void {
        if($this->isAjax() && $this->isPost()) {
            $user = $this->user->remove($this->post_query['id']);
            if($user) {
                http_response_code(200);
                $this->response['data'] = 'ok';
                echo json_encode($this->response);
            } else {
                http_response_code(404);
                $this->response['data'] = 'User not found';
                echo json_encode($this->response);
            }
        }
        die;
    }

    #[NoReturn] public function addAction(): void {
        if($this->isAjax() && $this->isPost()) {
            $validation = new Validator();
            $errors = $validation->userValidation($this->post_query);
            if($errors != null) {
                $this->response['data'] = $errors;
                echo(json_encode($this->response));
                die;
            }
            try {
                $user = new UserModel();
                $newUser = $user->add($this->post_query);

            } catch(\Exception $e) {
                $this->response['data'] = $e->getMessage();
                echo(json_encode($this->response));
                die;
            }
            $this->response['data'] = $newUser;
            echo json_encode($this->response);
            die;
        }
        die;
    }
}