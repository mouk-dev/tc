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
				<a href="#">Accueil</a>
				<span>Evénements</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

    <!-- Reservation section -->
    <section class="reservation-section spad pb-0">
        <div class="container">
            <div class="section-title mb-0">
                <h2>Bénin - Participez aux événements Culturels</h2>
                <p>Contribuez à l'inovation des nos ressources culturelles.</p>
            </div>
        </div>
    </section>
    <!-- Reservation section end -->

	<!-- course section -->
	<section class="course-section spad pb-0 pt-0">
		<div class="course-warp">
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">Tout</li>
				<li class="control" data-filter=".Festival">Festivals</li>
				<li class="control" data-filter=".Carnaval">Carnavals</li>
				<li class="control" data-filter=".Patrimoine">Patrimoines</li>
				<li class="control" data-filter=".Artisanat">Artisanats</li>
				<li class="control" data-filter=".Cinéma">Cinémas</li>
				<li class="control" data-filter=".Concert">Concerts</li>
				<li class="control" data-filter=".Randonnée">Randonnées</li>
			</ul>                                       
			<div class="row course-items-area">
				<?php
					include_once('app/pages/evenements/model_evenement.php');
					$db=new Evenements();
					$query=$db->consulterEvenementCulturel();
					foreach ($query as $key => $value) {
						echo '
								<!-- course -->
								<div class="mix col-lg-3 col-md-4 col-sm-6 '.$value['libelle_typeevenement'].'">
									<div class="course-item">
										<div class="course-thumb set-bg" data-setbg="'.str_replace('../../','app/',$value['image_evenement']).'"></div>
										<div class="course-info">
											<div class="course-text">
												<h5>'.$value['nom_evenement'].'</h5>
												<p class="text-justify">'.$value['description_evenement'].'</p>
												<span class="font-weight-bold d-block pb-3">'.$value['date_evenement'].'</span>
												<a href="participations.php?id_evenement='.$value['id_evenement'].'" class="students btn btn-danger text-white">Savoir plus et participer</a>
											</div>
										</div>
									</div>
								</div>
							';
					}
				?>
			</div>
		</div>
	</section>
	<!-- course section end -->

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