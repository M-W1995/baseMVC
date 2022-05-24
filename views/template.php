<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>HTML 5 Boilerplate</title>
   <link rel="stylesheet" href="<?=BASE?>/css/style.css">
</head>
<body>

<nav class="navbar">
   <div class="navbar-start">
      <div class="navbar-brand">
         <a href="<?=BASE?>/">Brand</a>
      </div>
      <div class="burger">
         <span class="burger-icon"></span>
         <span class="burger-icon"></span>
         <span class="burger-icon"></span>
      </div>
   </div>
   <div class="navbar-content">
      <a href="#">Lien 1</a>
      <?php if ($controller->isLoggedIn()): ?>
         <a href="<?=BASE?>/login">Déconnexion</a>
      <?php else: ?>
         <a href="<?=BASE?>/register">Inscription</a>
         <a class="button primary" href="<?=BASE?>/login">Connexion</a>
      <?php endif; ?>
   </div>
</nav>

<?= $content ?>

<footer class="footer">
   <div class="container">
      Copyright rien du tout
   </div>
</footer>

</body>
</html>