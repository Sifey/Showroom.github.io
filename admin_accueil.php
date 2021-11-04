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
        <div class="span12">
        </div>
      </div>
	  <!--contenu du fichier HTML-->
	  <h1>ESPACE ADMINISTRATION</h1>
	  <!--Suite du contenu du fichier HTML-->
	  <?php
		//Connection a mariaDB
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
		/* Code PHP permettant de souhaiter la bienvenue à l’utilisateur connecté et
		d’afficher le détail de son profil. */
		$requete1 = "SELECT com_pseudo, pro_nom, pro_prenom, pro_e_mail, pro_validite_du_profil
		FROM t_profil_utilisateur_pro WHERE com_pseudo='" .$_SESSION['login']. "' ";
		$resultat1 = $mysqli->query($requete1);
		if ($resultat1==false) {
		  // La requête a echoué
		  echo "Error: Problème d'accès à la base \n";
		  exit();
		}
		$pro = $resultat1->fetch_assoc();
		echo "<h2>Bienvenue " .$pro['com_pseudo']. "</h2>";
		echo "<br />";
		echo "<br />";
		echo "<h3>Pseudo : " .$pro['com_pseudo']. "</h3>";
		echo "<h3>Prénom : " .$pro['pro_prenom']. "</h3>";
		echo "<h3>Nom : " .$pro['pro_nom']. "</h3>";
		echo "<h3>E-mail : " .$pro['pro_e_mail']. "</h3>";
		if($_SESSION['statut']=='A'){
		  echo "<h3>Statut : Administrateur</h3>";
		}
		else{
	   	  echo "<h3>Statut : Responsable</h3>";
		}
		if ($_SESSION['statut']=='A'){
		  // Préparation de l'affichage des profils
		  $requete2 = "SELECT com_pseudo, pro_nom, pro_prenom, pro_e_mail, pro_validite_du_profil, pro_statut
		  FROM t_profil_utilisateur_pro";
	      $resultat2 = $mysqli->query($requete2);
		  if ($resultat2==false) {
		    // La requête a echoué
		    echo "Error: Problème d'accès à la base \n";
			exit();
		  }
		  // affichage des profils dans un tableau
		  echo ("<style>
	        table, td, th {
	        	margin: auto;
		        border-style: solid;
		        border-color: grey;
		        vertical-align: middle;
	        }
	      </style>");
	      echo "<br />";
	      echo "<br />";
	      echo ("<table cellpadding=\"5px\">");
			echo ("<tr>");
			  echo ("<th>"); echo ("<h2>Pseudo</h2>"); echo ("</th>");
			  echo ("<th>"); echo ("<h2>Nom</h2>"); echo ("</th>");
			  echo ("<th>"); echo ("<h2>Prénom</h2>"); echo ("</th>");
			  echo ("<th>"); echo ("<h2>E-mail</h2>"); echo ("</th>");
			  echo ("<th>"); echo ("<h2>Validité</h2>"); echo ("</th>");
			  echo ("<th>"); echo ("<h2>Statut</h2>"); echo ("</th>");
			echo ("</tr>");
	        while ($profils=$resultat2->fetch_assoc()) {
			echo ("<tr>");
			  echo ("<td align=\"center\">"); echo ($profils['com_pseudo']); echo ("</td>");
		      echo ("<td>"); echo ($profils['pro_nom']); echo ("</td>");
			  echo ("<td>"); echo ($profils['pro_prenom']); echo ("</td>");
		      echo ("<td>"); echo ($profils['pro_e_mail']); echo ("</td>");
		      if ($profils['pro_validite_du_profil']=='A') {
		      	echo ("<td>Activé</td>");
		      }
		      else {
		      	echo ("<td>Désactivé</td>");
		      }
		      if ($profils['pro_statut']=='A') {
		      	echo ("<td>Administrateur</td>");
		      }
		      else {
		      	echo ("<td>Responsable</td>");
		      }
		    echo ("</tr>");
	        }
	      echo ("</table>");
	      echo "<br />";
	      // affichage du nombre de compte
	      $requete3 = "SELECT COUNT(com_pseudo) AS Nb_compte FROM t_compte_utilisateur_com";
	      $resultat3 = $mysqli->query($requete3);
		  if ($resultat3==false) {
			// La requête a echoué
	        echo "Error: Problème d'accès à la base \n";
			exit();
		  }
		  $Nb = $resultat3->fetch_assoc();
		  echo "<h2>Il y a " .$Nb['Nb_compte']. " comptes</h2>";
		  echo "<br />";
		  // affichage du formulaire de validité
		  echo ("<fieldset>");
        	echo("<legend><h1><em><span>Entrer un pseudo et sa validité : </span></h1></legend>");
        	  echo("<form action=\"comptes_action.php\" method=\"post\">");
        	    echo("<p>Pseudo :</p> <input type=\"text\" name=\"pseudo\"/> <br /><br />");
        		echo("<p>Validité (A/D) :</p> <input type=\"text\" name=\"validite\"/> <br /><br />");
        		echo("<input type=\"submit\" value=\"Valider\">");
        	echo("</fieldset>");
       	  echo("</form>");
		}
		//Ferme la connexion avec la base MariaDB
        $mysqli->close();
 	  ?>
 	</div>
  </section>
 </body>
</html>