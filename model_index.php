<?php
	class Index{
		private function database(){
			//Connexion à la base des données
			try {
				$database=new PDO('mysql:host=localhost;dbname=bd_plateau_culture','root','');
				return $database;
			} catch (Exception $error) {
				die('Echec de la connexion à la base dess données.').$error->getMessage();
			}
		}

		//Ajout des Touristes
		public function ajouterUser($nom, $prenom, $email, $contact, $profil, $pass, $id_statut, $show_status, $premiere_connexion){
			$db=$this->database();
			$query=$db->prepare('INSERT INTO `users`(`nom`, `prenom`, `email`, `contact`, `profil`, `pass`, `id_statut`, `show_status`, premiere_connexion) VALUES(?,?,?,?,?,?,?,?,?)');
			$query->execute(array($nom, $prenom, $email, $contact, $profil, $pass, $id_statut, $show_status, $premiere_connexion));
			return $query;
		}

		//Vérifier coordonnées utilisateur
		public function emailVerify($email)
		{
			$db=$this->database();
			$query=$db->prepare('SELECT * FROM users WHERE email=?');
			$query->execute(array($email));
			return $query;
		}

		//Modifier le mot de passe d'un directeur de compagnie à la première connexion
		public function modifierMotDePasse($pass_utilisateur, $id)
		{
			$db=$this->database();
			$query=$db->prepare('UPDATE `users` SET `pass`=?, `premiere_connexion`=1 WHERE id=?');
			$query->execute(array($pass_utilisateur, $id));
			return $query;
		}

		//Récupérer le statut de l'utilisateur
		public function getStatutUtilisateur($id_statut)
		{
			$db=$this->database();
			$query=$db->prepare('SELECT libelle_statut FROM statut WHERE id_statut=?');
			$query->execute(array($id_statut));
			return $query;
		}
	}
?>