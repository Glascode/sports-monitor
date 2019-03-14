<?php

require_once __DIR__ . '/View.php';

class PrivateView extends View {

    public function __construct(Router $router) {
        parent::__construct($router);
        $this->menu = [
            'lequipe' => [
                'title' => 'Feed',
                'url' => '/feed'
            ],
            'trends' => [
                'title' => 'Twitter trends',
                'url' => '/trends'
            ]
        ];
        $this->menuProfile = [
            'title' => 'Login',
            'url' => '/login'
        ];
    }

}