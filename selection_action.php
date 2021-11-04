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
                <li><a href="admin_element.php" class="external">Gestion des éléments</a></li>
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
		  $sel=htmlspecialchars(addslashes($_POST['selection']));
	    $elt=htmlspecialchars(addslashes($_POST['element']));
      $action=htmlspecialchars(addslashes($_POST['action']));
      // Ouverture base de donnée
	    $mysqli = new mysqli("localhost","root","", "showroom", 3307);
      if ($mysqli->connect_errno)
      {
        // Affichage d'un message d'erreur
        echo "Error: Problème de connexion à la BDD \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        // Arrêt du chargement de la page
        exit();
      }
      // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
      if (!$mysqli->set_charset("utf8")) {
          printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
          exit();
      }
      // Test pour retirer un élément d'une sélection
      if ($action=="action_retier_elt") {
  	    // vérification si l'élément appartient à la sélection
  	    $requete_test = "SELECT * FROM t_element_ele JOIN t_liste_lis USING (ele_numero) WHERE sel_numero = '" .$_POST['selection']. "' AND ele_numero='" .$_POST['element']. "';";
  	    $result_test = $mysqli->query($requete_test);
    		if ($result_test==false) {
    		  // La requête a echoué
    		  echo "Error: Problème d'accès à la base \n";
    		  echo ($requete_test);
    		  exit();
    		}
    	  if ($result_test->num_rows != 1){
    	    echo "Erreur l'élément choisi n'appartient pas à la sélection choisie. Veuillez recommencer";
    		  header("refresh:5 ; url= admin_selection.php");
    		  exit();
    	  }
    	  // si l'élément appartient à la sélection on le supprime
    	  $requete_supp = "DELETE FROM t_liste_lis WHERE ele_numero='" .$_POST['element']. "' AND sel_numero='" .$_POST['selection']. "';";
    	  $result_supp = $mysqli->query($requete_supp);
    		if ($result_supp==false) {
    		  // La requête a echoué
    		  echo "Error: Problème d'accès à la base \n";
    		  exit();
    		}
      }
      // Test pour ajouter un élément dans une sélection
      else if ($action=="action_ajout") {
        // Vérification du choix de la sélection et de l'élément
        if ($sel=="" || $elt=="") {
          echo("<h2>Erreur, sélection ou élément vide. Veuillez recommencer.</h2>");
          header("refresh:4 ; url= admin_selection.php");
          exit();
        }
        // vérification si l'élément appartient déjà à la sélection
        $requete_test = "SELECT * FROM t_element_ele JOIN t_liste_lis USING (ele_numero) WHERE sel_numero = '" .$_POST['selection']. "' AND ele_numero='" .$_POST['element']. "';";
        $result_test = $mysqli->query($requete_test);
        if ($result_test==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          echo ($requete_test);
          exit();
        }
        if ($result_test->num_rows == 1){
          echo "<h2>Erreur l'élément appartient déjà à cette sélection. Veuillez recommencer</h2>";
          header("refresh:5 ; url= admin_selection.php");
          exit();
        }
        // Sinon ajout de l'élément dans la sélection
        $requete_ajout="INSERT INTO t_liste_lis VALUES ('$elt', '$sel');";
        $resultat_ajout = $mysqli->query($requete_ajout);
        if ($resultat_ajout==false) {
          // La requête a echoué
          echo "Error: Problème d'accès à la base \n";
          exit();
        }
      }
  		// si tout c'est bien passé, on redirige vers la page admin des actualités
      header("Location:admin_selection.php");
      //Ferme la connexion avec la base MariaDB
      $mysqli->close();
	  ?>
 	</div>
  </section>
 </body>
</html>
