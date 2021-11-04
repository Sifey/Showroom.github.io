
<?php
  /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
  autorisé à un utilisateur connecté. */
  session_start();
  if(!isset($_SESSION['login']) || !isset($_SESSION['statut']))
  {
	//Si la session n'est pas ouverte, redirection vers la page du formulaire
	header("Location:session.php");
	exit();
  }
?>
<html>
 <head>
 <!--entête du fichier HTML-->
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
                <li><a href="admin_accueil.php" class="external">Accueil & Profil(s)</a></li>
                <li><a href="admin_actualite.php" class="external">Gestion des actualités</a></li>
                <li><a href="admin_selection.php" class="external">Gestion des sélections</a></li>
                <li><a href="deconnexion.php" class="external">Déconnexion</a></li>
              </ul>
            </nav>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- end top -->
  </header>
 <section class="section">
    <div class="container">
      <div class="row">
        <div class="span12"></div>
      </div>
	  <!--contenu du fichier HTML-->
	  <?php
		$pseudo=htmlspecialchars(addslashes($_POST['pseudo']));
	    $statut=htmlspecialchars(addslashes($_POST['validite']));
	    $mysqli = new mysqli("localhost","root","", "showroom", 3307);
	    // vérification si le statut est correct
	    if ($_POST['validite']!='A' && $_POST['validite']!='D'){
		  echo "<h2>Erreur validité incorrect. Veuillez recommencer</h2>";
		  header("refresh:5 ; url= admin_accueil.php");
		  exit();
		}
		// vérification si le pseudo existe
		$requete1 = "SELECT com_pseudo FROM t_compte_utilisateur_com WHERE com_pseudo='" .$_POST['pseudo']. "';";
		$resultat1 = $mysqli->query($requete1);
		if ($resultat1->num_rows != 1){
		  echo "<h2>Erreur pseudo incorrect. Veuillez recommencer</h2>";
		  header("refresh:5 ; url= admin_accueil.php");
		  exit();
		}
		$requete="UPDATE t_profil_utilisateur_pro SET pro_validite_du_profil='" .$_POST['validite']. "' WHERE com_pseudo='" .$_POST['pseudo']. "';";
		$resultat = $mysqli->query($requete);
		if ($resultat==false) {
		  // La requête a echoué
		  echo "Error: Problème d'accès à la base \n";
		  echo ($requete);
		  exit();
		}
		header("Location:admin_accueil.php");
		//Ferme la connexion avec la base MariaDB
	    $mysqli->close();
	?>
 	</div>
  </section>
 </body>
</html>
