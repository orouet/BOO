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
 * @package Boo\Objets\Actions
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooFlux
 *
 * @package Gibolin\Objets\Actions
 */
class BooFlux extends BooAction {
	
	
	//
	protected $donnees;
	
	
	//
	protected $stderr;
	
	
	//
	protected $stdin;
	
	
	//
	protected $stdout;
	
	
	//
	public function executer() {

		$this->stdout = $this->stdin;
	
	}
	
	
	//
	public function stderrDonner() {

		return $this->stderr;
	
	}
	
	
	//
	public function stdinAssocier($variable) {

		$this->stdin = $variable;
	
	}
	
	
	//
	public function stdoutDonner() {

		return $this->stdout;
	
	}
	
}


/**
 * classe BooPileDirecteur
 *
 * @package Gibolin\Objets\Actions
 */
class BooPileDirecteur extends BooAction {


	/**
	 * Tableau contenant la pile des elements
	 *
	 * @var array
	 */
	protected $pile;

	
	/**
	 * Donnees a traiter
	 *
	 * @var array
	 */
	protected $donnees;

	
	/**
	 * Constructeur
	 */
	public function __construct() {

		$this->pileInitialiser();
	
	}

	
	/**
	 * Fonction d'association du tableau de donnees
	 *
	 * @param array $donnees
	 *        	Tableau contenant les donnees a traiter
	 */
	public function donneesAssocier($donnees) {

		if (is_array($donnees)) {
			$this->donnees = $donnees;
		} else {
			$this->donnees = array();
		}
		
		return true;
	
	}

	
	/**
	 * Renvoie les donnees traitees
	 *
	 * @return array Donnees
	 */
	public function donneesDonner() {

		return $this->donnees;
	
	}

	
	/**
	 * Fonction d'initialisation de la pile
	 */
	public function pileInitialiser() {

		$this->pile = array();
		
		return true;
	
	}

	
	/**
	 * Fonction d'ajout d'un element a la pile
	 *
	 * @param boo_pile_element $element
	 *        	element
	 */
	public function elementAjouter(BooPileElement $element) {

		array_push($this->pile, $element);
		
		return true;
	
	}

	
	/**
	 * Execute les actions de la liste
	 *
	 * @return true
	 */
	public function executer() {
		
		// on parcours la liste des actions
		while ( $element = array_shift($this->pile) ) {
			
			// on envoie les donnees a l'action
			$element->stdin = $this->donnees;
			// on execute l'action
			$element->executer();
			// on recupere les donnees renvoyees par l'action
			$this->donneesAssocier($element->stdout);
			
		}
		
		return true;
	
	}
	
}


/**
 * Classe BooPileElement
 *
 * @package Gibolin\Objets\Actions
 */
class BooPileElement extends BooAction {


	/**
	 * Objet directeur
	 *
	 * @var BooActionsDirecteurs
	 */
	protected $directeur;

	
	/**
	 * Fonction d'association par reference au directeur
	 *
	 * @param BooActionsDirecteurs $directeur
	 *        	Directeur
	 */
	public function directeurAssocier(& $directeur) {

		$this->directeur = $directeur;
		return true;
	
	}

	
	/**
	 * Fonction d'ajout d'un element a la pile
	 *
	 * @param BooPileElement $element
	 *        	element
	 */
	public function elementAjouter(BooPileElement $element) {
		// initialisation des variables
		$sortie = false;
		// traitement
		$sortie = $this->directeur->elementAjouter($element);
		// sortie
		return $sortie;
	
	}

	
	/**
	 * Execute l'element
	 *
	 * @return true
	 */
	public function executer() {
		// traitement
		$this->stdout = $this->stdin;
		// sortie
		return true;
	
	}
	
}


?>