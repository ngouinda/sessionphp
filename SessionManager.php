<?php

    class SessionManager {
        public static function startSession() {
            
              session_start();
            
        }

        public static function setUser(User $user) {
            $_SESSION['user'] = $user;
        }
        
        public static function getUser() {
            return $_SESSION['user'] ?? null;
        }

        public static function destroySession() {
            session_unset();
            session_destroy();
        }
    }

?>