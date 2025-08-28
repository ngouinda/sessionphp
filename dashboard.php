<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mon Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        require_once 'SessionManager.php';
        require_once 'User.php';
        SessionManager::startSession(); 

        $userFromSession = SessionManager::getUser();
        if ($userFromSession) {
           echo "<p>Welcome, " . htmlspecialchars($userFromSession->getEmail()) . "!</p>";
        }
        else {
            header('Location: connexion.php');
            exit();
        }

        // deconnexion
        if (isset($_GET['logout'])) {
            SessionManager::destroySession();
            header('Location: connexion.php');
            exit();
        }
        
    ?>

    <div class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Utilisateurs</div>
                    <div class="card-body">
                        <h5 class="card-title">Total</h5>
                        <p class="card-text fs-2">120</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center text-white bg-success mb-3">
                    <div class="card-header">Ventes</div>
                    <div class="card-body">
                        <h5 class="card-title">Chiffre d'affaires</h5>
                        <p class="card-text fs-2">25 500 €</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center text-dark bg-warning mb-3">
                    <div class="card-header">Tâches</div>
                    <div class="card-body">
                        <h5 class="card-title">En attente</h5>
                        <p class="card-text fs-2">5</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Dernières activités
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Activité</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Nouvel utilisateur inscrit</td>
                            <td>28/08/2025</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Commande #101 traitée</td>
                            <td>27/08/2025</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Rapport mensuel généré</td>
                            <td>26/08/2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>