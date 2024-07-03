<?php 
	session_start();
     if (isset($_GET['id_evenement'])) {
          //Récupérer les informations de l'utilisateur à modifier
          include_once('app/pages/evenements/model_evenement.php');
          $db=new Evenements();
          $query=$db->infosEvenement($_GET['id_evenement']);
          $infosEvenement=$query->fetch();
          $_SESSION['image_evenement']=$infosEvenement['image_evenement'];
          $_SESSION['nom_evenement']=$infosEvenement['nom_evenement'];
          $_SESSION['description_evenement']=$infosEvenement['description_evenement'];
     }
	if (isset($_POST['ajouter'])) {
		$id_evenement=$_POST['evenement'];
		$email_utilisateur=$_POST['email'];
		$show_status=1;
          //Récupérer l'id de l'utilisateur
		if (isset($id_evenement, $email_utilisateur) && !empty($id_evenement) && !empty($email_utilisateur)) {
			include_once("app/pages/reservations/model_reservation.php");
			$db=new Reservations();
			//Récupérer l'id de l'utilisateur
			$query=$db->recupererIdUtilisateur($email_utilisateur);
               $nombreDeLigne=$query->rowCount();
               if ($nombreDeLigne==1) {
                    //Ajouter une participation
                    $id_utilisateur=$query->fetch(PDO::FETCH_ASSOC);
                    $query=$db->ajouterParticipation($id_evenement, $id_utilisateur['id'], $show_status);
                    header('location:participations.php');
               } else {
                    echo '
					<script>
						alert("Veuillez créer d\abord un compte");
					</script>
				';
               }
		} else {
			echo '
					<script>
						alert("Veuillez remplir tous les champs de ce formulaire");
					</script>
				';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>The World - Les événements touristiques</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/the.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

     <style>

		.newForm{
			width: 83%;
			margin: 0;
			padding: 0;
		}

		.newForm label{
			text-align: left;
		}

		.newForm .newInput {
			padding: 10px;
			width: 75%;
			margin-left: 50px;
			background: #edf4f6;
			border-style: none;
		}

          .row{
               width:100%;
          }
	</style>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section bg-dark p-0">
		<div class="container">
			<div class="row d-inline">
				<div class="p-0">
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-12">
					<nav class="main-menu">
						<ul class="p-0">
							<li><a href="index.php" class="m-2"><img src="img/logo.png" alt=""></a></li>
							<li><a href="index.php" class="m-2">Accueil</a></li>
							<li><a href="site.php" class="m-2">Sites touristiques</a></li>
							<li><a href="reservations.php" class="m-2">Réservations</a></li>
							<li><a href="evenements.php" class="text-danger m-2">Evénements</a></li>
							<li><a href="contact.php" class="m-2">Contact</a></li>
							<li><a href="inscription.php" class="btn btn-danger text-white py-2 px-3 m-2">S'inscrire</a></li>
							<li><a href="app/index.php" class="btn btn-danger text-white py-2 px-3 m-2">Se connecter</a></li>
					   </ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/Visitez-les-Tatas-Somba-1536x1024.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Accueil</a>
                    <a href="evenements.php">Evénements</a>
				<span>Participations</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- Page  -->
	<section class="spad">
		<div class="container">
               <div class="section-title">
                    <h2>Bénin - Réservez votre participation à un événement culturel</h2>
                    <p>Explorez les traditions, coutumes et pratiques culturelles de notre région.</p>
               </div>
			<div class="row">
                    <?php
                         echo '
                                   <div class="col-lg-10">
                                        <!-- blog post -->
                                        <div class="blog-post">
                                             <img src="'.str_replace('../../','app/',$_SESSION['image_evenement']).'" alt="">
                                             <h3>'.$_SESSION['nom_evenement'].'</h3>
                                             <p class="text-justify">'.$_SESSION['description_evenement'].'</p>
                                        </div>
                                   </div>
                              ';
				?>

                    <form class="newForm" action="" method="POST">
                         <h3 class="mb-4 pb-4">Formulaire de participation à un événement culturel</h3>
                         <div class="form-group d-flex justify-content-between align-items-center">
                              <label for="evenement">Evénements Culturel : </label>
                              <select id="evenement" name="evenement" class="newInput" required>
                                   <?php
                                        include_once("app/pages/evenements/model_evenement.php");
                                        $db=new Evenements();
                                        $query=$db->recupererEvenement();
                                        $evenements=$query->fetchAll();
                                        foreach ($evenements as $key => $value) {
                                             echo '<option value="'.$value['id_evenement'].'">'.$value['nom_evenement'].'</option>';
                                        }
                                   ?>
                              </select>
                         </div>

                         <div class="form-group d-flex justify-content-between align-items-center">
                              <label for="email">Votre Email : </label>
                              <input type="email" id="email" name="email" class="newInput" placeholder="Entrez votre Email" required>
                         </div>

                         <button type="submit" name="ajouter" class="site-btn mt-3">Participer maintenant</button>
                    </form>
			</div>
		</div>
	</section>
	<!-- Page end -->
	
	<!-- Footer section -->
     <footer class="footer-section spad pb-0">
        <div class="footer-top">
            <div class="footer-warp">
                <div class="row">
                    <div class="widget-item col-12 col-md-4">
                        <h4>Contact</h4>
                        <ul class="contact-list">
                            <li>Adresse : 1481 Creekside Lane, Avila Beach, CA 931</li>
                            <li>Téléphone : +53 345 7953 32453</li>
                            <li>Email : yourmail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="widget-item col-12 col-md-4">
                        <h4>Liens Utiles</h4>
                        <ul>
                            <li><a href="#">Nos Services</a></li>
                            <li><a href="#">À Propos</a></li>
                            <li><a href="#">Politique de Confidentialité</a></li>
                            <li><a href="#">Conditions d'Utilisation</a></li>
                        </ul>
                    </div>
                    <div class="widget-itemcol-12 col-md-4">
                        <h4>Newsletter</h4>
                        <form class="footer-newslatter">
                            <input type="email" placeholder="E-mail">
                            <button class="site-btn">S'abonner</button>
                            <p>*Nous ne partageons pas vos informations personnelles.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-warp">
                <ul class="footer-menu">
                    <li><a href="#">Mentions Légales</a></li>
                    <li><a href="#">Inscription</a></li>
                    <li><a href="#">Confidentialité</a></li>
                </ul>
                <div class="copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est réalisé avec <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>