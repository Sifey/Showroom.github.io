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
	  <h1>GESTION DES ELEMENTS</h1>
	  <!--Suite du contenu du fichier HTML-->
	  <br />
	  <style>
	    table, td, th {
	        	margin: auto;
		        border-style: solid;
		        border-color: grey;
		        vertical-align: middle;
	        }
	  </style>
	  <!--Suite du contenu du fichier HTML-->
	  <?php
		//Connection a mariaDB
		//Ouverture vers la base de donneés
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
		// requete de récupération de tous les éléments
		$requete1 = "SELECT * FROM t_element_ele LEFT OUTER JOIN t_lien_lie USING (ele_numero) ORDER BY (ele_numero);";
		$resultat1 = $mysqli->query($requete1);
		if ($resultat1==false) {
		  // La requête a echoué
		  echo "Error: Problème d'accès à la base \n";
		  exit();
		}
		// affichage des données dans un tableau
	    echo ("<table cellpadding=\"5px\">");
	      echo ("<tr>");
	      	echo ("<th>"); echo ("<h3>Titre de l'élément</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Synopsis</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Date de sortie</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Couverture</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Lien vers un article</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Etat</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Supprimer l'élément</h3>"); echo ("</th>");
	      echo ("</tr>");
	      $resultat1 = $mysqli->query($requete1);
	      while ($elt = $resultat1->fetch_assoc())
	      {
	        echo ("<tr style='text-align: center; vertical-align: middle;'>"); 
	          echo ("<td>"); echo ("<p>" .$elt['ele_intitule']. "</p>"); echo ("</td>");
	          echo ("<td>"); echo ("<p>" .$elt['ele_descriptif']. "</p>"); echo ("</td>");
	          echo ("<td>"); echo ("<p>" .$elt['ele_date_d_ajout']. "</p>"); echo ("</td>");
	          echo ("<td align=\"center\">"); echo ("<img width='100' src='./images/". $elt['ele_fichier_image'] ."'>"); echo ("</td>");
	          if ($elt['lie_numero'] == NULL){
	        	echo ("<td>"); echo ("<p>Aucun</p>"); echo ("</td>");
	          }
	          else {
	          echo ("<td align=\"center\">");echo ("<a href='" .$elt['lie_url']. "'><img width='75' src='./images/oeil.png'></a><p>Par \"" .$elt['lie_auteur']. "\"</p>");echo ("</td>");
	          }
	          if ($elt['ele_etat']=='P') {
	          	echo ("<td>"); echo ("<p>Publié</p>");
	          }
	          else {
	          	echo ("<td>"); echo ("<p>Brouillon</p>");
	          }
	          // Formulaire pour modifier l'état de l'actualité
				    echo("
				    	<form action='element_action.php' method='post'>
								<input id='image' type='image' width='50' height='40' src='images/refresh.png' align='center' alt='Login'/>
								<input type=\"hidden\" name=\"action\" value=\"action_modif_etat\"/>
				    		<input type=\"hidden\" name=\"numero\" value=\"" .$elt['ele_numero']. "\"/>");
								if ($elt['ele_etat']=='P') {
									echo("<input type=\"hidden\" name=\"etat\" value=\"B\"/>");
								}
								else {
									echo("<input type=\"hidden\" name=\"etat\" value=\"P\"/>");
								}
							echo("</form>");
				    	echo ("</td>");
	          // Suppression d'un élément
	          echo ("<td>");
				    	echo("
				    	<form action='element_action.php' method='post'>
								<input id='image' type='image' width='50' height='40' src='images/croix_rouge.png' align='center' alt='Login'/>
								<input type=\"hidden\" name=\"action\" value=\"action_supp\"/>
								<input type=\"hidden\" name=\"element\" value=\"" .$elt['ele_numero']. "\"/>
							</form> ");
				    echo ("</td>");
	        echo ("</tr>");
	      }
	    echo ("</table>");
	    echo ("<br />");	
	    // affichage du formulaire pour ajouter un élément
		    echo ("<fieldset>");
	       	echo("<legend><h1><em><span>Ajouter un élément : </span></h1></legend>");
	       	echo("<form action=\"element_action.php\" method=\"post\" enctype=\"multipart/form-data\">");
	          echo("<p>Titre :</p> <input type=\"text\" name=\"titre\"/> <br /><br />");
	        	echo("<p>Synopsis :</p> <input type=\"text\" name=\"synopsis\"/> <br /><br />");
	        	echo("<p>Date de sortie (aaaa-mm-jj) :</p> <input type=\"text\" name=\"date\"/> <br /><br />");
	        	echo("<p>Etat (P/B) :</p> <input type=\"text\" name=\"etat\"/> <br /><br />");
	          echo("Couverture : <input type=\"file\" name=\"couv\"/> <br /><br />");
	          echo("<input type=\"hidden\" name=\"action\" value=\"action_ajout\"/>");
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