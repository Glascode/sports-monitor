<?php

require_once __DIR__ . '/View.php';

class PrivateView extends View {

    public $user;

    public function __construct(Router $router, $user) {
        parent::__construct($router);
        $this->user = $user;
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
        $this->me = $this->user['username'];
    }

}