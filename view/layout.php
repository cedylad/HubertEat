<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="cedylad">
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <meta name="description" content="La restauration pour les H">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </head>

  <body> 
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="./?action=home">HuberEat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" href="./?action=restaurant">Les restaurants</a>
            </li>
            <li>
              <a class="nav-link active" href="./?action=restaurateur">Les restaurateurs</a>
            </li>
          </ul>

          <?php if (isLoggedOn()) { ?>

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

              <?=$prenom . " " . $nom;?>

            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="./?action=profil">              
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                  </svg>
                  Mon profil
                </a>
              </li>
              <li><a class="dropdown-item" href="./?action=deconnexion">Se déconnecter</a></li>
            </ul>
          </div>

          <?php } else { ?>

          <a href="./?action=connexion" class="btn btn-info">Me connecter</a>

          <?php }?>
        </div>
      </div>
    </nav>

    <main class="container" style="margin-top:100px;">

      <?= $content ?>

    </main>

  </body>
</html>
