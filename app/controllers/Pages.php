<?php
    class Pages extends Controller {

        public function __construct() {

        }

        public function index(): void {
            $data = [
                'title' => 'Welcome',
            ];
            $this->view('pages/index', $data);
        }
    }