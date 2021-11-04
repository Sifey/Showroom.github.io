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
                <li class="current"><a href="#intro">Sélection</a></li>
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
  <section id="intro">
    <div class="slogan">
      <div class="icon">
        <i class="icon-folder-open-alt icon-10x"></i>
      </div>
      <h1><em><span>Sélection</span></h1>
      <br />
      <br />
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
        // préparation de la requête pour obtenir les selections
        $requete="SELECT * FROM t_selection_sel;";
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
          // affichage du tableau
          echo ("<table cellpadding=\"20px\">");
            while ($sel = $result1->fetch_assoc())
          	{
              echo ("<tr>");
                echo ("<td>"); echo ("<p>" .$sel['sel_intitule']. "</p>"); echo ("</td>");
                echo ("<td>"); echo ("<p>" .$sel['sel_texte_introductif']. "</p>"); echo ("</td>");
                echo ("<td>"); echo ("<p>" .$sel['sel_date_d_ajout']. "</p>"); echo ("</td>");
                echo ("<td>"); echo ("<p>" .$sel['com_pseudo']. "</p>"); echo ("</td>");
                // Recherche du premier élément de la sélection
                $requete2="SELECT ele_numero FROM t_liste_lis JOIN t_element_ele USING (ele_numero) WHERE sel_numero=" .$sel['sel_numero']. " AND ele_numero>0 AND ele_etat='P' LIMIT 1;";
                $result2 = $mysqli->query($requete2);
                $lie = $result2->fetch_assoc();
                $sele = $sel['sel_numero'];
                $elt = $lie['ele_numero'];
                if ($elt == "")
                {
                  echo("<td>");
                  echo ("<a href='./affichageselect.php?sel_numero=". $sele. "&ele_numero=0'><img width='35' src='./images/oeil.png'></a>");echo ("</td");
                }
                else
                {
                  echo("<td>");
                  echo ("<a href='./affichageselect.php?sel_numero=". $sele. "&ele_numero=" .$elt. "'><img width='35' src='./images/oeil.png'></a>");echo ("</td");
                }
              echo ("</tr>");
            } 
            // ------------------------------------------
          echo ("</table>");
        }
        $mysqli->close();
      ?>
    </div>
  </section>
</body>
</html>
