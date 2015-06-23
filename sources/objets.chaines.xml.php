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
 * Chaines XML
 * @package Boo\Objets\Chaines\XML
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooXmlTexte
 *
 * @package Boo\Objets\Chaines\XML
 */
class BooXmlTexte extends \BooXml
{


	/**
	 * Constructeur de l'objet
	 *
	 */
	public function __construct()
	{
	
		$this->initialiser();
	
	}
	
	
	/**
	 * Initialise l'objet
	 *
	 * @return boolean
	 */
	public function initialiser()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$this->sortie = '';
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère la sortie
	 *
	 * @return mixed
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $this->sortie;
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooXmlBalise
 *
 * @package Boo\Objets\Chaines\XML
 */
class BooXmlBalise extends \BooXml
{


	/**
	 * Tableau contenant les attributs de la balise
	 *
	 * @access protected
	 * @var array
	 */
	protected $attributs = array();
	
	
	/**
	 * Constructeur de l'objet
	 *
	 * @param array $attributs Tableau des attributs 
	 */
	public function __construct($attributs = array())
	{
	
		$this->initialiser();
		$this->attributsAssocier($attributs);
	
	}
	
	
	/**
	 * Associe un attribut
	 *
	 * @access protected
	 * @param string $nom Nom de l'attribut
	 * @param string $contenu Valeur de l'attribut
	 * @return boolean
	 */
	protected function attributAssocier($nom, $contenu)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->attributs[$nom])) {
		
			$this->attributs[$nom] = (string) $contenu;
			$sortie = true;
		
		} else {
		
			$this->attributs[$nom] = (string) $contenu;
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Association des attributs de la balise
	 *
	 * @access protected
	 * @param array $attributs Tableau contenant les attributs
	 * @return boolean
	 */
	protected function attributsAssocier($attributs)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (is_array($attributs)) {
		
			foreach ($attributs as $nom => $contenu) {
			
				$this->attributAssocier($nom, $contenu);
			
			}
			
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoie un attribut
	 *
	 * @access protected
	 * @param string $nom Nom de l'attribut
	 * @return mixed
	 */
	protected function attributDonner($nom)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->attributs[$nom])) {
		
			$contenu = ($this->attributs[$nom]);
			
			$sortie = $contenu;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère le code de l'attribut
	 *
	 * @access protected
	 * @param string $nom Nom de l'attribut
	 * @return string
	 */
	protected function attributGenerer($nom)
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		if (isset($this->attributs[$nom])) {
		
			$contenu = ($this->attributs[$nom]);
			
			if ($contenu != '') {
			
				$sortie = $nom . '="' . $contenu . '"';
			
			}
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Génère les attributs
	 *
	 * @access protected
	 * @return string
	 */
	protected function attributsGenerer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		foreach ($this->attributs as $nom => $valeur) {
		
			if ($sortie != '') {
			
				$sortie .= ' ';
			
			}
			
			$sortie .= $this->attributGenerer($nom);
		
		}
		
		// sortie
		return $sortie;
	
	}


}


?>