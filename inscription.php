<?php
	if (isset($_POST['ajouterUser'])) {
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$pass=$_POST['pass'];
		$pass_hash=password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$confirmPass=$_POST['confirmPass'];
		$id_statut=3;
		$show_status=1;
		$premiere_connexion=1;
		//Infos image de profil
		/*------- Variables fichiers -------*/
		@$name_file = $_FILES['image_utilisateur']['name'];
		@$file = $_FILES['image_utilisateur']['tmp_name'];
		/*------- Variables extensions -------*/
		@$extension_accepted = array(".jpg",".jpeg",".png",".JPG",".JPEG",".PNG");
		@$extension_file = strrchr($name_file,'.');
		@$path_file = 'app/images/faces/'.$name_file;
		if (isset($nom, $prenom, $email, $contact, $pass, $confirmPass) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($contact) && !empty($pass) && !empty($confirmPass)) {
			if ($confirmPass===$pass) {
				if (!empty($_FILES)) {
					if (in_array($extension_file, $extension_accepted)) {
						if (move_uploaded_file($file, $path_file)) {
							include_once('model_index.php');
							$db=new Index();
							$query=$db->ajouterUser($nom, $prenom, $email, $contact, $path_file, $pass_hash, $id_statut, $show_status, $premiere_connexion);
							header('location:app/index.php');
						}
					}else {
						echo '
								<script>
									alert("Attention ! Ce fichier n\'est pas une image.");
								</script>
							';
					}
				} else {
					echo '
							<script>
								alert("Vous devez définir une photo de profil.");
							</script>
						';
				}
			} else {
				echo '
					<script>
						alert("Les mots de passe ne sont pas identiques.");
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
	<title>The World - Inscription</title>
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

		.newForm .newInput,input[type="tel"] {
			height: 60px;
			padding: 0 35px;
			width: 100%;
			background: #edf4f6;
			border-style: none;
		}

		.newForm .newInput:focus,.newForm input[type="tel"]:focus {
			border-bottom: 2px solid #d82a4e;
		}

		input[type="tel"]{
			margin-bottom: 25px;
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

	<!-- Page -->
	<section class="contact-page spad mt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="contact-form-warp">
						<div class="section-title text-white text-left">
							<h2 class="text-center">Inscrivez-vous maintenant</h2>
							<p></p>
						</div>
						<form class="contact-form newForm" method="POST" enctype="multipart/form-data">
							<input type="text" name="nom" placeholder="Votre nom" />

							<input type="text" name="prenom" placeholder="Votre prénom" >

							<input type="email" name="email" placeholder="Email">

							<input type="tel" name="contact" placeholder="Contact">

							<input type="password" name="pass" placeholder="Mot de passe" class="newInput mb-4" />

							<input type="password" name="confirmPass" placeholder="Confirmer le mot de passe" class="newInput mb-4" />

							<input type="file" name="image_utilisateur" id="v-upload" />
							<label for="v-upload" class="file-up-btn">Importer une photo</label>

							<button type="submit" name="ajouterUser" class="site-btn">Créer mon compte</button>

							<a href="app/index.php" class="text-white font-weight-bold" style="padding:20px; background:#d82a4e;">Se connecter</a>
						</form>
					</div>
				</div>
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