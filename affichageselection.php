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
                <li><a href="index.php" class="external">Accueil</a></li>
                <li><a href="selection.php" class="external">Sélection</a></li>
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
  $mysqli = new mysqli('localhost','zbaylejo0','bgdvpqy8','zfl2-zbaylejo0');
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
        <i class="icon-book icon-10x"></i>
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
      echo ("<h1><em><span>" .$titre['sel_intitule']. "</span></h1>");
      echo '<br />';
      echo '<br />';


      // affichage d'un message si sélection vide
      if ($elt == 0) 
      {
        echo ("<h2><span>La sélection est vide.</span></h2>");
      }
      else 
      {

        // affichage du contenu de la sélection
        $requete="SELECT ele_numero, ele_intitule, ele_descriptif, ele_date_d_ajout, ele_fichier_image, ele_etat FROM t_element_ele JOIN t_liste_lis USING (ele_numero) WHERE sel_numero =" .$sele. "";

        // affichage du tableau
        echo ("<style>
          table, td, th {
          margin: auto;
          border-style: solid;
          border-width: 1px;
          border-color: white;
          vertical-align: middle;
          }
        </style>");
        echo ("<table cellpadding=\"5px\">");
        echo ("<tr>");
        echo ("<th>"); echo ("<h2>Titre</h2>"); echo ("</th>");
        echo ("<th>"); echo ("<h2>Synopsis</h2>"); echo ("</th>");
        echo ("<th>"); echo ("<h2>Date de sortie</h2>"); echo ("</th>");
        echo ("<th>"); echo ("<h2>Couverture</h2>"); echo ("</th>");
        echo ("</tr>");
        $res1 = $mysqli->query($requete);
        while ($element = $res1->fetch_assoc())
        {
          echo ("<tr>");
          echo ("<td>"); echo ("<h2><span2><em>" .$element['ele_intitule']. "</span2></h2>"); echo ("</td>");
          echo ("<td width=\"30%\">"); echo ("<p>" .$element['ele_descriptif']. "</p>"); echo ("</td>");
          echo ("<td>"); echo ("<p>" .$element['ele_date_d_ajout']. "</p>"); echo ("</td>");
          echo ("<td>"); echo ("<img width='100' src='./images/". $element['ele_fichier_image'] ."'>"); echo ("</td>");
          echo ("</tr>");
        }
        echo ("</table>");
      }
      $mysqli->close();
      ?>
    </div>
  </section>
</body>
</html>
