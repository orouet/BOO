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
 * @package Boo\Objets\Actions
 */
class BooFlux extends BooAction
{


	/**
	 * Donnees
	 *
	 * @protected mixed
	 */
	protected $donnees;
	
	
	/**
	 * Erreur Standard
	 *
	 * @protected mixed
	 */
	protected $stderr;
	
	
	/**
	 * Entree Standard
	 *
	 * @protected mixed
	 */
	protected $stdin;
	
	
	/**
	 * Sortie Standard
	 *
	 * @protected mixed
	 */
	protected $stdout;
	
	
	/**
	 * Execute l'action
	 *
	 * @return boolean
	 */
	public function executer()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->stdout = $this->stdin;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie l'erreur standard
	 *
	 * @return mixed
	 */
	public function stderrDonner()
	{
	
		// sortie
		return $this->stderr;
	
	}
	
	
	/**
	 * Renvoie l'entrée standard
	 *
	 * @return mixed
	 */
	public function stdinAssocier($variable)
	{
	
		// sortie
		$this->stdin = $variable;
	
	}
	
	
	/**
	 * Renvoie la sortie standard
	 *
	 * @return mixed
	 */
	public function stdoutDonner()
	{
	
		// sortie
		return $this->stdout;
	
	}


}


/**
 * classe BooPileDirecteur
 *
 * @package Boo\Objets\Actions
 */
class BooPileDirecteur extends BooAction
{


	/**
	 * Tableau contenant la pile des elements
	 *
	 * @protected array
	 */
	protected $pile;
	
	
	/**
	 * Donnees a traiter
	 *
	 * @protected mixed
	 */
	protected $donnees;
	
	
	/**
	 * Constructeur
	 *
	 */
	public function __construct()
	{
	
		$this->pileInitialiser();
	
	}
	
	
	/**
	 * Fonction d'association du tableau de donnees
	 *
	 * @param array $donnees Tableau contenant les donnees a traiter
	 * @return boolean
	 */
	public function donneesAssocier($donnees)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (is_array($donnees)) {
		
			$this->donnees = $donnees;
		
		} else {
		
			$this->donnees = array();
		
		}
		
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie les donnees traitees
	 *
	 * @return mixed Donnees
	 */
	public function donneesDonner()
	{
	
		// sortie
		return $this->donnees;
	
	}
	
	
	/**
	 * Fonction d'initialisation de la pile
	 *
	 * @return boolean
	 */
	public function pileInitialiser()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->pile = array();
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fonction d'ajout d'un element a la pile
	 *
	 * @param boo_pile_element $element
	 * @return boolean
	 */
	public function elementAjouter(BooPileElement $element)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		array_push($this->pile, $element);
		$sortie = true;
		
		// sortie
		return true;
	
	}
	
	
	/**
	 * Execute les actions de la liste
	 *
	 * @return boolean
	 */
	public function executer()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		// on parcours la liste des actions
		while ($element = array_shift($this->pile)) {
		
			// on envoie les donnees a l'action
			$element->stdin = $this->donnees;
			
			// on execute l'action
			$element->executer();
			
			// on recupere les donnees renvoyees par l'action
			$this->donneesAssocier($element->stdout);
		
		}
		
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}


}


/**
 * Classe BooPileElement
 *
 * @package Gibolin\Objets\Actions
 */
class BooPileElement extends BooAction
{


	/**
	 * Objet directeur
	 *
	 * @protected BooPileDirecteur
	 */
	protected $directeur;
	
	
	/**
	 * Fonction d'association par reference au directeur
	 *
	 * @param BooPileDirecteur $directeur
	 */
	public function directeurAssocier(& $directeur)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->directeur = $directeur;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fonction d'ajout d'un element a la pile
	 *
	 * @param BooPileElement $element
	 */
	public function elementAjouter(BooPileElement $element)
	{
	
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
	 * @return boolean
	 */
	public function executer()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->stdout = $this->stdin;
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}


}


?>