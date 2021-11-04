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
	  <?php
		//Ouverture d'une session
		session_start();
		/*Affectation dans des variables du pseudo/mot de passe s'ils existent,
		affichage d'un message sinon*/
		if ($_POST["pseudo"] && $_POST["mdp"]){
		  $id=$_POST["pseudo"];
		  $mdp=$_POST["mdp"];
		  // Connexion à la base MariaDB
		  $mysqli = new mysqli("localhost","root","", "showroom", 3307);
		}
		if ($mysqli->connect_errno) {
		  // Affichage d'un message d'erreur
		  echo "Error: Problème de connexion à la BDD \n";
		  // Arrêt du chargement de la page
		  exit();
		}
		// Recherche du compte utilisateur à partir des pseudo / mot de passe saisis
		$sql="SELECT com_pseudo, pro_statut
		FROM t_compte_utilisateur_com JOIN t_profil_utilisateur_pro USING (com_pseudo)
		WHERE com_pseudo='" .$id. "' AND com_mot_de_passe=MD5('" .$mdp. "') AND pro_validite_du_profil='A';";

		/* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
		$resultat = $mysqli->query($sql);
		if ($resultat==false) {
		  // La requête a echoué
		  echo "Error: Problème d'accès à la base \n";
		  exit();
		}
		else {
		  // Vérification si le compte existe (et est activé)
		  if($resultat->num_rows == 1) {
			//Mise à jour des données de la session
			$_SESSION['login']=$id;
			// Récupération du statut
			$result_statut = $resultat->fetch_assoc();
			$statut = $result_statut['pro_statut'];
			echo ($statut);
			$_SESSION['statut']=$statut;
			/* Redirection vers la page autorisée à cet utilisateur*/
			header("Location:admin_accueil.php");
			}
			else{
			  // aucune ligne retournée
			  // => le compte n'existe pas ou n'est pas valide
			  echo "<h2>pseudo/mot de passe incorrect(s) ou profil inconnu/désactivé ! (Redirection en cours)</h2>";
			  header("refresh:4 ; url= session.php");
			}
		}
		//Fermeture de la communication avec la base MariaDB
		$mysqli->close();
	  ?>
 	</div>
  </section>
 </body>
</html>
