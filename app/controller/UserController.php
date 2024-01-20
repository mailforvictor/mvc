<?php

namespace app\controller;

use app\model\UserModel;
use app\utils\Validator;
use JetBrains\PhpStorm\NoReturn;


class UserController extends AppController {
    private UserModel $user;

    public function __construct($route) {
        parent::__construct($route);
        $this->user = new UserModel();
    }

    public function indexAction(): void {
    }

    #[NoReturn] public function getUsersAction(): void {
        if($this->isAjax() && $this->isGet()) {
            echo json_encode($this->response($this->user->getUserList(), 200));
        }
        die;
    }

    #[NoReturn] public function getAction(): void {
        if($this->isAjax() && $this->isPost()) {
            if(empty($this->post_query['id']) || !is_int(intval($this->post_query['id']))) {
                echo json_encode($this->response("Incorrect data", 400));
                die;
            }
            $user = $this->user->getUserById($this->post_query['id']);
            if($user) {
                echo json_encode($this->response($user, 200));
            } else {
                echo json_encode($this->response('User not found', 404));
            }
        }
        die;
    }

    #[NoReturn] public function deleteAction(): void {
        if($this->isAjax() && $this->isPost()) {
            if(empty($this->post_query['id']) || !is_int(intval($this->post_query['id']))) {
                echo json_encode($this->response("Incorrect data", 400));
                die;
            }
            $user = $this->user->remove($this->post_query['id']);
            if($user) {
                echo json_encode($this->response('ok', 200));
            } else {
                echo json_encode($this->response('User not found', 404));
            }
        }
        die;
    }

    #[NoReturn] public function addAction(): void {
        if($this->isAjax() && $this->isPost()) {
            if(!$this->post_query) {
                echo json_encode($this->response("Incorrect data", 400));
                die;
            }
            $validation = new Validator();
            $errors = $validation->userValidation($this->post_query);
            if($errors != null) {
                echo(json_encode($this->response($errors, 400)));
                die;
            }
            try {
                $user = new UserModel();
                $newUser = $user->add($this->post_query);
            } catch(\Exception $e) {
                echo(json_encode($this->response($e->getMessage(), 500)));
                die;
            }
            echo json_encode($this->response($newUser, 200));
            die;
        }
        die;
    }

    private function response($message, $code): array {
        http_response_code($code);
        $this->response['data'] = $message;
        return $this->response;
    }
}