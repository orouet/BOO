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
 *
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
	 * texte a generer
	 *
	 * @var string
	 */
	private $texte;
	
	
	/**
	 * constructeur
	 *
	 * @param string $chaine
	 *        	chaine de caracteres a generer
	 */
	public function __construct($chaine = '')
	{
	
		$this->texte = (string) $chaine;
	
	}
	
	
	/**
	 * fonction qui genere le texte et le renvoie
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
	 * fonction qui initialise les variables
	 *
	 * @return true
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
	 * fonction qui genere le code html de l'attribut id
	 *
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
	 * fonction qui genere le code html de l'attribut class
	 *
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
	 * fonction qui genere le code html de l'attribut style
	 *
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
	 * fonction qui genere le code html des attributs id, class et style
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
 * classe Conteneur
 *
 * @package BOO\XML\XHTML
 */
class Conteneur extends Balise
{


	/**
	 * contenu
	 *
	 * @var array
	 */
	protected $contenu;
	
	
	/**
	 * fonction qui initialise les variables
	 *
	 * @return true
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
	 * fonction d'ajout d'un objet
	 *
	 * @param BooXml $objet        	
	 * @return true
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
	 * fonction d'ouverture de l'element
	 *
	 * @return true
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
	 * fonction de fermeture de l'element
	 *
	 * @return true
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
	 * fonction qui génère et renvoie la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
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



/**
 * classe A
 *
 * @package BOO\XML\XHTML
 */
class A extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<a ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</a>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Body
 *
 * @package BOO\XML\XHTML
 */
class Body extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '<body>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</body>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Br
 *
 * @package BOO\XML\XHTML
 */
class Br extends Balise
{


	/**
	 * fonction qui génère la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie = '<br ' . $attributs . ' />' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Div
 *
 * @package BOO\XML\XHTML
 */
class Div extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<div' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</div>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Form
 *
 * @package BOO\XML\XHTML
 */
class Form extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<form ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</form>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Head
 *
 * @package BOO\XML\XHTML
 */
class Head extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '<head>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</head>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Hr
 *
 * @package BOO\XML\XHTML
 */
class Hr extends Balise
{


	/**
	 * fonction qui génère la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie = '<hr ' . $attributs . ' />' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Html
 *
 * @package BOO\XML\XHTML
 */
class Html extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '<?xml version="1.0" encoding="utf-8"?>' . "\n";
		$sortie .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">' . "\n";
		$sortie .= '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</html>';
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Img
 *
 * @package BOO\XML\XHTML
 */
class Img extends Balise
{


	/**
	 * fonction qui génère la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie = '<img ' . $attributs . ' />' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Input
 *
 * @package BOO\XML\XHTML
 */
class Input extends Balise
{


	/**
	 * fonction qui génère la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie = '<input ' . $attributs . ' />' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Label
 *
 * @package BOO\XML\XHTML
 */
class Label extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<label' . $attributs . '>';
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</label>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Li
 *
 * @package BOO\XML\XHTML
 */
class Li extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<li' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</li>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Link
 *
 * @package BOO\XML\XHTML
 */
class Link extends Balise
{


	/**
	 * fonction qui génère la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie = '<link ' . $attributs . ' />' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Meta
 *
 * @package BOO\XML\XHTML
 */
class Meta extends Balise
{


	/**
	 * fonction qui génère la sortie
	 *
	 * @return string
	 */
	public function generer()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie = '<meta ' . $attributs . ' />' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Option
 *
 * @package BOO\XML\XHTML
 */
class Option extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<option ' . $attributs . '>';
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</option>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe P
 *
 * @package BOO\XML\XHTML
 */
class P extends Conteneur
{


	/**
	 * fonction qui génère le code d'ouverture du conteneur
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<p' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fonction qui génère le code de fermeture du conteneur
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</p>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Script
 *
 * @package BOO\XML\XHTML
 */
class Script extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<script ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</script>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Select
 *
 * @package BOO\XML\XHTML
 */
class Select extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<select ' . $attributs . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</select>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Span
 *
 * @package BOO\XML\XHTML
 */
class Span extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<span' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</span>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Table
 *
 * @package BOO\XML\XHTML
 */
class Table extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<table' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</table>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Td
 *
 * @package BOO\XML\XHTML
 */
class Td extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<td ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</td>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Textarea
 *
 * @package BOO\XML\XHTML
 */
class Textarea extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<textarea ' . $attributs . '>';
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</textarea>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Th
 *
 * @package BOO\XML\XHTML
 */
class Th extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<th ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</th>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Title
 *
 * @package BOO\XML\XHTML
 */
class Title extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '<title>';
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</title>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Tr
 *
 * @package BOO\XML\XHTML
 */
class Tr extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<tr' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</tr>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe Ul
 *
 * @package BOO\XML\XHTML
 */
class Ul extends Conteneur
{


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$css = $this->cssGenerer();
		$sortie .= '<ul' . $css . '>' . "\n";
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</ul>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}


?>