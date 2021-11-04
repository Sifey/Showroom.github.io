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
    <!-- Barre de navigation -->
    <div id="topnav" class="navbar navbar-fixed-top default">
      <div class="navbar-inner">
        <div class="container">
          <div class="logo">
            <img width='60' src="assets/img/manga.png" alt="" />
          </div>
          <div class="navigation">
            <nav>
              <ul class="nav pull-right">
                <li class="current"><a href="#intro">Actualité</a></li>
                <li><a href="select.php" class="external">Sélection</a></li>
                <li><a href="#contact">Présentation</a></li>
                <li><a href="inscription.php" class="external">Inscription</a></li>
                <li><a href="session.php" class="external">Connexion</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- end top -->
  </header>
  <?php
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
	  echo ("Connexion BDD réussie !");
  ?>
  <!-- section intro -->
  <section id="intro">
    <div class="slogan">
      <div class="icon">
        <i class="icon-bell icon-10x"></i>
      </div>
      <h1><em><span>Actualité</span></h1>
      <br />
      <br />
      <!-- mise en place d'un style pour le tableau -->
      <style>
    	table, td, th {
        margin: auto;
    	  border-style: solid;
    	  border-width: 1px;
    	  border-color: white;
        vertical-align: middle;
    	}
	    </style>
      <?php
        // requete pour afficher les actualité
        $requete="SELECT * FROM t_actualite_act;";
        $result1 = $mysqli->query($requete);
        if ($result1 == false) //Erreur lors de l’exécution de la requête
        { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
        }
        //affichage du tableau contenant les actualités (visibles)
		echo ("<table cellpadding=\"10px\">");
		  echo ("<tr>");
			echo ("<th>"); echo ("<h2>Titre</h2>"); echo ("</th>");
			echo ("<th>"); echo ("<h2>Texte</h2>"); echo ("</th>");
			echo ("<th>"); echo ("<h2>Date</h2>"); echo ("</th>");
			echo ("<th>"); echo ("<h2>écrit par :</h2>"); echo ("</th>");
		  echo ("</tr>");
		  $result1 = $mysqli->query($requete);
          while ($act = $result1->fetch_assoc())
		  {
		    if ($act['act_etat']=='V') {
			  echo ("<tr>");
				echo ("<td>"); echo ("<p>" .$act['act_titre']. "</p>"); echo ("</td>");
				echo ("<td width=\"60%\">"); echo ("<p>" .$act['act_texte']. "</p>"); echo ("</td>");
				echo ("<td>"); echo ("<p>" .$act['act_date_publication']. "</p>"); echo ("</td>");
				echo ("<td>"); echo ("<p>" .$act['com_pseudo']. "</p>"); echo ("</td>");
			  echo ("</tr>");
			}
		  }
		  echo ("</table>");
      ?>
    </div>
  </section>
  <!-- end intro -->
  <!-- section contact -->
  <section id="contact" class="section">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="heading">
            <h3><span>Présentation</span></h3>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <!-- end contact form -->
        <div class="span6">
          <h4><i class="icon-suitcase"></i>
            <strong>
              <?php
                //Préparation de la requête récupérant les informations de la structure
                $requete="SELECT * FROM t_presentation_pre;";
                $result1 = $mysqli->query($requete);
              	if ($result1 == false) //Erreur lors de l’exécution de la requête
	            { // La requête a echoué
	              echo "Error: La requête a echoué \n";
	              echo "Errno: " . $mysqli->errno . "\n";
	              echo "Error: " . $mysqli->error . "\n";
	              exit();
	            }
	            else //La requête s’est bien exécutée (affichage du nom de la structure)
	            {
	              $struct = $result1->fetch_assoc();
	              echo ($struct['pre_nom_structure']);
	              echo "<br />";
	            }
              ?>
            </strong></h4>
            <p>
            <?php
              // affichage du texte descriptif de la structure
              $result1 = $mysqli->query($requete);
              if ($result1 == false) //Erreur lors de l’exécution de la requête
              { // La requête a echoué
                echo "Error: La requête a echoué \n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit();
              }
              else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
              {
                $struct = $result1->fetch_assoc();
                echo ($struct['pre_texte_bienvenue']);
                echo "<br />";
              }
            ?>
          </p>
          <h4><strong>Contact :</strong></h4>
          <p>
            <span><i class="icon-home"></i><strong>Adresse :</strong></strong>
	          <?php
	            // affichage de l'adresse de la structure
	            $result1 = $mysqli->query($requete);
	            if ($result1 == false) //Erreur lors de l’exécution de la requête
	            { // La requête a echoué
	              echo "Error: La requête a echoué \n";
	              echo "Errno: " . $mysqli->errno . "\n";
	              echo "Error: " . $mysqli->error . "\n";
	              exit();
	            }
	            else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
	            {
	              $struct = $result1->fetch_assoc();
	              echo ($struct['pre_adresse']);
	              echo "<br />";
	            }
	          ?>
            </span>
          </p>
          <p>
            <span><i class="icon-phone"></i><strong>Téléphone :</strong>
              <?php
                // affichage du numero de la structure
                $result1 = $mysqli->query($requete);
                if ($result1 == false) //Erreur lors de l’exécution de la requête
                { // La requête a echoué
                  echo "Error: La requête a echoué \n";
                  echo "Errno: " . $mysqli->errno . "\n";
                  echo "Error: " . $mysqli->error . "\n";
                  exit();
                }
                else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                {
                  $struct = $result1->fetch_assoc();
                  echo ($struct['pre_numero_telephone']);
                  echo "<br />";
                }
              ?>
            </span>
          </p>
          <p>
            <span><i class="icon-envelope-alt"></i><strong>Email :</strong> 
              <?php
                // affichage du mail de la structure
                $result1 = $mysqli->query($requete);
                if ($result1 == false) //Erreur lors de l’exécution de la requête
                { // La requête a echoué
                  echo "Error: La requête a echoué \n";
                  echo "Errno: " . $mysqli->errno . "\n";
                  echo "Error: " . $mysqli->error . "\n";
                  exit();
                }
                else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                {
                  $struct = $result1->fetch_assoc();
                  echo ($struct['pre_e_mail']);
                  echo "<br />";
                }
              ?>
            </span>
          </p>
          <p>
            <span><i class="icon-time"></i><strong>Horaire :</strong>
              <?php
                // affichage des horaires de la structure
                $result1 = $mysqli->query($requete);
                if ($result1 == false) //Erreur lors de l’exécution de la requête
                { // La requête a echoué
                  echo "Error: La requête a echoué \n";
                  echo "Errno: " . $mysqli->errno . "\n";
                  echo "Error: " . $mysqli->error . "\n";
                  exit();
                }
                else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                {
                  $struct = $result1->fetch_assoc();
                  echo ($struct['pre_horaire_ouverture']);
                  echo "<br />";
                }

                //Fermeture de la communication avec la base MariaDB
			    $mysqli->close();
              ?>
            </span>
          <!-- affichage du plan google maps -->
          <div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2649.3671095612217!2d-4.485176484462557!3d48.39189277924449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4816bbe1d9a1e0eb%3A0xaca65c069f3d31f4!2sEscale%20%C3%A0%20Mangas!5e0!3m2!1sfr!2sfr!4v1615828685795!5m2!1sfr!2sfr" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
      </div>
    </div>
  </section>
  <!-- end section contact -->

  <footer>
    <div class="verybottom">
      <div class="container">
        
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div class="logo">
                <a class="brand" href="index.html"><img src="assets/img/logo.png" alt="" /></a>
              </div>
              <p>
                &copy; Vesperr labs Inc - All right reserved
              </p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Vesperr
                -->
                Created by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48 active"></i></a>

  <!-- Javascript Library Files -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/parallax/jquery.parallax-1.1.3.js"></script>
  <script src="assets/js/nagging-menu.js"></script>
  <script src="assets/js/jquery.nav.js"></script>
  <script src="assets/js/prettyPhoto/jquery.prettyPhoto.js"></script>
  <script src="assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="assets/js/portfolio/setting.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="assets/js/animate.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="assets/js/custom.js"></script>

</body>

</html>

