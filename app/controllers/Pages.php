<?php
    class Pages extends Controller {
        public function __construct() {
            //Will use this later
        }

        public function index(): void {
            $data = ['title' => 'Welcome'];
            $this->view('pages/index', $data);
        }

        public function about() {
            $data = ['title' => 'About'];
            $this->view('pages/about', $data);
        }
    }