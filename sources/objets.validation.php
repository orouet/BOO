<?php

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
 * Validation
 * @package Boo\Objets\Validation
 * @author Olivier ROUET
 * @version 1.0.1
 */


/**
 * classe BooValidationDirecteur
 *
 * @package Boo\Objets\Validation
 */
class BooValidationDirecteur extends BooActionsDirecteurs
{


	/**
	 * Tableau contenant les variables en sortie
	 *
	 * @access protected
	 * @var array
	 */
	protected $variables = array();
	
	
	/**
	 * Tableau contenant la liste des variables manquantes
	 *
	 * @access protected
	 * @var array
	 */
	protected $manquantes = array();
	
	
	/**
	 * emplacement et nom du fichier
	 *
	 * @protected string
	 */
	protected $document;
	
	
	/**
	 * Association du nom du document
	 *
	 * @param $document emplacement et nom du document
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
	 * fonction de chargement d'un etape du fichier XML
	 *
	 * @param $id numero de l'etape
	 * @return boolean
	 */
	public function xmlLire($id = 1)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$xml = simplexml_load_file($this->document);
		
		if ($xml) {
		
			$xml['xmlns'] = '';
			$demande = "//etape[@id='" . $id . "']";
			$resultat = $xml->xpath($demande);
			
			foreach ($resultat as $etape) {
			
				foreach ($etape->variable as $variable) {
				
					$this->actionAjouter(
						$variable['methode'],
						$variable['intitule'],
						$variable['type'],
						$variable['longueur'],
						$variable, $variable['obligatoire']
					);
				
				}
			
			}
			
			$sortie = true;
		
		} else {
		
			// $this->messageAjouter(GIBOLIN_RAPPORTS_ERREURS, 'Impossible de charger le fichier XML : ' . $this->fichier);
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui permet d'ajouter une action
	 *
	 * @param $methode methode de lecture
	 * @param $intitule intitule
	 * @param $type type
	 * @param $longueur longueur maximale
	 * @param $valeur valeur par defaut
	 * @param $obligatoire numero de l'etape
	 * @return boolean
	 */
	public function actionAjouter($methode, $intitule, $type, $longueur, $valeur, $obligatoire)
	{
	
		// initialisation des variables
		$sortie = false;
		$classes = array(
			'chaine' => 'BooValidationEntreeChaine',
			'nombre' => 'BooValidationEntreeNombre',
			'entier' => 'BooValidationEntreeEntier',
			'date' => 'BooValidationEntreeDate',
			'fichier' => 'BooValidationEntreeFichier',
			'tableau' => 'BooValidationEntreeTableau'
		);
		
		$type = (string) $type;
		
		// traitement
		
		// on regarde si la classe est autorisee
		if (isset($classes[$type])) {
			
			// on deduit le nom de la classe de l'objet a instancier
			$classe = $classes[$type];
			
			// on regarde si la classe existe
			if (class_exists($classe)) {
			
				// $this->messageAjouter(GIBOLIN_RAPPORTS_DETAILS, 'Traitement de la variable ' . $intitule . ' - ' . $classe);
				
				// on instancie l'objet de la classe choisie
				$action = new $classe($methode, $intitule, $longueur, $valeur, $obligatoire);
				
				// on associe l'objet directeur
				$action->directeurAssocier($this);
				
				// on ajoute l'action a la liste des actions
				$this->elementAjouter($action);
				
				$sortie = true;
			
			} else {
			
				// $this->messageAjouter(GIBOLIN_RAPPORTS_ERREURS, 'Classe ' . $classe . ' introuvable');
			
			}
		
		} else {
		
			// $this->messageAjouter(GIBOLIN_RAPPORTS_ERREURS, 'Classe ' . $classe . ' incorrecte');
		
		}
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntree
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntree extends BooActionsAction
{


	/**
	 * methode
	 *
	 * @protected string
	 */
	protected $methode;
	
	
	/**
	 * intitule
	 *
	 * @protected string
	 */
	protected $intitule;
	
	
	/**
	 * longueur
	 *
	 * @protected integer
	 */
	protected $longueur;
	
	
	/**
	 * Valeur
	 *
	 * @protected mixed
	 */
	protected $valeur;
	
	
	/**
	 * obligatoire
	 *
	 * @protected integer
	 */
	protected $obligatoire;
	
	
	/**
	 * existe
	 *
	 * @protected boolean
	 */
	protected $existe;
	
	
	/**
	 * fonction qui associe le methode
	 *
	 * @param string $methode
	 * @return boolean
	 */
	public function methodeAssocier($methode)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->methode = (string) $methode;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui associe l'intitule
	 *
	 * @param string $intitule
	 * @return boolean
	 */
	public function intituleAssocier($intitule)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->intitule = (string) $intitule;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui associe la longueur
	 *
	 * @param integer $longueur
	 * @return boolean
	 */
	public function longueurAssocier($longueur)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->longueur = (integer) $longueur;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui associe la valeur
	 *
	 * @param string $valeur
	 * @return boolean
	 */
	public function valeurAssocier($valeur)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->valeur = (string) $valeur;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui associe l'obligatoire
	 *
	 * @param unknown_type $obligatoire        	
	 * @return boolean
	 */
	public function obligatoireAssocier($obligatoire)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->obligatoire = (string) $obligatoire;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * constructeur
	 *
	 * @param unknown_type $methode
	 * @param unknown_type $intitule
	 * @param unknown_type $longueur
	 * @param unknown_type $valeur
	 * @param unknown_type $obligatoire
	 */
	public function __construct($methode, $intitule, $longueur, $valeur, $obligatoire)
	{
	
		$this->methodeAssocier($methode);
		$this->intituleAssocier($intitule);
		$this->longueurAssocier($longueur);
		$this->valeurAssocier($valeur);
		$this->obligatoireAssocier($obligatoire);
	
	}
	
	
	/**
	 * fonction qui execute le filtre
	 *
	 * @return boolean
	 */
	public function executer()
	{
	
		// initialisation des variables
		$sortie = array();
		$entrees = $this->entree['ENTREES'];
		$avertissements = $this->entree['AVERTISSEMENTS'];
		$erreurs = $this->entree['ERREURS'];
		$variables = $this->entree['DONNEES'];
		$variable = 0;
		
		// traitement
		
		// on regarde si la variable fait partie du tableau des entrees
		if ($this->existe($entrees, $this->intitule)) {
			
			// lecture de l'entrée
			$entree = $entrees[$this->intitule];
			
			// on regarde le contenu de la variable
			$variable = $this->traite($entree);
			
			// on regarde si le contenu est correct
			if ($variable !== false) {
			
				// la variable est enregistree dans le tableau des sorties
				$variables[$this->intitule] = $variable;
			
			} else {
			
				// $this->messageAjouter(GIBOLIN_RAPPORTS_AVERTISSEMENTS, 'Variable ' . $this->intitule . ' incorrecte');
				
				if ($this->obligatoire == '1') {
				
					$avertissements[$this->intitule] = 'invalide';
					$erreurs[$this->intitule] = true;
					$variables[$this->intitule] = $entree;
				
				} else {
				
					// la variable par defaut est enregistree dans le tableau des sortie
					$avertissements[$this->intitule] = 'invalide';
					$variables[$this->intitule] = $this->valeur;
				
				}
			
			}
		
		} else {
		
			// $this->messageAjouter(GIBOLIN_RAPPORTS_AVERTISSEMENTS, 'Variable ' . $this->intitule . ' introuvable');
			
			// on regarde si la variable est obligatoire
			if ($this->obligatoire == '1') {
			
				// la variable est manquante
				$avertissements[$this->intitule] = 'manquant';
				$erreurs[$this->intitule] = true;
				$variables[$this->intitule] = false;
			
			} else {
			
				// la variable par defaut est enregistree dans le tableau des sortie
				$avertissements[$this->intitule] = 'manquant';
				$variables[$this->intitule] = $this->valeur;
			
			}
		
		}
		
		$sortie['ENTREES'] = $entrees;
		$sortie['AVERTISSEMENTS'] = $avertissements;
		$sortie['ERREURS'] = $erreurs;
		$sortie['DONNEES'] = $variables;
		
		$this->sortie = $sortie;
		
		// sortie
		return true;
	
	}
	
	
	/**
	 * fonction qui regarde si la variable existe
	 *
	 * @param array $tablea
	 * @param string $variable
	 * @return boolean
	 */
	public function existe($tableau, $variable)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($tableau[$variable]) && ($tableau[$variable] != '')) {
		
			$sortie = true;
		
		}
		
		$this->existe = $sortie;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui traite
	 *
	 * @param mixed $entree
	 * @return mixed
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $entree;
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntreeChaine
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntreeChaine extends BooValidationEntree
{

	/**
	 * fonction qui traite
	 *
	 * @param mixed $entree
	 * @return string
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = addslashes($entree);
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntreeNombre
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntreeNombre extends BooValidationEntree
{


	/**
	 * fonction qui traite
	 *
	 * @param mixed $entree
	 * @return float
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $entree;
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntreeEntier
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntreeEntier extends BooValidationEntree
{


	/**
	 * fonction qui traite
	 *
	 * @param mixed $entree
	 * @return integer
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = (integer) $entree;
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntreeDate
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntreeDate extends BooValidationEntree
{


	/**
	 * fonction qui traite
	 *
	 * @param string $entree
	 * @return integer
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = datesChaineConvertir($entree);
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntreeFichier
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntreeFichier extends BooValidationEntree
{


	/**
	 * fonction qui traite
	 *
	 * @param miexd $entree
	 * @return integer
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = (string) $entree;
		
		// sortie
		return $sortie;
	
	}


}


/**
 * classe BooValidationEntreeTableau
 *
 * @package Boo\Objets\Validation
 */
class BooValidationEntreeTableau extends BooValidationEntree
{


	/**
	 * fonction qui traite
	 *
	 * @param mixed $entree        	
	 * @return array
	 */
	public function traite($entree)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $entree;
		
		// sortie
		return $sortie;
	
	}


}


?>