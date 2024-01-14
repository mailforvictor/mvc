<?php

namespace app\controller;

use app\utils\Token;
use Exception;
use Random\RandomException;

class TicketController extends AppController {
    public function indexAction(): void {
    }

    public function checkoutAction(): void {
        if($this->isPost()) {
            extract($this->post_query);
            try {
                Token::checkToken($token);
            } catch(Exception $e) {
            } finally {
                $_SESSION['errors'] = "<li>Sorry, this option is temporarily unavailable</li>";
                redirect("/");
            }
        }

        $token = '';
        try {
            $token = Token::genToken();
        } catch(RandomException $e) {
        } finally {
            $_SESSION['errors'] = "<li>Sorry, this option is temporarily unavailable</li>";
            redirect('/');
        }

        $this->setTitlePage('Checkout');
        $this->set(compact('token'));
    }
}