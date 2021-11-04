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

        // Supprimer un élément
        if ($action=="action_supp") {
          $num_elt=htmlspecialchars(addslashes($_POST['element']));
          // Récupération de l'élément ( et du lien associé si il y en a un)
          $requete_elt = "SELECT * FROM t_element_ele LEFT OUTER JOIN t_lien_lie USING (ele_numero) WHERE ele_numero='$num_elt';";
          $resultat_elt = $mysqli->query($requete_elt);
          if ($resultat_elt==false) {
            // La requête a echoué
            echo "Error: Problème d'accès à la base \n";
            exit();
          }
          $elt = $resultat_elt->fetch_assoc();
    	    // Vérification si un lien est associé
          if ($elt['lie_numero'] != NULL) {
            $requete_supp_lien = "DELETE FROM t_lien_lie WHERE lie_numero='" .$elt['lie_numero']. "';";
            $result_supp_lien = $mysqli->query($requete_supp_lien);
            if ($result_supp_lien==false) {
              // La requête a echoué
              echo "Error: Problème d'accès à la base \n";
              exit();
            }
          }
          // Vérification si l'élément appartient à une ou plusieurs sélections
          $requete_test = "SELECT * FROM t_element_ele JOIN t_liste_lis USING (ele_numero) WHERE ele_numero='$num_elt'";
          $result_test = $mysqli->query($requete_test);
          if ($result_test==false) {
            // La requête a echoué
            echo "Error: Problème d'accès à la base \n";
            echo ($requete_test);
            exit();
          }
          // si l'élément appartient à un sélection on le supprime
          if ($result_test->num_rows != 0){
            while ($elt_sel = $result_test->fetch_assoc()) {
              $requete_supp = "DELETE FROM t_liste_lis WHERE ele_numero='$num_elt' AND sel_numero='" .$elt_sel['sel_numero']. "';";
              $result_supp = $mysqli->query($requete_supp);
              if ($result_supp==false) {
                // La requête a echoué
                echo "Error: Problème d'accès à la base \n";
                exit();
              }
            }
          }
      	  // Suppression de l'élément
      	  $requete_supp = "DELETE FROM t_element_ele WHERE ele_numero='$num_elt';";
      	  $result_supp = $mysqli->query($requete_supp);
      		if ($result_supp==false) {
      		  // La requête a echoué
      		  echo "Error: Problème d'accès à la base \n";
      		  exit();
      		}
        }

        // Ajouter un élément
        if ($action == 'action_ajout') {
          $titre=htmlspecialchars(addslashes($_POST['titre']));
          $synop=htmlspecialchars(addslashes($_POST['synopsis']));
          $etat=htmlspecialchars(addslashes($_POST['etat']));
          $date=htmlspecialchars(addslashes($_POST['date']));
          $nom_couv=htmlspecialchars(addslashes($_FILES['couv']['name']));
          $path="images/$nom_couv"; 
          $tmp_nom_couv=$_FILES['couv']['tmp_name'];
          // Vérification que le nom ne soit pas déjà existant dans le dossier
          if (file_exists($path)) {
            echo "erreur fichier existant. Veuillez renommer votre image s'il vous plait.";
            header("refresh:4 ; url= admin_element.php");
            exit();
          }
          // Transfère de l'image dans le dossier dédié
          move_uploaded_file($tmp_nom_couv, "images/$nom_couv");
          // Ajout de l'élément
          $requete_ajout = "INSERT INTO t_element_ele VALUES (NULL, '$titre', '$synop','$date', '$nom_couv', '$etat');";
          echo ($requete_ajout);
          $result_ajout = $mysqli->query($requete_ajout);
          if ($result_ajout==false) {
          // La requête a echoué
            echo "Error: Problème d'accès à la base \n";
            exit();
          }
        }

        // Modification de l'état d'un élément
        if ($action=='action_modif_etat') {
          $numero=htmlspecialchars(addslashes($_POST['numero']));
          $etat=htmlspecialchars(addslashes($_POST['etat']));
          // vérification si l'etat est correctement entrer
          if ($_POST['etat']!='P' && $_POST['etat']!='B'){
            echo "<h2>Erreur état de l'élément incorrect veuillez entrer un état correct : Publié (P) ou Brouillon (B). Veuillez recommencer<h2>";
            header("refresh:3;url=admin_element.php");
            exit();
          }
          else if (!isset($numero)) { 
            echo "<h2>Erreur. Veuillez recommencer<h2>";
            header("refresh:7 ; url= admin_element.php");
            exit();
          }
          // Modification de l'état 
          $requete_etat = "UPDATE t_element_ele SET ele_etat='$etat' WHERE ele_numero='$numero';";
          echo ($requete_etat);
          $result_etat = $mysqli->query($requete_etat);
          if ($result_etat==false) {
          // La requête a echoué
            echo "Error: Problème d'accès à la base \n";
            exit();
          }
        }
        // si tout c'est bien passé, on redirige vers la page admin des actualités
        header("Location:admin_element.php");
        //Ferme la connexion avec la base MariaDB
        $mysqli->close();
	    ?>
 	  </div>
  </section>
 </body>
</html>
