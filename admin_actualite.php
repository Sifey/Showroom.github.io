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

<html lang="en">
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
			<!--contenu du fichier HTML-->
			<h1>GESTION DES ACTUALITES</h1>
	    <br />
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
			  // requete d'affichage de toutes les actualités
			  $requete="SELECT * FROM t_actualite_act;";
		    $result1 = $mysqli->query($requete);
		    if ($result1 == false) //Erreur lors de l’exécution de la requête
		    { // La requête a echoué
		      echo "Error: La requête a echoué \n";
		      echo "Errno: " . $mysqli->errno . "\n";
		      echo "Error: " . $mysqli->error . "\n";
		      exit();
		    }
			  // affichage des données dans un tableau
		    echo ("<style>
		      table, td, th {
	        	margin: auto;
		        border-style: solid;
		        border-color: grey;
		        vertical-align: middle;
	        }
		    </style>");
			  echo ("<table cellpadding=\"10px\">");
				  echo ("<tr>");
				    echo ("<th>"); echo ("<h2>Titre</h2>"); echo ("</th>");
				    echo ("<th>"); echo ("<h2>Texte</h2>"); echo ("</th>");
				    echo ("<th>"); echo ("<h2>Date</h2>"); echo ("</th>");
				    echo ("<th>"); echo ("<h2>Ecrit par :</h2>"); echo ("</th>");
				    echo ("<th>"); echo ("<h2>Etat</h2>"); echo ("</th>");
				    echo ("<th>"); echo ("<h2>Suppression</h2>"); echo ("</th>");
				  echo ("</tr>");
			    $result1 = $mysqli->query($requete);
		      while ($act = $result1->fetch_assoc())
				  {
					 	echo ("<tr>");
					   	echo ("<td>"); echo ("<p>" .$act['act_titre']. "</p>"); echo ("</td>");
					   	echo ("<td>"); echo ("<p>" .$act['act_texte']. "</p>"); echo ("</td>");
				    	echo ("<td>"); echo ("<p>" .$act['act_date_publication']. "</p>"); echo ("</td>");
				    	echo ("<td>"); echo ("<p>" .$act['com_pseudo']. "</p>"); echo ("</td>");
				    	if ($act['act_etat']=='V') {
				      	echo ("<td><p>Visible</p>");
				      }
				      else {
				      	echo ("<td><p>Invisible</p>");
				      }
				      // Formulaire pour modifier l'état de l'actualité
				    	echo("
				    	<form action='actualite_action.php' method='post'>
				    		<input id='image' type='image' width='50' height='40' src='images/refresh.png' align='center' alt='Login'/>");
				    		if ($act['act_etat']=='V') {
				      		echo ("<input type=\"hidden\" name=\"etat\" value=\"I\"/>");
					      }
					      else {
					      	echo ("<input type=\"hidden\" name=\"etat\" value=\"V\"/>");
					      }
								echo("<input type=\"hidden\" name=\"titre\" value=\"" .$act['act_titre']. "\"/>
								<input type=\"hidden\" name=\"action\" value=\"action_modif_etat\"/>
							</form> ");
				    	echo ("</td>");
				    	// Formulaire pour supprimer l'actualité
				    	echo ("<td>");
				    	echo("
				    	<form action='actualite_action.php' method='post'>
				    		<div style='text-align: center'>
									<input id='image' type='image' width='50' height='40' src='images/croix_rouge.png' align='center' alt='Login'/>
								</div>
								<input type=\"hidden\" name=\"action\" value=\"action_supp_act\"/>
								<input type=\"hidden\" name=\"numero\" value=\"" .$act['act_numero']. "\"/>
							</form> ");
				    	echo ("</td>");
				   	echo ("</tr>");
		    	}
			  echo ("</table>");	
			  echo ("<br />");
		    // affichage du formulaire pour ajouter une actualité
		    echo ("<fieldset>");
	       	echo("<legend><h1><em><span>Nouvelle actualité : </span></h1></legend>");
	       	echo("<form action=\"actualite_action.php\" method=\"post\">");
	          echo("<p>Titre :</p> <input type=\"text\" name=\"titre\"/> <br /><br />");
	        	echo("<p>Texte :</p> <input type=\"text\" name=\"texte\"/> <br /><br />");
	          echo("<p>Etat (V/I) :</p> <input type=\"text\" name=\"etat\"/> <br /><br />");
	          echo("<input type=\"hidden\" name=\"action\" value=\"action_ajout_act\"/>");
	          echo("<input type=\"submit\" value=\"Valider\">");
	      	echo("</form>");
	      echo("</fieldset>");
			  //Ferme la connexion avec la base MariaDB
	      $mysqli->close();
	 		?>
 		</div>
  </section>
 </body>
</html>