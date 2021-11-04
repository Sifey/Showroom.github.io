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
              	<li><a href="index.php">Accueil</a></li>
                <li><a href="select.php">Sélection</a></li>
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
  </header>
<section id="intro">
    <div class="slogan">
      <div class="icon">
        <i class="icon-pencil icon-10x"></i>
      </div>
      <div id="contenu">
  			<?php
          // récuperation des informations dans des variables
          $prenom=htmlspecialchars(addslashes($_POST['prenom']));
          $nom=htmlspecialchars(addslashes($_POST['nom']));
          $email=htmlspecialchars(addslashes($_POST['email']));
          $id=htmlspecialchars(addslashes($_POST['pseudo']));
          $mdp1=htmlspecialchars(addslashes($_POST['mdp1']));
          $mdp2=htmlspecialchars(addslashes($_POST['mdp2']));

          // ouverture de la base de données
          $mysqli = new mysqli("localhost","root","", "showroom", 3307);
          $problem = 0;
          if ($mysqli->connect_errno)
          {
            // Affichage d'un message d'erreur
            echo "Error: Problème de connexion à la BDD \n";
            echo "Errno: " . $mysqli->connect_errno . "\n";
            echo "Error: " . $mysqli->connect_error . "\n";
            // Arrêt du chargement de la page
            printf("Erreur, veuiller recommencer");
            header("refresh:7 ; url= inscription.php");
            exit();
          }
          // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
          if (!$mysqli->set_charset("utf8")) {
          	printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
          	printf("Erreur, veuiller recommencer\n");
          	header("refresh:7 ; url= inscription.php");
          	exit();
          }
          //Verification des champs
          if ($id =='' || $mdp1=='' || $prenom=='' || $nom=='' || $email==''){
          	echo "<h2><em>Remplissez tous les champs s'il vous plait.</h2>";
          	echo '<br />';
          	$problem = 1;
          }
          // vérification des mot de passe
          else if (strcmp($mdp1,$mdp2) != 0) {
          	echo "<h2><em>Erreur les mots de passe ne sont pas identique.</h2>";
          	echo '<br />';
          	$problem = 2;
          }
          //Préparation de la requête à partir des chaînes saisies
          if ($problem == 0) {
            $sql="INSERT INTO t_compte_utilisateur_com VALUES ('" .$id. "', MD5('" .$mdp1. "'));";
            echo "<br />";
            //Exécution de la requête d'ajout d'un compte dans la table des comptes
            $result3 = $mysqli->query($sql);
            if ($result3 == false) //Erreur lors de l’exécution de la requête
            {
              // La requête a echoué
              echo "Error: La requête a échoué \n";
              echo "Query: " . $sql . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              echo '<br />';
              printf("<a href=\"./inscription.php\">Inscription</a>");
              exit();
            }
            $sql2="INSERT INTO t_profil_utilisateur_pro VALUES ('" .$nom. "', '" .$prenom. "', '" .$email. "', 'D', 'R', curdate(), '" .$id. "');";
            //Exécution de la requête d'ajout d'un compte dans la table des comptes
            $result4 = $mysqli->query($sql2);
            if ($result4 == false) //Erreur lors de l’exécution de la requête
            {
              // La requête a echoué
              echo "Error: La requête a échoué \n";
              echo "Query: " . $sql . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              //Suppression du compte associé
              $sql3="DELETE FROM t_compte_utilisateur_com WHERE com_pseudo='" .$id. "';";
              $supp = $mysqli->query($sql3);
              echo "<h2><em>Erreur, veuiller recommencer.</h2>";
              header("refresh:7 ; url= inscription.php");
              exit();
            }
            else //Requête réussie
            {
              echo "<br />";
              echo "<h1><em><span>Inscription réussie !</span></h1>";
            }
          }

          // Si les champs ne sont pas tous remplis on réaffiche le formulaire avec les informations remplies
          if ($problem == 1) {
          	echo ("<br /> <br />");
          	echo ("<fieldset>");
          	echo("<legend><h1><em><span>Veuillez recommencer votre inscription : </span></h1></legend>");
          	echo("<form action=\"action.php\" method=\"post\">");
          		echo("<p>Votre nom :</p> <input type=\"text\" name=\"nom\" value=\"$nom\"/> <br /><br />");
          		echo("<p>Votre prénom :</p> <input type=\"text\" name=\"prenom\" value=\"$prenom\" /> <br /><br />");
          		echo("<p>Votre adresse email :</p> <input type=\"email\" name=\"email\" value=\"$email\" required=\"@\" /><br /><br />");
          		echo("<p>Votre pseudo :</p> <input type=\"text\" name=\"pseudo\" value=\"$id\" /><br /><br />");
          		echo("<p>Votre mot de passe :</p> <input type=\"password\" name=\"mdp1\" value=\"$mdp1\" /><br /><br />");
          		echo("<p>Confirmez votre mot de passe :</p> <input type=\"password\" name=\"mdp2\" value=\"$mdp2\" /><br /><br />");
          		echo("<input type=\"submit\" value=\"Valider\">");
          	echo("</fieldset>");
          	echo("</form>");
          	echo("</div>");
          }

          // Si les mots de passe ne sont pas identique on réaffiche le formulaire avec les information préremplies
          if ($problem == 2) {
          	echo ("<br /> <br />");
          	echo ("<fieldset>");
          	echo("<legend><h1><em><span>Veuillez recommencer votre inscription : </span></h1></legend>");
          	echo("<form action=\"action.php\" method=\"post\">");
          		echo("<p>Votre nom :</p> <input type=\"text\" name=\"nom\" value=\"$nom\"/> <br /><br />");
          		echo("<p>Votre prénom :</p> <input type=\"text\" name=\"prenom\" value=\"$prenom\" /> <br /><br />");
          		echo("<p>Votre adresse email :</p> <input type=\"email\" name=\"email\" value=\"$email\" required=\"@\" /><br /><br />");
          		echo("<p>Votre pseudo :</p> <input type=\"text\" name=\"pseudo\" value=\"$id\" /><br /><br />");
          		echo("<p>Votre mot de passe :</p> <input type=\"password\" name=\"mdp1\" /><br /><br />");
          		echo("<p>Confirmez votre mot de passe :</p> <input type=\"password\" name=\"mdp2\" /><br /><br />");
          		echo("<input type=\"submit\" value=\"Valider\">");
          	echo("</fieldset>");
          	echo("</form>");
          	echo("</div>");
          }
          //Ferme la connexion avec la base MariaDB
          $mysqli->close();
        ?>
		  </div>
    </div>
  </section>

