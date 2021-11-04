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
        <i class="icon-book icon-10x"></i>
      </div>
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
    // récupération des entrées
    $action=htmlspecialchars(addslashes($_POST['action']));
    $pseudo = $_SESSION['login'];
    // Vérification de l'action -> Insertion d'une nouvelle actualité
    if ($action=="action_ajout_act") {
      // Récupération du texte
      $titre=htmlspecialchars(addslashes($_POST['titre']));
      $etat=htmlspecialchars(addslashes($_POST['etat']));
      $texte=htmlspecialchars(addslashes($_POST['texte']));
      // vérification si l'etat est correctement entrer
      if ($_POST['etat']!='I' && $_POST['etat']!='V'){
        echo "<h2>Erreur état de l'élément incorrect veuillez entrer un état visible (V) ou invisible (I). Veuillez recommencer<h2>";
        header("refresh:7 ; url= admin_actualite.php");
        exit();
      }
      // Insertion de l'actualité
      $requete_act = "insert into t_actualite_act values (NULL, '" .$titre. "', '" .$texte. "', CURDATE(), '" .$etat. "', '" .$pseudo. "');";
      echo ($requete_act);
      $result_act = $mysqli->query($requete_act);
      if ($result_act==false) {
        // La requête a echoué
        echo "Error: Problème d'accès à la base \n";
        exit();
      }
    }
    // Vérification de l'action -> modification de l'état de l'actualité
    else if ($action=="action_modif_etat") {
      $titre=htmlspecialchars(addslashes($_POST['titre']));
      $etat=htmlspecialchars(addslashes($_POST['etat']));
      // vérification si l'etat est correctement entrer
      if ($_POST['etat']!='I' && $_POST['etat']!='V'){
        echo "<h2>Erreur état de l'élément incorrect veuillez entrer un état visible (V) ou invisible (I). Veuillez recommencer<h2>";
        header("refresh:3;url=admin_actualite.php");
        exit();
      }
      else if (!isset($titre)) { 
        echo "<h2>Erreur (Titre). Veuillez recommencer<h2>";
        header("refresh:7 ; url= admin_actualite.php");
        exit();
      }
      // Modification de l'état
      $requete_act = "UPDATE t_actualite_act SET act_etat='" .$etat. "' WHERE act_titre='" .$titre. "';";
      echo ($requete_act);
      $result_act = $mysqli->query($requete_act);
      if ($result_act==false) {
      // La requête a echoué
        echo "Error: Problème d'accès à la base \n";
        exit();
      }
    }
    else if ($action=="action_supp_act") {
      $numero=htmlspecialchars(addslashes($_POST['numero']));
      if (!isset($numero)) { 
        echo "<h2>Erreur (numéro). Veuillez recommencer<h2>";
        header("refresh:7 ; url= admin_actualite.php");
        exit();
      }
      // Insertion de l'actualité
      $requete_act = "DELETE FROM t_actualite_act WHERE act_numero='$numero';";
      echo ($requete_act);
      $result_act = $mysqli->query($requete_act);
      if ($result_act==false) {
      // La requête a echoué
        echo "Error: Problème d'accès à la base \n";
        exit();
      }
    }
    // si tout c'est bien passé, on redirige vers la page admin des actualités
    header("Location:admin_actualite.php");
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
    ?>
    </div>
  </section>
</body>
</html>