<?PHP

namespace BOO\XML\XHTML;

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
 * XHTML
 * @package BOO\XML\XHTML
 * @author Olivier ROUET
 * @version 1.0.1
 */


/**
 * classe Texte
 *
 * @package BOO\XML\XHTML
 */
class Texte extends \BooXmlTexte
{


	/**
	 * Texte
	 *
	 * @access protected
	 * @var string
	 */
	protected $texte;
	
	
	/**
	 * Constructeur
	 *
	 * @param string $chaine chaine de caracteres a generer
	 */
	public function __construct($chaine = '')
	{
	
		$this->texte = (string) $chaine;
	
	}
	
	
	/**
	 * Génère le texte et le renvoie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie = $this->texte;
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Balise
 *
 * @package BOO\XML\XHTML
 */
class Balise extends \BooXmlBalise
{


	/**
	 * Initialise les variables
	 *
	 * @access protected
	 * @return boolean
	 */
	protected function variablesInitialiser()
	{
	
		// initialisation des variables
		$sortie = false;
		$this->attributs = array();
		
		// traitement
		$sortie = true;
		
		// sortie
		return true;
	
	}
	
	
	/**
	 * Génère le code de l'attribut id
	 *
	 * @access protected
	 * @return string
	 */
	protected function idGenerer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		if ($this->attributDonner('id')) {
		
			$sortie = ' ' . $this->attributGenerer('id');
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère le code html de l'attribut class
	 *
	 * @access protected
	 * @return string
	 */
	protected function classeGenerer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		if ($this->attributDonner('class')) {
		
			$sortie = ' ' . $this->attributGenerer('class');
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère le code html de l'attribut style
	 *
	 * @access protected
	 * @return string
	 */
	protected function styleGenerer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		if ($this->attributDonner('style')) {
		
			$sortie = ' ' . $this->attributGenerer('style');
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère le code html des attributs id, class et style
	 *
	 * @return string
	 */
	protected function cssGenerer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie = $this->idGenerer() . $this->classeGenerer() . $this->styleGenerer();
		
		// sortie
		return $sortie;
	
	}


}



/**
 * Classe Conteneur
 *
 * @package BOO\XML\XHTML
 */
class Conteneur extends Balise
{


	/**
	 * Tableau des contenus (objets)
	 *
	 * @access protected
	 * @var array
	 */
	protected $contenu;
	
	
	/**
	 * Initialise les variables
	 *
	 * @return boolean
	 */
	protected function variablesInitialiser()
	{
	
		// initialisation des variables
		$sortie = false;
		$this->attributs = array();
		$this->contenu = array();
		
		// traitement
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Ajoute un objet au tableau des contenus
	 *
	 * @param BooXml $objet Objet BooXml
	 * @return boolean
	 */
	public function ajouter($objet)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$avant = count($this->contenu);
		$apres = array_push($this->contenu, $objet);
		
		if ($apres > $avant) {
		
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Ouverture de l'élément
	 *
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie = (string) $sortie;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture de l'élément
	 *
	 * @return string
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie = (string) $sortie;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère et renvoie la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= $this->ouverture();
		
		foreach ($this->contenu as $objet) {
		
			$sortie .= $objet->generer();
			unset($objet);
		
		}
		
		$sortie .= $this->fermeture();
		
		// sortie
		return $sortie;
	
	}


}


?>