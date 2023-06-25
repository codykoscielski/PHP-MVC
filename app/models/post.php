<?php

    class Post {
        private $db;

        function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM posts_tables");
            return $this->db->resultSet();
        }
    }