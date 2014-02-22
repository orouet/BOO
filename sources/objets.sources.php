<?PHP

/*

Copyright Olivier ROUET, 23/09/2012 

olivier.rouet@gmail.com

Ce logiciel est un programme informatique servant à fournir une bibliothèque
d'objets PHP.

Ce logiciel est régi par la licence CeCILL-C soumise au droit français et
respectant les principes de diffusion des logiciels libres. Vous pouvez
utiliser, modifier et/ou redistribuer ce programme sous les conditions
de la licence CeCILL-C telle que diffusée par le CEA, le CNRS et l'INRIA 
sur le site "http://www.cecill.info".

En contrepartie de l'accessibilité au code source et des droits de copie,
de modification et de redistribution accordés par cette licence, il n'est
offert aux utilisateurs qu'une garantie limitée.  Pour les mêmes raisons,
seule une responsabilité restreinte pèse sur l'auteur du programme,  le
titulaire des droits patrimoniaux et les concédants successifs.

A cet égard  l'attention de l'utilisateur est attirée sur les risques
associés au chargement,  à l'utilisation,  à la modification et/ou au
développement et à la reproduction du logiciel par l'utilisateur étant 
donné sa spécificité de logiciel libre, qui peut le rendre complexe à 
manipuler et qui le réserve donc à des développeurs et des professionnels
avertis possédant  des  connaissances  informatiques approfondies.  Les
utilisateurs sont donc invités à charger  et  tester  l'adéquation  du
logiciel à leurs besoins dans des conditions permettant d'assurer la
sécurité de leurs systèmes et ou de leurs données et, plus généralement, 
à l'utiliser et l'exploiter dans les mêmes conditions de sécurité. 

Le fait que vous puissiez accéder à cet en-tête signifie que vous avez 
pris connaissance de la licence CeCILL-C, et que vous en avez accepté les
termes.

*/


/**
 *
 * @package Boo\Objets\Sources
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooSgbd
 *
 * @package Boo\Sources
 */
class BooSgbd extends BooSource  {
	

	//
	public $lien;
	
	
	//
	public function __construct($parametres) {
	
		$this->lien = false;
		$this->etat = 0;
		
		if (is_array($parametres)) {
			$this->parametres = $parametres;
		}
		
	}

}

 
 /**
 * classe BooSourcesSourceConnexion
 *
 * @package Boo\Sources
 */
class BooSourcesSourceConnexion extends BooSourcesSource {


	/**
	 * Adresse du serveur
	 */
	protected $hote;

	
	/**
	 * Nom de la base
	 */
	protected $base;

	
	/**
	 * Identifiant de connexion
	 */
	protected $identifiant;

	
	/**
	 * Mot de passe de connexion
	 */
	protected $motdepasse;

	
	/**
	 * Pointeur de ressource
	 */
	protected $ressource;

	
	/**
	 * Persistance
	 */
	protected $persistant;

	
	/**
	 * Fonction d'initialisation de la source
	 */
	public function initialiser() {

		$this->hote = $this->parametres['hote'];
		$this->base = $this->parametres['base'];
		$this->identifiant = $this->parametres['identifiant'];
		$this->motdepasse = $this->parametres['motdepasse'];
		$this->persistant = $this->parametres['persistant'];
		$this->ouvrir();
		return true;
	
	}
	
}
 
 
/**
 * classe ElfSourcesPostgres
 *
 * @package Boo\Sources
 */
class ElfSourcesPostgres extends BooSourcesSourceConnexion {

	/**
	 * Fonction de connexion a la base
	 */
	protected function ouvrir() {
		// initialisation des variables
		$sortie = false;
		// traitement
		$chaine = 'host=' . $this->hote . ' dbname=' . $this->base . ' user=' . $this->identifiant . ' password=' . $this->motdepasse;
		if ($this->persistant) {
			$this->ressource = pg_pconnect($chaine);
		} else {
			$this->ressource = pg_connect($chaine);
		}
		if ($this->ressource) {
			$this->actif = true;
			$sortie = true;
		} else {
			$this->actif = false;
		}
		// sortie
		return $sortie;
	
	}

	/**
	 * Fonction de connexion a la base
	 */
	public function demander($requete) {
		// initialisation des variables
		$sortie = false;
		// traitement
		if (! $this->actif) {
			$this->ouvrir();
		}
		if ($this->actif == true) {
			$resultat = pg_query($this->ressource, $requete);
			if ($resultat) {
				$this->demandes += 1;
				$sortie = $resultat;
			}
		}
		// sortie
		return $sortie;
	
	}

	/**
	 * Fonction de lecture de resultat
	 */
	public function objetLire($resultat) {
		// initialisation des variables
		$sortie = false;
		// traitement
		$objet = pg_fetch_object($resultat);
		if ($objet) {
			$sortie = $objet;
		}
		// sortie
		return $sortie;
	
	}

	/**
	 * Fonction de lecture de resultat
	 */
	public function tableauLire($resultat) {
		// initialisation des variables
		$sortie = false;
		// traitement
		$tableau = pg_fetch_array($resultat);
		if ($tableau) {
			$sortie = $tableau;
		}
		// sortie
		return $sortie;
	
	}

	/**
	 * Fonction de lecture de resultat
	 */
	public function lignesNombre($resultat) {
		// initialisation des variables
		$sortie = false;
		// traitement
		$nombre = pg_num_rows($resultat);
		if ($nombre) {
			$sortie = $nombre;
		}
		// sortie
		return $sortie;
	
	}
	//
	public function pagesCompter($table, $pas, $filtre) {
		// initialisation des variables
		$sortie = false;
		// traitement
		$requete = "SELECT count(id) FROM " . $table . " " . $filtre . ";";
		if ($resultat = $this->demander($requete)) {
			$lignes = $this->tableauLire($resultat);
			$nombre = $lignes[0] / $pas;
			$nombre = ceil($nombre);
			if ($nombre > 0) {
				$sortie = $nombre;
			} else {
				$sortie = 1;
			}
		}
		// sortie
		return $sortie;
	
	}
}


/**
 * classe ElfSourcesReserve
 *
 * @package Boo\Sources
 */
class ElfSourcesReserve extends BooSourcesSource {

	/**
	 * pointeur de ressource
	 */
	protected $ressource;

	/**
	 * chemin
	 */
	protected $chemin;

	/**
	 * dossier
	 */
	protected $dossier;

	/**
	 * Fonction d'initialisation de la source
	 */
	public function initialiser() {
		// initialisation des variables
		$sortie = false;
		// traitement
		$this->chemin = $this->parametres['chemin'];
		$this->dossier = $this->parametres['dossier'];
		$sortie = $this->ouvrir();
		// sortie
		return $sortie;
	
	}

	/**
	 * Fonction d'ouverture du fichier
	 */
	protected function ouvrir() {
		// initialisation des variables
		$sortie = false;
		// traitement
		$reserve = BooReserve::instanceDonner();
		if ($reserve) {
			$reserve->initialiser($this->chemin, $this->dossier);
			$this->ressource = $reserve;
		}
		// sortie
		return $sortie;
	
	}

	/**
	 * Fonction de demande de donnees
	 */
	public function demander($requete) {
		// initialisation des variables
		$sortie = false;
		// anciens arguments
		// $action, $id, $contenu = '', $duree = 3600
		// traitement
		if ($action === 'lit') {
			$resultat = $this->ressource->lire($id);
		}
		if ($action === 'ecrit') {
			$resultat = $this->ressource->ecrire($id, $contenu, $duree);
		}
		if ($resultat) {
			$this->demandes += 1;
			$sortie = $resultat;
		}
		// sortie
		return $sortie;
	
	}
}


/**
 * classe ElfSourcesSession
 *
 * @package Boo\Sources
 */
class ElfSourcesSession extends BooSourcesSource {

}


?>