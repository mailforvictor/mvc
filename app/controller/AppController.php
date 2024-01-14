<?php

namespace app\controller;

use app\model\AppModel;
use mvc\base\Controller;

class AppController extends Controller {
    public array $get_query;
    public array $post_query;

    public function __construct($route) {
        parent::__construct($route);
        $this->get_query = $this->filterInput($_GET);
        $this->post_query = $this->filterInput($_POST);
        new AppModel();
    }

    public function indexAction(): void {
        $this->setTitlePage('Astronomy Website Template');
    }

    private function filterInput(array $array): array {
        array_walk_recursive($array, function($value) {
            //...
        });

        return $array;
    }
}