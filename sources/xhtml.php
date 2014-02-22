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
 * @package Boo\XHTML
 * @author Olivier ROUET
 * @version 1.0.1
 */


/**
 * classe BooXhtmlConteneur
 *
 * @package Boo\XHTML
 */
class BooXhtmlConteneur extends BooXhtmlBalise {


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
	protected function variablesInitialiser() {

		$this->attributs = array();
		$this->contenu = array();
		$this->sortie = '';
		return true;
	
	}

	
	/**
	 * fonction d'ajout d'un objet
	 *
	 * @param BooXml $objet        	
	 * @return true
	 */
	public function ajouter(BooXml $objet) {

		array_push($this->contenu, $objet);
		
		return true;
	
	}

	
	/**
	 * fonction d'ouverture de l'element
	 *
	 * @return true
	 */
	protected function ouverture() {

		return true;
	
	}

	
	/**
	 * fonction de fermeture de l'element
	 *
	 * @return true
	 */
	protected function fermeture() {

		return true;
	
	}

	
	/**
	 * fonction qui genere et renvoie la sortie
	 *
	 * @return string
	 */
	public function generer() {

		$this->ouverture();
		for($i = 0; $i < sizeof($this->contenu); $i ++) {
			$objet = $this->contenu[$i];
			$this->sortie .= $objet->generer();
		}
		$this->fermeture();
		return $this->sortie;
	
	}
	
}


/**
 * classe BooXhtmlHtml
 *
 * @package Boo\XHTML
 */
class BooXhtmlHtml extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture() {

		$this->sortie .= '<?xml version="1.0" encoding="utf-8"?>' . "\n";
		$this->sortie .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">' . "\n";
		$this->sortie .= '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture() {

		$this->sortie .= '</html>';
		return true;
	
	}
	
}


/**
 * classe BooXhtmlHead
 *
 * @package Boo\XHTML
 */
class BooXhtmlHead extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture() {

		$this->sortie .= '<head>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture() {

		$this->sortie .= '</head>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlBody
 *
 * @package Boo\XHTML
 */
class BooXhtmlBody extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture() {

		$this->sortie .= '<body>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture() {

		$this->sortie .= '</body>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlMeta
 *
 * @package Boo\XHTML
 */
class BooXhtmlMeta extends BooXmlBalise {

	
	/**
	 * fonction qui genere la sortie
	 *
	 * @return string
	 */
	public function generer() {

		$attributs = $this->attributsGenerer();
		$sortie = '<meta ' . $attributs . ' />' . "\n";
		unset($attributs);
		return $sortie;
	
	}
	
}


/**
 * classe BooXhtmlLink
 *
 * @package Boo\XHTML
 */
class BooXhtmlLink extends BooXmlBalise {

	
	/**
	 * fonction qui genere la sortie
	 *
	 * @return string
	 */
	public function generer() {

		$attributs = $this->attributsGenerer();
		$sortie = '<link ' . $attributs . ' />' . "\n";
		unset($attributs);
		return $sortie;
	
	}
	
}


/**
 * classe BooXhtmlScript
 *
 * @package Boo\XHTML
 */
class BooXhtmlScript extends BooXhtmlConteneur {

	
	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<script ' . $attributs . '>' . "\n";
		unset($attributs);
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</script>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlTitle
 *
 * @package Boo\XHTML
 */
class BooXhtmlTitle extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture() {

		$this->sortie .= '<title>';
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return string
	 */
	protected function fermeture() {

		$this->sortie .= '</title>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlImg
 *
 * @package Boo\XHTML
 */
class BooXhtmlImg extends BooXhtmlBalise {


	/**
	 * fonction qui genere la sortie
	 *
	 * @return string
	 */
	public function generer() {

		$attributs = $this->attributsGenerer();
		$sortie = '<img ' . $attributs . ' />' . "\n";
		unset($attributs);
		return $sortie;
	
	}
	
}


/**
 * classe BooXhtmlInput
 *
 * @package Boo\XHTML
 */
class BooXhtmlInput extends BooXhtmlBalise {


	/**
	 * fonction qui genere la sortie
	 *
	 * @return string
	 */
	public function generer() {

		$attributs = $this->attributsGenerer();
		$sortie = '<input ' . $attributs . ' />' . "\n";
		unset($attributs);
		return $sortie;
	
	}
	
}


/**
 * classe BooXhtmlTextarea
 *
 * @package Boo\XHTML
 */
class BooXhtmlTextarea extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<textarea ' . $attributs . '>';
		unset($attributs);
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</textarea>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlDiv
 *
 * @package Boo\XHTML
 */
class BooXhtmlDiv extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<div' . $css . '>' . "\n";
		return true;
	
	}
	

	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</div>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlLabel
 *
 * @package Boo\XHTML
 */
class BooXhtmlLabel extends BooXhtmlConteneur {

	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<label' . $attributs . '>';
		return true;
	
	}
	

	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</label>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlSpan
 *
 * @package Boo\XHTML
 */
class BooXhtmlSpan extends BooXhtmlConteneur {

	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<span' . $css . '>';
		return true;
	
	}
	

	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</span>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlP
 *
 * @package Boo\XHTML
 */
class BooXhtmlP extends BooXhtmlConteneur {


	/**
	 * fonction qui genere le code d'ouverture du conteneur
	 *
	 * @return true
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<p' . $css . '>' . "\n";
		return true;
	
	}

	
	/**
	 * fonction qui genere le code de fermeture du conteneur
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</p>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlA
 *
 * @package Boo\XHTML
 */
class BooXhtmlA extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<a ' . $attributs . '>' . "\n";
		unset($attributs);
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</a>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlTable
 *
 * @package Boo\XHTML
 */
class BooXhtmlTable extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<table' . $css . '>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</table>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlTr
 *
 * @package Boo\XHTML
 */
class BooXhtmlTr extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<tr' . $css . '>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</tr>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlTd
 *
 * @package Boo\XHTML
 */
class BooXhtmlTd extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<td ' . $attributs . '>' . "\n";
		unset($attributs);
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</td>' . "\n";
		;
		return true;
	
	}
	
}


/**
 * classe BooXhtmlForm
 *
 * @package Boo\XHTML
 */
class BooXhtmlForm extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<form ' . $attributs . '>' . "\n";
		unset($attributs);
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</form>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlUl
 *
 * @package Boo\XHTML
 */
class BooXhtmlUl extends BooXhtmlConteneur {


	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<ul' . $css . '>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</ul>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlLi
 *
 * @package Boo\XHTML
 */
class BooXhtmlLi extends BooXhtmlConteneur {

	
	/**
	 * ouverture
	 *
	 * @return string
	 */
	protected function ouverture() {

		$css = $this->cssGenerer();
		$this->sortie .= '<li' . $css . '>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</li>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlSelect
 *
 * @package Boo\XHTML
 */
class BooXhtmlSelect extends BooXhtmlConteneur {

	
	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<select ' . $attributs . '>' . "\n";
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</select>' . "\n";
		return true;
	
	}
	
}


/**
 * classe BooXhtmlOption
 *
 * @package Boo\XHTML
 */
class BooXhtmlOption extends BooXhtmlConteneur {

	
	/**
	 * ouverture
	 *
	 * @return true
	 */
	protected function ouverture() {

		$attributs = $this->attributsGenerer();
		$this->sortie .= '<option ' . $attributs . '>';
		return true;
	
	}

	
	/**
	 * fermeture
	 *
	 * @return true
	 */
	protected function fermeture() {

		$this->sortie .= '</option>' . "\n";
		return true;
	
	}
	
}

?>