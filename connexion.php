<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
    require_once 'SessionManager.php';
    require_once 'User.php';

    SessionManager::startSession();

    if (SessionManager::getUser()) {
        header('Location: index.php');
        exit();
    }

    $error = '';

    if (isset($_POST['connexon'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email === 'toto@gmail.fr' &&  $password === '1234') {
            $user = new User($email, $password);
            SessionManager::setUser($user);
            header('Location: dashboard.php');
            exit();

        }
        else {
           $error= "Invalid email or password";
        }

        if (isset($error)) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($error) . '</div>';
        }
        

    }
?>
  

    <form class="container mt-5" method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Login</button> -->
        <input type="Submit" value="connexon" name="connexon">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>