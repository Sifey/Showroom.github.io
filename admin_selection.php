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
	  <h1>GESTION DES SELECTIONS</h1>
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
		// requete d'affichage de toutes les sélections, leurs éléments et le créateur de la sélection
		$requete1 = "SELECT sel_numero, sel_intitule, ele_intitule, ele_numero, t_selection_sel.com_pseudo FROM t_selection_sel LEFT OUTER JOIN t_liste_lis USING (sel_numero) LEFT OUTER JOIN t_element_ele USING (ele_numero)";
		$resultat1 = $mysqli->query($requete1);
		if ($resultat1==false) {
		  // La requête a echoué
		  echo "Error: Problème d'accès à la base \n";
		  exit();
		}
		// affichage des données dans un tableau
	    echo ("<table cellpadding=\"5px\">");
	      echo ("<tr>");
	        echo ("<th>"); echo ("<h3>Nom de la sélection</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Titre de l'élément</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Pseudo du créateur de la sélection</h3>"); echo ("</th>");
	      	echo ("<th>"); echo ("<h3>Retirer l'élément de la sélection</h3>"); echo ("</th>");
	      echo ("</tr>");
	      $resultat1 = $mysqli->query($requete1);
	      while ($select = $resultat1->fetch_assoc())
	      {
	        echo ("<tr style='text-align: center; vertical-align: middle;'>");
	        	echo ("<td>"); echo ("<p>" .$select['sel_intitule']. "</p>"); echo ("</td>");
	          if ($select['ele_intitule'] == NULL){
	        	echo ("<td>"); echo ("<p>Vide</p>"); echo ("</td>");
	          }
	          else {
	        	echo ("<td>"); echo ("<p>" .$select['ele_intitule']. "</p>"); echo ("</td>");
	          }
	          echo ("<td>"); echo ("<p>" .$select['com_pseudo']. "</p>"); echo ("</td>");
	          // Formulaire pour retirer l'élément
	          echo ("<td>");
				    	echo("
				    	<form action='selection_action.php' method='post'>
								<input id='image' type='image' width='50' height='40' src='images/croix_rouge.png' align='center' alt='Login'/>
								<input type=\"hidden\" name=\"action\" value=\"action_retier_elt\"/>
								<input type=\"hidden\" name=\"selection\" value=\"" .$select['sel_numero']. "\"/>
								<input type=\"hidden\" name=\"element\" value=\"" .$select['ele_numero']. "\"/>
							</form> ");
				    echo ("</td>");
	        echo ("</tr>");
	      }
	    echo ("</table>");
	    echo ("<br />");	

	    // Requête de récupération des sélections et des éléments
	    $requete_sel = "SELECT sel_numero, sel_intitule FROM t_selection_sel;";
			$resultat_sel = $mysqli->query($requete_sel);
			if ($resultat_sel==false) {
			  // La requête a echoué
			  echo "Error: Problème d'accès à la base \n";
			  exit();
			}
			$requete_ele = "SELECT ele_numero, ele_intitule FROM t_element_ele;";
			$resultat_ele = $mysqli->query($requete_ele);
			if ($resultat_ele==false) {
			  // La requête a echoué
			  echo "Error: Problème d'accès à la base \n";
			  exit();
			}
	    // Affichage du formulaire pour ajouter un élément à une sélection
	    echo ("<fieldset>");
          echo("<legend><h1><em><span>Ajoutez un élément à une sélection : </span></h1></legend>");
          echo("<form action=\"selection_action.php\" method=\"post\">");
        	echo("<select name='selection'>");
        	echo("<option value=''>-- Choisissez une sélection --</option>");
        		while ($sel = $resultat_sel->fetch_assoc()) {
					  	echo("<option value='" .$sel['sel_numero']. "'>" .$sel['sel_intitule']. "</option>");
					  }
					echo("</select>");
					echo("<select name='element'>");
						echo("<option value=''>-- Choisissez un élément --</option>");
        		while ($ele = $resultat_ele->fetch_assoc()) {
					  	echo("<option value='" .$ele['ele_numero']. "'>" .$ele['ele_intitule']. "</option>");
					  }
					echo("</select>");
					echo("<input type=\"hidden\" name=\"action\" value=\"action_ajout\"/>");
        	echo("<input type=\"submit\" value=\"Valider\">");
          echo("</fieldset>");
        echo("</form>");

		//Ferme la connexion avec la base MariaDB
        $mysqli->close();
 	  ?>
 	</div>
  </section>
 </body>
</html>