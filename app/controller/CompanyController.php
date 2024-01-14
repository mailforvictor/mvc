<?php

namespace app\controller;

class CompanyController extends AppController {
    public function indexAction(): void {
    }

    public function aboutAction(): void {
        $this->setTitlePage('About - Astronomy Website Template');
    }

    public function blogAction(): void {
        $this->setTitlePage('Blog - Astronomy Website Template');
    }

    public function contactAction(): void {
        $this->setTitlePage('Contact - Astronomy Website Template');
    }

    public function galleryAction(): void {
        $this->setTitlePage('Gallery - Astronomy Website Template');
    }
}