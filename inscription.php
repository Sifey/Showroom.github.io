<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>L'escale à mangas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
  <link href="assets/css/animate.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic|Roboto+Condensed:400,300,700" rel="stylesheet" />

  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/color/default.css" rel="stylesheet" />

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="ico/favicon.ico" />

  <!-- =======================================================
    Theme Name: Vesperr
    Theme URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <!-- start top -->
    <div id="topnav" class="navbar navbar-fixed-top default">
      <div class="navbar-inner">
        <div class="container">
          <div class="logo">
            <img width='60' src="assets/img/manga.png" alt="" />
          </div>
          <div class="navigation">
            <nav>
              <ul class="nav pull-right">
              	<li><a href="index.php" class="external">Actualité</a></li>
                <li><a href="select.php" class="external">Sélection</a></li>
                <li class="current"><a href="#intro">Inscription</a></li>
                <li><a href="session.php" class="external">Connexion</a></li>
              </ul>
            </nav>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- end top -->
    <!-- Formulaire d'inscription -->
  </header>
<section id="intro">
    <div class="slogan">
      <div class="icon">
        <i class="icon-pencil icon-10x"></i>
      </div>
      <div id="contenu">
			<form action="action.php" method="post">
				<fieldset>
					<legend><h1><em><span>Inscription :</span></h3></legend>
					<p>Votre nom :</p> <input type="text" name="nom" />
					<br />
					<br />
					<p>Votre prénom :</p> <input type="text" name="prenom" />
					<br />
					<br />
					<p>Votre adresse email :</p> <input type="email" name="email" required="@" />
					<br />
					<br />
					<p>Votre pseudo :</p> <input type="text" name="pseudo" />
					<br />
					<br />
					<p>Votre mot de passe :</p> <input type="password" name="mdp1" />
					<br />
					<br />
					<p>Confirmez votre mot de passe :</p> <input type="password" name="mdp2" />
					<br />
					<br />
					<input type="submit" value="Valider">
				</fieldset>
			</form>
		</div>
    </div>
  </section>