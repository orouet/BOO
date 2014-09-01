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
 * @package Boo\Objets\Chaines\XML
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooXmlTexte
 *
 * @package Boo\Objets\Chaines\XML
 */
class BooXmlTexte extends BooXml
{


	/**
	 * constructeur de l'objet
	 */
	public function __construct()
	{
	
		$this->initialiser();
	
	}
	
	
	/**
	 * fonction qui initialise l'objet
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
	 * fonction qui genere la sortie
	 *
	 * @return mixed
	 */
	function generer()
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
class BooXmlBalise extends BooXml
{


	/**
	 * tableau contenant les attributs de la balise
	 *
	 * @protected array
	 */
	protected $attributs = array();
	
	
	/**
	 * constructeur de l'objet
	 */
	public function __construct($attributs)
	{
	
		$this->initialiser();
		$this->attributsAssocier($attributs);
	
	}
	
	
	/**
	 * fonction qui associe un attribut
	 *
	 * @param string $nom
	 * @param string $contenu
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
	 * fonction d'association des attributs de la balise
	 *
	 * @param array $attributs Tableau contenant les attributs
	 * @return bool
	 */
	protected function attributsAssocier(array $attributs)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		foreach ($attributs as $nom => $contenu) {
		
			$this->attributAssocier($nom, $contenu);
		
		}
		
		$sortie = true;
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui renvoie un attribut
	 *
	 * @param string $nom
	 * @return mixed
	 */
	protected function attributDonner($nom)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->attributs[$nom])) {
		
			$sortie = $this->attributs[$nom];
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui genere l'attribut
	 *
	 * @param string $nom
	 * @return mixed
	 */
	protected function attributGenerer($nom)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->attributs[$nom])) {
		
			$sortie = $nom . '="' . $this->attributs[$nom] . '"';
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui genere les attributs
	 *
	 * @return mixed
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
		
			if ($valeur != '') {
			
				$sortie .= $nom . '="' . $valeur . '"';
			
			}
		
		}
		
		// sortie
		return $sortie;
	
	}


}


?>