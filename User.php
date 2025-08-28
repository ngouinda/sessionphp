<?php
    class User {
        private $email;
        private $password;

        public function __construct($email, $password) {
            $this->email = $email;
            $this->password = password_hash($password, PASSWORD_BCRYPT);
        }

        public function getEmail() {
            return $this->email;
        }

        public function verifyPassword($password) {
            return password_verify($password, $this->password);
        }
    }


?>