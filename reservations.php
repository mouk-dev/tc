<?php 
	session_start();
	if (isset($_POST['ajouter'])) {
		$id_site=$_POST['site'];
		$email_utilisateur=$_POST['email'];
		$date=$_POST['date'];
		$show_status=1;
		if (isset($id_site, $email_utilisateur, $date) && !empty($id_site) && !empty($email_utilisateur) && !empty($date)) {
			include_once("app/pages/reservations/model_reservation.php");
			$db=new Reservations();
			//Récupérer l'id de l'utilisateur
			$query=$db->recupererIdUtilisateur($email_utilisateur);
			$id_utilisateur=$query->fetch(PDO::FETCH_ASSOC);
			//Récupérer le nombre de ligne de réservation pour un site donné
			$query=$db->verifierReservationSite($id_site);
			$nombreDeLigneReservation=$query->rowCount();
			//Vérifie si la réservation de ce site existe déjà
			if ($nombreDeLigneReservation>=0) {
				//Récupérer le nombre de ligne de réservation d'un utilisateur donné
				$query=$db->verifierReservationUtilisateur($id_utilisateur['id']);
				$nombreDeLigneReservationUtilisateur=$query->rowCount();
				//Vérifier si l'utilisateur avait déjà une réservation
				if ($nombreDeLigneReservationUtilisateur>=0) {
					//Récupérer le nombre de ligne d'une réservation à une date donnée
					$query=$db->verifierReservationDate($date);
					$nombreDeLigneDateReservation=$query->rowCount();
					//Vérifier si la date existait déjà
					if ($nombreDeLigneDateReservation==0) {
						//Ajouter une réservation
						$query=$db->ajouterReservation($id_site, $id_utilisateur['id'], $date, $show_status,$id_utilisateur['id']);
						$_SESSION['id_site']=$id_site;
						echo '
								<script>
									alert("Votre demande de réservation a été envoyé avec succès.");
									open("http://localhost/tc/valider_reservation.php");
								</script>
							';
					} elseif ($nombreDeLigneReservation<=0 && $nombreDeLigneDateReservation>0) {
						//Ajouter une réservation
						$query=$db->ajouterReservation($id_site, $id_utilisateur['id'], $date, $show_status,$id_utilisateur['id']);
						$_SESSION['id_site']=$id_site;
						echo '
								<script>
									alert("Votre demande de réservation a été envoyé avec succès.");
									open("http://localhost/tc/valider_reservation.php");
								</script>
							';
					}else {
						echo '
								<script>
									alert("Vous aviez déjà une réservation en cours pour ce site touristique. Veuillez consulter l\'historique de vos réservation.");
								</script>
							';
					}
				}
			} else {
				//Le site demandé n'existe pas
				echo '
					<script>
						alert("Ce site touristique n\'est pas disponible.");
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
		<title>The World - Les visites touristiques bénin</title>
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
				width: 100%;
				margin: 0 auto;
				padding: 0;
			}

			.newForm label{
				text-align: left;
			}

			.newForm .newInput {
				padding: 10px;
				width: 80%;
				margin-left: 50px;
				background: #edf4f6;
				border-style: none;
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
								<li><a href="reservations.php" class="text-danger m-2">Réservations</a></li>
								<li><a href="evenements.php" class="m-2">Evénements</a></li>
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
		<div class="page-info-section set-bg" data-setbg="img/Sites-touristiques-du-nord-Benin-Chutes-de-Kota-1536x1024.jpg">
			<div class="container">
				<div class="site-breadcrumb">
					<a href="index.php">Accueil</a>
					<span>Réservation</span>
				</div>
			</div>
		</div>
		<!-- Page info end -->

		<!-- Reservation section -->
		<section class="reservation-section spad pb-0">
			<div class="container">
				<div class="section-title">
					<h2>Bénin - Réservez Votre Visite Culturelle</h2>
					<p>Explorez les traditions, coutumes et pratiques culturelles de notre région.</p>
				</div>
				<form class="newForm" action="" method="POST">
					<div class="form-group d-flex justify-content-between align-items-center">
						<label for="site">Site Culturel : </label>
						<select id="site" name="site" class="newInput" required>
							<?php
								include_once("app/pages/reservations/model_reservation.php");
								$db=new Reservations();
								$query=$db->recupererSite();
								$sites=$query->fetchAll();
								foreach ($sites as $key => $value) {
									echo '<option value="'.$value['id_site'].'">'.$value['nom_site'].'</option>';
								}
							?>
						</select>
					</div>

					<div class="form-group d-flex justify-content-between align-items-center">
						<label for="email">Votre Email : </label>
						<input type="email" id="email" name="email" class="newInput" placeholder="Entrez votre Email" required>
					</div>

					<div class="form-group d-flex justify-content-between align-items-center">
						<label for="date">Date de la Visite : </label>
						<input type="date" id="date" name="date" class="newInput" required>
					</div>

					<button type="submit" name="ajouter" class="site-btn mt-3">Réserver Maintenant</button>
				</form>
			</div>
		</section>
		<!-- Reservation section end -->

		<!-- banner section -->
		<section class="banner-section spad">
			<div class="container">
				<div class="section-title mb-0 pb-2">
					<h2>Rejoignez notre communauté maintenant !</h2>
					<p>Le client est très important, le client sera suivi par le client. Jusque-là, on avait dit le plus grand mauris du monde, mais il n'existe pas de site officiel. Ainsi que la sagesse juridique. La fin du cours.</p>
				</div>
				<div class="text-center pt-5">
					<a href="inscription.php" class="site-btn">S'inscrire maintenant</a>
				</div>
			</div>
		</section>
		<!-- banner section end -->


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