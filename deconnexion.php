<?php

require_once 'SessionManager.php';
require_once 'User.php';

SessionManager::startSession();
SessionManager::destroySession();
header('Location: connexion.php');
exit();

?>