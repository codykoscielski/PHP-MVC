<?php
    /*
     * App Core Class
     * Creates URL & loads core controllers
     * URL FORMAT = /controllers/method/params
     */

    class Core {
        protected string $currentController = 'Pages';
        protected string $currentMethod = 'index';
        protected array $params = [];


        public function __construct(){
            //print_r($this->getURL());
            //Get the URL
            $url = $this->getURL();
            //Look into controllers for first value
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                //If exists, then set as controllers
                $this->currentController = ucwords($url[0]);
                //unset 0 index
                unset($url[0]);
            }
            //Require the correct controllers
            require_once '../app/controllers/' . $this->currentController . '.php';

            //Instantiate controllers class
            //Ex: $pages = new Pages
            $this->currentController = new $this->currentController;

        }

        public function getURL() {
            //Check to see if a URL is set
            if(isset($_GET['url'])) {
                //Remove the ending slash
                $url = rtrim($_GET['url'], '/');
                //Remove any characters that a URL should not have
                $url = filter_var($url, FILTER_SANITIZE_URL);
                //Break URL out into an array
                $url = explode('/', $url);
                return $url;
            }
        }

    }