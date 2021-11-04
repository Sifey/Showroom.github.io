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
                <li><a href="index.php" class="external">Actualité</a></li>
                <li><a href="select.php" class="external">Sélection</a></li>
                <li><a href="inscription.php" class="external">Inscription</a></li>
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
  <section id="contact" class="section">
    <div class="container">
      <div class="row">
        <div class="span12"></div>
      </div>
      <?php
        // récuperation de la sélection et du premier élement
        if(isset($_GET['ele_numero']) && isset($_GET['sel_numero']))
        {
          $elt = $_GET['ele_numero'];
          $sele = $_GET['sel_numero'];
        }
        else {
          echo ("Vous avez oublié le paramètre !");
          exit();
        }
        // récuperation et affichage du titre de la sélection
        $requete1="SELECT sel_intitule FROM t_selection_sel WHERE sel_numero=" .$sele. ";";
        $result1 = $mysqli->query($requete1);
        $titre = $result1->fetch_assoc();
        echo ("<div class=\"heading\">");
        echo ("<h3><span>" .$titre['sel_intitule']. "</span></h3>");
        echo ("</div>");
        echo '<br />';
        echo '<br />';

        // affichage d'un message si sélection vide
        if ($elt == 0) 
        {
          echo ("<center><h2><span>La sélection est vide.</span></h2></center>");
        }
        else 
        {
          // affichage du premier élément de la selection
          $requete="SELECT ele_numero, ele_intitule, ele_descriptif, ele_date_d_ajout, ele_fichier_image, ele_etat FROM t_element_ele WHERE ele_numero =" .$elt. "";
          //récupération d'un lien si il y en a un
          $requete_lien = "SELECT lie_url, lie_auteur, lie_date_publication FROM t_lien_lie WHERE ele_numero = '" .$elt. "';";
          $res_lien = $mysqli->query($requete_lien);
          // affichage du tableau
          echo ("<style>
            table, td, th {
              margin: auto;
              border-style: solid;
              border-width: 1px;
              border-color: black;
              vertical-align: middle;
            }
          </style>");
          echo ("<table cellpadding=\"5px\">");
            echo ("<tr>");
              echo ("<th>"); echo ("<h2>Titre</h2>"); echo ("</th>");
              echo ("<th>"); echo ("<h2>Synopsis</h2>"); echo ("</th>");
              echo ("<th>"); echo ("<h2>Date de sortie</h2>"); echo ("</th>");
              echo ("<th>"); echo ("<h2>Couverture</h2>"); echo ("</th>");
              // mise en place des lien si il y en a
              if ($res_lien->num_rows == 1){
              	echo ("<th>"); echo ("<h2>Lien vers un article</h2>"); echo ("</th>");
              	echo ("<th>"); echo ("<h2>Auteur de l'article</h2>"); echo ("</th>");
              	echo ("<th>"); echo ("<h2>Date de l'article</h2>"); echo ("</th>");
              }
            echo ("</tr>");
            $res1 = $mysqli->query($requete);
            $element = $res1->fetch_assoc();
            $lien = $res_lien->fetch_assoc();
            echo ("<tr>");
              echo ("<td align=\"center\">"); echo ("<h2><span2><em>" .$element['ele_intitule']. "</span2></h2>"); echo ("</td>");
              echo ("<td width=\"30%\" align=\"center\">"); echo ("<p>" .$element['ele_descriptif']. "</p>"); echo ("</td>");
              echo ("<td align=\"center\">"); echo ("<p>" .$element['ele_date_d_ajout']. "</p>"); echo ("</td>");
              echo ("<td align=\"center\">"); echo ("<img width='100' src='./images/". $element['ele_fichier_image'] ."'>"); echo ("</td>");
              // mise en place des lien si il y en a
              if ($res_lien->num_rows == 1){
              	echo ("<td align=\"center\">");echo ("<a href='" .$lien['lie_url']. "'><img width='75' src='./images/oeil.png'></a>");echo ("</td>");
              	echo ("<td align=\"center\">"); echo ("<p>" .$lien['lie_auteur']. "</p>"); echo ("</td>");
              	echo ("<td align=\"center\">"); echo ("<p>" .$lien['lie_date_publication']. "</p>"); echo ("</td>");
              }
            echo ("</tr>");
          echo ("</table>");
          // Mise en place des liens suivant et précédent
          $lien = 0;
          // recherche de l'élément suivant
          $requete_suiv ="SELECT ele_numero FROM t_element_ele JOIN t_liste_lis USING (ele_numero) JOIN t_selection_sel USING (sel_numero)
          WHERE ele_etat='P' AND sel_numero =" .$sele. "  AND ele_numero > " .$elt. " ORDER BY ele_numero ASC LIMIT 1";
          $result_suiv­ = $mysqli->query($requete_suiv);
          if ($result_suiv­->num_rows == 1)
          {
            $suivant = $result_suiv­->fetch_assoc();
            $lien = 1;
          }

          // recherche de l'élément précédent
          $requete_prec ="SELECT ele_numero FROM t_element_ele JOIN t_liste_lis USING (ele_numero) JOIN t_selection_sel USING (sel_numero)
          WHERE ele_etat='P' AND sel_numero =" .$sele. "  AND ele_numero < " .$elt. " ORDER BY ele_numero DESC LIMIT 1";
          $result_prec = $mysqli->query($requete_prec);
          if ($result_prec->num_rows == 1)
          {
            $precedent = $result_prec->fetch_assoc();
            if ($lien == 1) {
            	$lien = 2;
            }
            else {
            	$lien = -1;
            }
          }
          // affichage des flèches vers les éléments suivant et/ou précédents s'il existent
          if ($lien == 1){
          	echo ("<a href='./affichageselect.php?sel_numero=". $sele. "&ele_numero=" .$suivant['ele_numero']. "'><img width='100' src='./images/fleche_droite.png'></a>");
          }
          else if ($lien == -1){
          	echo ("<a href='./affichageselect.php?sel_numero=". $sele. "&ele_numero=" .$precedent['ele_numero']. "'><img width='100' src='./images/fleche_gauche.png'></a>");
          }
          else if ($lien == 2) {
          	echo ("<br /><a href='./affichageselect.php?sel_numero=". $sele. "&ele_numero=" .$precedent['ele_numero']. "'><img width='100' src='./images/fleche_gauche.png'></a><h1 style=\"display:inline;\"> /</h1> <a href='./affichageselect.php?sel_numero=". $sele. "&ele_numero=" .$suivant['ele_numero']. "'><img width='100' src='./images/fleche_droite.png'></a>");
          }
        }
        //Fermeture de la communication avec la base MariaDB
        $mysqli->close();
      ?>
    </div>
  </section>
</body>
</html>