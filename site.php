<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PlateauCulture - Le Tourisme</title>
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
							<li><a href="site.php" class="text-danger m-2">Sites touristiques</a></li>
							<li><a href="reservations.php" class="m-2">Réservations</a></li>
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
	<div class="page-info-section set-bg" data-setbg="img/Adepte-vodoun-Ganbada.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Accueil</a>
				<span>Tourisme</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Rechercher un site touristique</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="course-search-form">
							<select class="form-control">
								<datalist>
									<option class="text-center" selected disabled>Sélectionnez le site touristique que vous recherchez</option>
								</datalist>
							</select>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->

	<!-- Categories section -->
    	<section class="categories-section spad pb-0">
        	<div class="container">
            	<div class="section-title">
				<h2>Bénin - Les grandes figures touristiques</h2>
				<p>Parcourez la galerie des sites touristiques sur toute l'étendue du terriptioire nationale.</p>
            	</div>
            	<div class="row">
				<?php
					include_once('app/pages/sites/model_site.php');
					$db=new Sites();
					$query=$db->consulterSitesSite();
					foreach ($query as $key => $value) {
						echo '
								<!-- categorie -->
								<div class="col-lg-4 col-md-6">
									<div class="categorie-item">
										<div class="ci-thumb set-bg" data-setbg="'.str_replace('../../', 'app/', $value['image_site']).'"></div>
										<div class="ci-text text-center">
											<h5>'.$value['nom_site'].'</h5>
											<p>« '.$value['description_site'].' »</p>
											<span class="font-weight-bold d-block pb-3">'.$value['adress_site'].'</span>
											<a href="#" class="text-white btn btn-dark">En savoir plus</a>
										</div>
									</div>
								</div>
							';
					}
				?>
            	</div>
        	</div>
    </section>
    <!-- Categories section end -->

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