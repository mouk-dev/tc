<?php
     session_start();
     if (isset($_SESSION['id_site'])) {
          //Récupérer les informations de l'utilisateur à modifier
          include_once('app/pages/sites/model_site.php');
          $db=new Sites();
          $query=$db->consulterSiteReserver($_SESSION['id_site']);
          $infosSite=$query->fetch();
          $_SESSION['image_site']=$infosSite['image_site'];
          $_SESSION['nom_site']=$infosSite['nom_site'];
          $_SESSION['adress_site']=$infosSite['adress_site'];
		$_SESSION['prix_visite']=$infosSite['prix_visite'];
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

		<!-- script de l'API de paiyement en ligne avec kkiapay -->
		<!-- <script src="https://cdn.kkiapay.me/k.js"></script> -->
		<script amount="<?php echo $_SESSION['prix_visite']; ?>" 
			callback="/success"
			data="Réserver la visite du site touristique"
			position="center" 
			theme="#d82a4e"
			sandbox="true"
			key="63ecc4f0337b11efaaf927947a5855c8"
			src="https://cdn.kkiapay.me/k.js">
		</script>
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
          
          <!-- Categories section -->
          <section class="categories-section spad mt-5">
               <div class="container">
                    <div class="section-title">
                         <h2>Bénin - Les grandes figures touristiques</h2>
                         <p>Parcourez la galerie des sites touristiques sur toute l'étendue du terriptioire nationale.</p>
                    </div>
                    <div class="row">
                         <?php
                              echo '
                                        <!-- categorie -->
                                        <div class="w-50 m-auto">
                                             <div class="categorie-item">
                                                  <div class="ci-thumb set-bg" data-setbg="'.str_replace('../../', 'app/', $_SESSION['image_site']).'"></div>
                                                  <div class="ci-text text-center">
                                                       <h5>'.$_SESSION['nom_site'].'</h5>
                                                       <span class="font-weight-bold d-block pb-3">'.$_SESSION['adress_site'].'</span>
											<span class="font-weight-bold d-block pb-3">'.$_SESSION['prix_visite'].' FCFA</span>
											<form action="" method="POST">
												<input type="hidden" id="prix_visite" name="prix_visite" value="'.$_SESSION['prix_visite'].'" class="newInput" required>
												<button type="submit" name="payer" class="text-white btn btn-dark kkiapay-button" id="boutonPayer">Payer maintenant</button>
											</form>
                                                  </div>
                                             </div>
                                        </div>
                                   ';
                         ?>
                    </div>
               </div>
          </section>
          <!-- Categories section end -->

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
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | réalisé avec <i class="fa fa-heart-o" aria-hidden="true"></i> par Fambfad
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
		<script src="js/kkiapay.js"></script>
	</body>
</html>

