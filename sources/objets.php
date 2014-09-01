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
 * classe BooAction
 *
 * @package Boo\Objets
 */
class BooAction extends BooObjet
{


	/**
	 * Execute l'objet
	 *
	 * @return true
	 */
	public function executer()
	{
	
		return true;
	
	}


}


/**
 * classe BooAnnuaire
 *
 * @package Boo\Objets
 */
class BooAnnuaire extends BooObjet
{


	


}


/**
 * classe BooChaine
 *
 * @package Gibolin\Objets
 */
class BooChaine extends BooObjet
{


	/**
	 * sortie
	 *
	 * @protected string
	 */
	protected $sortie = '';
	
	
	/**
	 * fonction qui genere la sortie
	 *
	 * @return mixed
	 */
	public function generer()
	{
	
		return $this->sortie;
	
	}


}


/**
 * classe BooErreurs
 *
 * @package Boo\Objets
 */
class BooErreurs extends BooObjet
{


	//
	static function errorHandler($code, $message, $fichier, $ligne)
	{
	
		switch ($code) {
		
			case E_NOTICE :
			case E_USER_NOTICE :
			
				$texte = $message . ' dans ' . $fichier . ', ligne ' . $ligne;
				echo 'INFORMATIONS : ' . $texte . "\n";
			
			break;
			
			
			case E_WARNING :
			case E_COMPILE_WARNING :
			case E_USER_WARNING :
			
				$texte = $message . ' dans ' . $fichier . ', ligne ' . $ligne;
				echo 'AVERTISSEMENT : ' . $texte . "\n";
			
			break;
			
			
			case E_ERROR :
			case E_PARSE :
			case E_CORE_ERROR :
			case E_COMPILE_ERROR :
			case E_USER_ERROR :
			
				$texte = $message . ' dans ' . $fichier . ', ligne ' . $ligne;
				echo 'ERREUR : ' . $texte . "\n";
			
			break;
			
			
			default :
			
				$texte = "Erreur inconnue: [" . $code . "] " . $message;
				echo 'ERREUR : ' . $texte . "\n";
			
			break;
			
		}
	
	}
	
	
	//
	static function exceptionHandler($e)
	{
	
		$texte = $e->getMessage() . " dans " . $e->getFile() . ", ligne " . $e->getLine();
		echo 'EXCEPTION : ' . $texte . "\n";
	
	}


}


/**
 * classe BooMessage
 *
 * @package Boo\Objets
 */
class BooMessage extends BooObjet
{


	/**
	 */
	public $type;
	
	
	/**
	 */
	public $message;
	
	
	/**
	 */
	function __construct()
	{
	
		
	
	}
	
	
	/**
	 */
	function envoyer($chaine)
	{
	
		$this->messageAssocier($chaine);
		
		return true;
	
	}
	
	
	/**
	 */
	function messageAssocier($chaine)
	{
	
		$this->message = $chaine;
	
	}
	
	
	/**
	 */
	function messageDonner()
	{
	
		return $this->message;
	
	}
	
	
	/**
	 */
	function typeAssocier($type)
	{
	
		$this->type = $type;
	
	}
	
	
	/**
	 */
	function typeDonner()
	{
	
		return $this->type;
	
	}


}


/**
 * classe BooMessagerie
 *
 * @package Boo\Objets
 */
class BooMessagerie extends BooObjet
{


	/**
	 * constructeur de l'objet
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Fonction d'analyse d'un message
	 *
	 * @param $parametres tableau contenant les paramètres
	 */
	function analyser($parametres)
	{
	
		// initialisation des variables
		$sortie = false;
		$message = [
			'date' => date_iso(),
			'emetteur' => false,
			'destinataire' => false,
			'nom' => '',
			'titre' => '',
			'texte' => ''
		];
		
		// traitement
		if (isset($parametres['emetteur']) && ($parametres['emetteur'] != '')) {
		
			$message['emetteur'] = $parametres['emetteur'];
		
		}
		
		if (isset($parametres['destinataire']) && ($parametres['destinataire'] != '')) {
		
			$message['destinataire'] = $parametres['destinataire'];
		
		}
		
		if (isset($parametres['nom']) && ($parametres['nom'] != '')) {
		
			$message['nom'] = $parametres['nom'];
		
		}
		
		if (isset($parametres['titre']) && ($parametres['titre'] != '')) {
		
			$message['titre'] = $parametres['titre'];
		
		}
		
		if (isset($parametres['texte']) && ($parametres['texte'] != '')) {
		
			$message['texte'] = $parametres['texte'];
		
		}
		
		if ($message['texte'] != '') {
		
			if ($message['titre'] == '') {
			
				$message['titre'] = $message['texte'];
			
			}
			
			if ($message['nom'] == '') {
			
				$message['nom'] = $message['titre'];
			
			}
			
			$sortie = $message;
		
		}
		
		return $sortie;
	
	
	}
	
	
	/**
	 * Fonction d'envoie de message
	 *
	 * @param $parametres tableau contenant les paramètres
	 */
	function envoyer($parametres)
	{
	
		// intialisation des variables
		$sortie = false;
		
		// traitement
		if ($message = $this->analyser($parametres)) {
		
			
		
		}
		
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui renvoie l'instance
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooMessagerie();
		
		}
		
		return self::$instance;
	
	}


}


/**
 * classe BooPaquet
 *
 * @package Boo\Objets
 */
class BooPaquet extends BooObjet
{


	//
	public $donnees = array();
	
	
	/**
	 * constructeur de l'objet
	 */
	public function __construct($parametres)
	{
	
		if (isset($parametres['donnees'])) {
		
			$this->donnees = $parametres['donnees'];
		
		}
	
	}


}


/**
 * classe BooPersistance
 *
 * @package Boo\Objets
 */
class BooPersistance extends BooObjet
{


	//
	public $donnees = array();
	
	
	/**
	 * constructeur de l'objet
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	//
	public function ouvrir()
	{
	
		
	
	}
	
	
	//
	public function fermer()
	{
	
		
	
	}


}


/**
 * classe BooRapport
 *
 * @package Boo\Objets
 */
class BooRapport extends BooObjet
{
	
	
	/**
	 * Objet instance
	 */
	static $instance;
	
	
	/**
	 * Fonction qui renvoie l'instance
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooRapport();
		
		}
		
		return self::$instance;
	
	}
	
	
	/**
	 * Fonction denregistrement de message
	 *
	 * @param $document document
	 * @param $message message
	 */
	public function enregistrer($document, $message)
	{
	
		if (file_exists($document)) {
		
			$ressource = @fopen($document, 'a');
			
			if ($ressource) {
			
				@flock($ressource, LOCK_EX);
				fwrite($ressource, $message . "\n");
				fclose($ressource);
			
			} else {
			
				die("Impossible d'écrire le rapport");
			
			}
		
		} else {
		
			$ressource = @fopen($document, 'w');
			
			if ($ressource) {
			
				@flock($ressource, LOCK_EX);
				fwrite($ressource, $message . "\n");
				fclose($ressource);
			
			} else {
			
				die("Impossible d'écrire le rapport");
			
			}
		
		}
	
	}


}


/**
 * classe BooRapporteur
 *
 * @package Boo\Objets
 */
class BooRapporteur extends BooObjet
{


	/**
	 * nom du fichier
	 */
	protected $document;
	
	
	/**
	 * objet instance
	 */
	static $instance;
	
	
	/**
	 * Fonction d'ajout de message
	 *
	 * @param $niveau niveau
	 * @param $chaine chaine
	 */
	function ajouter($niveau, $chaine)
	{
	
		$chaine = (string) $chaine;
		
		$recherche = array("\r\n", "\t");
		$remplace = array(" ", "");
		$chaine = str_replace($recherche, $remplace, $chaine);
		
		switch ($niveau) {
		
			case 0 :
				$message = new BooRapportsMessageDetails(0, $this->document);
				break;
			
			
			case 1 :
			
				$message = new BooRapportsMessageInformations(1, $this->document);
				break;
			
			
			case 2 :
				$message = new BooRapportsMessageAvertissements(2, $this->document);
				break;
			
			
			case 3 :
				$message = new BooRapportsMessageErreurs(3, $this->document);
				break;
			
			
			case 4 :
				$message = new BooRapportsMessageArrets(4, $this->document);
				break;
			
			
			default :
				$message = new BooRapportsMessageDetails(0, $this->document);
				break;
		
		}
		
		$message->envoyer($chaine);
	
	}
	
	
	/**
	 * fonction d'association du nom du fichier
	 *
	 * @param $fichier fichier
	 */
	public function documentAssocier($document)
	{
	
		$this->document = (string) $document;
		
		return true;
	
	}
	
	
	/**
	 * fonction qui renvoie l'instance
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooRapporteur();
		
		}
		
		return self::$instance;
	
	}


}


/**
 * classe BooReserve
 *
 * @package Boo\Objets
 */
class BooReserve extends BooObjet
{


	//
	static $instance;
	
	
	//
	private $dossier;
	
	
	//
	function __construct()
	{
	
		return true;
	
	}
	
	
	//
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooReserve();
		
		}
		
		return self::$instance;
	
	}
	
	
	//
	public function ecrire($dn, $contenu, $duree = 3600)
	{
	
		$sortie = false;
		$expiration = time() + $duree;
		$tableau = array(
			'expiration' => $expiration,
			'donnees' => $contenu
		);
		$hash = $this->hash($dn);
		$document = $this->dossier . $hash;
		$pointeur = @fopen($document, 'w');
		
		if ($pointeur) {
		
			@flock($pointeur, LOCK_EX);
			fwrite($pointeur, serialize($tableau));
			@flock($pointeur, LOCK_UN);
			fclose($pointeur);
			$sortie = true;
		
		}
		
		return $sortie;
	
	}
	
	
	//
	public function hash($dn)
	{
	
		return md5($dn);
	
	}
	
	
	//
	public function initialiser($dossier = './')
	{
	
		$this->dossier = $dossier;
		
		return true;
	
	}
	
	
	//
	public function lire($dn)
	{
	
		$sortie = false;
		$hash = $this->hash($dn);
		$document = $this->dossier . $hash;
		
		if (file_exists($document)) {
		
			$pointeur = @fopen($document, 'r');
			
			if ($pointeur) {
			
				@flock($pointeur, LOCK_SH);
				$contenu = file_get_contents($document);
				$contenu = unserialize($contenu);
				@flock($pointeur, LOCK_UN);
				fclose($pointeur);
			
			}
			
			$sortie = $contenu;
		
		}
		
		return $sortie;
	
	}


}


/**
 * classe BooServeur
 *
 * @package Boo\Objets
 */
class BooServeur extends BooObjet
{
	
	
	//
	public $configuration = array();
	
	
	//
	public function __construct()
	{
	
		
	
	}
	
	
	// chargement du fichier de configuration
	protected function configurationCharger($document)
	{
	
		if (file_exists($document)) {
		
			require_once($document);
			
			if (isset($configuration)) {
			
				$this->configuration = $configuration;
			
			} else {
			
				die("Variable configuration manquante");
			
			}
		
		} else {
		
			die("Configuration manquante (" . $document . ")");
		
		}
	
	}
	
	
	// configuration
	protected function configurer()
	{
	
		
	
	}


}


/**
 * classe BooSource
 *
 * @package Boo\Objets
 */
class BooSource extends BooObjet
{


	//
	public $etat;
	
	
	//
	public $messages = array();
	
	
	//
	public $operation;
	
	
	//
	public $parametres;
	
	
	//
	public $requetes = array();


}


/**
 * classe BooSources
 *
 * @package Boo\Objets
 */
class BooSources extends BooObjet
{


	//
	public function __construct()
	{
	
		
	
	}

}


/**
 * classe BooSourcesGestionnaire
 *
 * @package Boo\Objets
 */
class BooSourcesGestionnaire extends BooObjet
{


	/**
	 * Types de sources autorisees
	 */
	protected $types;
	
	
	/**
	 * Tableau contenant les sources
	 */
	protected $sources;
	
	
	/**
	 * Instance de l'objet gestionnaire de sources
	 */
	static $instance;
	
	
	/**
	 * Fonction qui renvoie l'objet unique de gestionnaire de sources (singleton)
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooSourcesGestionnaire();
		
		}
		
		return self::$instance;
	
	}
	
	
	/**
	 * Constructeur de l'objet
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Fonction d'association des types de sources autorisees
	 *
	 * @param $types types de sources autorisees
	 */
	protected function typesAssocier($types)
	{
	
		$this->types = $types;
		
		return true;
	
	}

	
	/**
	 * Fonction d'initialisation
	 *
	 * @param $types types de sources
	 */
	public function initialiser($types)
	{
	
		$this->typesAssocier($types);
		
		return true;
	
	}

	
	/**
	 * Fonction d'ajout d'une nouvelle source
	 *
	 * @param $nom nom de la source
	 * @param $type de source
	 * @param $parametres de la source
	 */
	public function ajouter($nom, $type, $parametres)
	{
	
		$sortie = false;
		
		if (isset($this->types[$type])) {
		
			// Type de source autorise
			$classe = $this->types[$type];
			
			if (class_exists($classe)) {
			
				$source = new $classe();
				$source->parametresAssocier($parametres);
				$source->initialiser();
				$this->sources[$nom] = $source;
				$sortie = true;
			
			}
		
		}
		
		return $sortie;
	
	}
	
	
	/**
	 * Fonction qui renvoie la source demandee
	 *
	 * @param $source nom de la source
	 */
	public function sourceDonner($source)
	{
	
		$sortie = false;
		
		if (isset($this->sources[$source])) {
		
			$sortie = $this->sources[$source];
		
		}
		
		return $sortie;
	
	}


}


/**
 * classe BooSourcesSource
 *
 * @package Boo\Objets
 */
class BooSourcesSource extends BooObjet
{


	/**
	 * Parametres
	 */
	protected $parametres;
	
	
	/**
	 * Compteur de demandes
	 */
	protected $demandes = 0;
	
	
	/**
	 * Etat de la source
	 */
	protected $actif = false;
	
	
	/**
	 * Fonction d'association des parametres
	 *
	 * @param $parametres parametres
	 */
	public function parametresAssocier(array $parametres)
	{
	
		$this->parametres = $parametres;
		
		return true;
	
	}
	
	
	/**
	 * Contructeur
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Fonction d'initialisation de la source
	 */
	public function initialiser()
	{
	
		return true;
	
	}
	
	
	/**
	 * Fonction d'ouverture de la source
	 */
	protected function ouvrir()
	{
	
		return true;
	
	}
	
	
	/**
	 * Fonction de demande
	 */
	public function demander($requete)
	{
	
		return true;
	
	}
	
	
	/**
	 * Fonction qui renvoie le nombre de demandes
	 */
	public function demandesDonner()
	{
	
		return $this->demandes;
	
	}


}


?>