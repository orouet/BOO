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
 * Elements XHTML (TAGS)
 * @package BOO\XML\XHTML
 * @author Olivier ROUET
 * @version 1.0.1
 */


/**
 * Classe A
 *
 * @package BOO\XML\XHTML
 */
class A extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
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
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Body
 *
 * @package BOO\XML\XHTML
 */
class Body extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<body ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
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
 * Classe Br
 *
 * @package BOO\XML\XHTML
 */
class Br extends Balise
{


	/**
	 * Génère la sortie
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
 * Classe Div
 *
 * @package BOO\XML\XHTML
 */
class Div extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<div ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Form
 *
 * @package BOO\XML\XHTML
 */
class Form extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
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
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Head
 *
 * @package BOO\XML\XHTML
 */
class Head extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
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
	 * Fermeture
	 *
	 * @access protected
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
	 * Génère la sortie
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
 * Classe Html
 *
 * @package BOO\XML\XHTML
 */
class Html extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<html ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
	 */
	protected function fermeture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$sortie .= '</html>' . "\n";
		
		// sortie
		return $sortie;
	
	}


}



/**
 * Classe Img
 *
 * @package BOO\XML\XHTML
 */
class Img extends Balise
{


	/**
	 * Génère la sortie
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
 * Classe Input
 *
 * @package BOO\XML\XHTML
 */
class Input extends Balise
{


	/**
	 * Génère la sortie
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
 * Classe Label
 *
 * @package BOO\XML\XHTML
 */
class Label extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<label' . $attributs . '>';
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Li
 *
 * @package BOO\XML\XHTML
 */
class Li extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<li ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Link
 *
 * @package BOO\XML\XHTML
 */
class Link extends Balise
{


	/**
	 * Génère la sortie
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
 * Classe Meta
 *
 * @package BOO\XML\XHTML
 */
class Meta extends Balise
{


	/**
	 * Génère la sortie
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
 * Classe Option
 *
 * @package BOO\XML\XHTML
 */
class Option extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<option ' . $attributs . '>';
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe P
 *
 * @package BOO\XML\XHTML
 */
class P extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<p ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Script
 *
 * @package BOO\XML\XHTML
 */
class Script extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
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
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Select
 *
 * @package BOO\XML\XHTML
 */
class Select extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<select ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Span
 *
 * @package BOO\XML\XHTML
 */
class Span extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<span ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Table
 *
 * @package BOO\XML\XHTML
 */
class Table extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<table ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Td
 *
 * @package BOO\XML\XHTML
 */
class Td extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
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
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Textarea
 *
 * @package BOO\XML\XHTML
 */
class Textarea extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
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
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Th
 *
 * @package BOO\XML\XHTML
 */
class Th extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
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
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Title
 *
 * @package BOO\XML\XHTML
 */
class Title extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
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
	 * Fermeture
	 *
	 * @access protected
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
 * Classe Tr
 *
 * @package BOO\XML\XHTML
 */
class Tr extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<tr ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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
 * Classe Ul
 *
 * @package BOO\XML\XHTML
 */
class Ul extends Conteneur
{


	/**
	 * Ouverture
	 *
	 * @access protected
	 * @return string
	 */
	protected function ouverture()
	{
	
		// initialisation des variables
		$sortie = '';
		
		// traitement
		$attributs = $this->attributsGenerer();
		$sortie .= '<ul ' . $attributs . '>' . "\n";
		unset($attributs);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Fermeture
	 *
	 * @access protected
	 * @return string
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