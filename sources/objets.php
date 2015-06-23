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
 * Objets de base
 * @package Boo\Objets
 * @author Olivier ROUET
 * @version 1.0.0
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
	 * @return boolean
	 */
	public function executer()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = true;
		
		// sortie
		return $sortie;
	
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
 * @package Boo\Objets
 */
class BooChaine extends BooObjet
{


	/**
	 * Sortie
	 *
	 * @access protected
	 * @var string
	 */
	protected $sortie = '';
	
	
	/**
	 * Génère la sortie
	 *
	 * @return mixed
	 */
	public function generer()
	{
	
		// sortie
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


	/**
	 * Gestion des erreurs
	 *
	 * @param integer $code
	 * @param string $message
	 * @param string $fichier
	 * @param integer $ligne
	 * @return boolean
	 */
	static function errorHandler($code, $message, $fichier, $ligne)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		switch ($code) {
		
			case E_NOTICE :
			case E_USER_NOTICE :
			
				$texte = $message . ' dans ' . $fichier . ', ligne ' . $ligne;
				echo 'INFORMATIONS : ' . $texte . "\n";
				$sortie = true;
			
			break;
			
			
			case E_WARNING :
			case E_COMPILE_WARNING :
			case E_USER_WARNING :
			
				$texte = $message . ' dans ' . $fichier . ', ligne ' . $ligne;
				echo 'AVERTISSEMENT : ' . $texte . "\n";
				$sortie = true;
			
			break;
			
			
			case E_ERROR :
			case E_PARSE :
			case E_CORE_ERROR :
			case E_COMPILE_ERROR :
			case E_USER_ERROR :
			
				$texte = $message . ' dans ' . $fichier . ', ligne ' . $ligne;
				echo 'ERREUR : ' . $texte . "\n";
				$sortie = true;
			
			break;
			
			
			default :
			
				$texte = "Erreur inconnue: [" . $code . "] " . $message;
				echo 'ERREUR : ' . $texte . "\n";
				$sortie = true;
			
			break;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Gestion des execptions
	 *
	 * @param exception $e
	 * @return boolean
	 */
	static function exceptionHandler($e)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$texte = $e->getMessage() . " dans " . $e->getFile() . ", ligne " . $e->getLine();
		echo 'EXCEPTION : ' . $texte . "\n";
		$sortie = true;
		
		// sortie;
		return $sortie;
	
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
	 * Type de message
	 * 
	 * @access public
	 * @var string
	 */
	public $type;
	
	
	/**
	 * Contenu du message
	 * 
	 * @access public
	 * @var string
	 */
	public $message;
	
	
	/**
	 * Constructeur
	 *
	 */
	function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Envoie un message
	 * 
	 * @param string $chaine
	 * @return boolean
	 */
	function envoyer($chaine)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->messageAssocier($chaine);
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Associe une chaine
	 *
	 * @param string $chaine
	 * @return boolean
	 */
	function messageAssocier($chaine)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->message = $chaine;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie le contenu du message
	 *
	 * @return string
	 */
	function messageDonner()
	{
	
		return $this->message;
	
	}
	
	
	/**
	 * Associe un type
	 *
	 * @param string $type
	 * @return boolean
	 */
	function typeAssocier($type)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->type = $type;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie un type
	 *
	 * @return string
	 */
	function typeDonner()
	{
	
		// sortie
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
	 * Constructeur de l'objet
	 *
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Analyse d'un message
	 *
	 * @param array $parametres Tableau contenant les paramètres
	 $ @return boolean
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
		
		// sortie
		return $sortie;
	
	
	}
	
	
	/**
	 * Envoie de message
	 *
	 * @param array $parametres Tableau contenant les paramètres
	 * @return boolean
	 */
	function envoyer($parametres)
	{
	
		// intialisation des variables
		$sortie = false;
		
		// traitement
		if ($message = $this->analyser($parametres)) {
		
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie l'instance
	 *
	 */
	static function instanceDonner()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (empty(self::$instance)) {
		
			self::$instance = new BooMessagerie();
		
		}
		
		// sortie
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


	/**
	 * Données
	 *
	 * @access public
	 * @var array
	 */
	public $donnees = array();
	
	
	/**
	 * Constructeur de l'objet
	 *
	 * @param array $parametres
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


	/**
	 * Données
	 *
	 * @access public
	 * @var array
	 */
	public $donnees = array();
	
	
	/**
	 * Constructeur de l'objet
	 *
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Ouvre une persistance
	 *
	 */
	public function ouvrir()
	{
	
		
	
	}
	
	
	/**
	 * Ferme une persistance
	 *
	 */
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
	 *
	 */
	static $instance;
	
	
	/**
	 * Renvoie l'instance
	 *
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooRapport();
		
		}
		
		return self::$instance;
	
	}
	
	
	/**
	 * Enregistre un message
	 *
	 * @param $document document
	 * @param $message message
	 * @return boolean
	 */
	public function enregistrer($document, $message)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
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
		
		// sortie
		return $sortie;
	
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
	 * Nom du document
	 *
	 * @access protected
	 * @var string
	 */
	protected $document;
	
	
	/**
	 * Objet instance
	 *
	 */
	static $instance;
	
	
	/**
	 * Ajout de message
	 *
	 * @param $niveau niveau
	 * @param $chaine chaine
	 * @return boolean
	 */
	function ajouter($niveau, $chaine)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
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
		
		$sortie = $message->envoyer($chaine);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Association du nom de document
	 *
	 * @param string $document Nom du document
	 * @return boolean
	 */
	public function documentAssocier($document)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->document = (string) $document;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie l'instance
	 *
	 * @return mixed
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


	/**
	 * Objet instance
	 *
	 */
	static $instance;
	
	
	/**
	 * Dossier
	 *
	 * @access protected
	 * @var string
	 */
	protected $dossier;
	
	
	/**
	 * Constructeur
	 *
	 */
	function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Renvoie l'instance
	 *
	 * @return mixed
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooReserve();
		
		}
		
		return self::$instance;
	
	}
	
	
	/**
	 * Ecrit une élément dans la réserve
	 *
	 * @param string $dn Nom unique
	 * @param mixed $contenu Données à enregistrer
	 * @param integer $duree Durée de conservation en secondes
	 * @return boolean
	 */
	public function ecrire($dn, $contenu, $duree = 3600)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
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
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère un hash
	 *
	 * @param string $dn Nom unique
	 * @return string
	 */
	public function hash($dn)
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie = md5($dn);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Initialise la réserve
	 *
	 * @param string $dossier Dossier de stockage
	 * @return boolean
	 */
	public function initialiser($dossier = './')
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->dossier = $dossier;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Lit un élément de la réserve
	 *
	 * @param string $dn Nom unique
	 * @return mixed
	 */
	public function lire($dn)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
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
		
		// sortie
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
	
	
	/**
	 * Tableau de configuration
	 *
	 * @access public
	 * @var array
	 */
	public $configuration = array();
	
	
	/**
	 * Constructeur
	 *
	 */
	public function __construct()
	{
	
		
	
	}
	
	/**
	 * Chargement du document de configuration
	 *
	 * @param string $document Chemin complet vers le document
	 * @return boolean
	 */
	protected function configurationCharger($document)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (file_exists($document)) {
		
			require_once($document);
			
			if (isset($configuration)) {
			
				$this->configuration = $configuration;
				$sortie = true;
			
			} else {
			
				die("Variable configuration manquante");
			
			}
		
		} else {
		
			die("Configuration manquante (" . $document . ")");
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Configure le serveur
	 *
	 * @return boolean
	 */
	protected function configurer()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSource
 *
 * @package Boo\Objets
 */
class BooSource extends BooObjet
{


	/**
	 * Etat
	 *
	 * @access public
	 * @var string
	 */
	public $etat;
	
	
	/**
	 * Tableau des messages
	 *
	 * @access public
	 * @var array
	 */
	public $messages = array();
	
	
	/**
	 * Operation
	 *
	 * @access public
	 * @var mixed
	 */
	public $operation;
	
	
	/**
	 * Tableau des paramètres
	 *
	 * @access public
	 * @var array
	 */
	public $parametres;
	
	
	/**
	 * Tableau des requètes
	 *
	 * @access public
	 * @var array
	 */
	public $requetes = array();


}



/**
 * classe BooSources
 *
 * @package Boo\Objets
 */
class BooSources extends BooObjet
{


	/**
	 * Constructeur
	 *
	 */
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
	 *
	 * @access public
	 * @var array
	 */
	protected $types;
	
	
	/**
	 * Tableau contenant les sources
	 *
	 * @access public
	 * @var array
	 */
	protected $sources;
	
	
	/**
	 * Instance de l'objet gestionnaire de sources
	 *
	 */
	static $instance;
	
	
	/**
	 * Renvoie l'objet unique de gestionnaire de sources (singleton)
	 *
	 * @return mixed
	 */
	static function instanceDonner()
	{
	
		if (empty(self::$instance)) {
		
			self::$instance = new BooSourcesGestionnaire();
		
		}
		
		return self::$instance;
	
	}
	
	
	/**
	 * Constructeur
	 *
	 */
	public function __construct()
	{
	
		
	
	}
	
	
	/**
	 * Association des types de sources autorisees
	 *
	 * @param array $types Types de sources autorisees
	 * @return boolean
	 */
	protected function typesAssocier($types)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->types = $types;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}

	
	/**
	 * Initialisation
	 *
	 * @param $types types de sources
	 * @return boolean
	 */
	public function initialiser($types)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $this->typesAssocier($types);
		
		// sortie
		return $sortie;
	
	}

	
	/**
	 * Ajoute une nouvelle source
	 *
	 * @param string $nom Nom de la source
	 * @param string $type Type de source
	 * @param array $parametres Paramètres de la source
	 * @return boolean
	 */
	public function ajouter($nom, $type, $parametres)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->types[$type])) {
		
			// Type de source autorisée (class)
			$classe = $this->types[$type];
			
			if (class_exists($classe)) {
			
				$source = new $classe();
				$source->parametresAssocier($parametres);
				$source->initialiser();
				$this->sources[$nom] = $source;
				$sortie = true;
			
			}
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoi la source demandee
	 *
	 * @param $source nom de la source
	 * @return mixed
	 */
	public function sourceDonner($source)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->sources[$source])) {
		
			$sortie = $this->sources[$source];
		
		}
		
		// sortie
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
	 * Paramètres
	 *
	 * @access public
	 * @var array
	 */
	protected $parametres;
	
	
	/**
	 * Compteur de demandes
	 *
	 * @access protected
	 * @var integer
	 */
	protected $demandes = 0;
	
	
	/**
	 * Etat de la source
	 *
	 * @access protected
	 * @var boolean
	 */
	protected $actif = false;
	
	
	/**
	 * Contructeur
	 *
	 */
	public function __construct()
	{
	
		
	
	}
	
	/**
	 * Demande
	 *
	 * @param string $requete Requète
	 * @return boolean
	 */
	public function demander($requete)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie le nombre de demandes
	 *
	 * @return integer
	 */
	public function demandesDonner()
	{
	
		return $this->demandes;
	
	}
	
	
	/**
	 * Initialisation de la source
	 *
	 * @return boolean
	 */
	public function initialiser()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Ouverture de la source
	 *
	 * @return boolean
	 */
	protected function ouvrir()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Association des parametres
	 *
	 * @param array $parametres parametres
	 * @return boolean
	 */
	public function parametresAssocier(array $parametres)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->parametres = $parametres;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}


}


?>