<?PHP

/*

Copyright Olivier ROUET, 23/09/2012 

olivier.rouet@gmail.com

Ce logiciel est un programme informatique servant � fournir une biblioth�que
d'objets PHP.

Ce logiciel est r�gi par la licence CeCILL-C soumise au droit fran�ais et
respectant les principes de diffusion des logiciels libres. Vous pouvez
utiliser, modifier et/ou redistribuer ce programme sous les conditions
de la licence CeCILL-C telle que diffus�e par le CEA, le CNRS et l'INRIA 
sur le site "http://www.cecill.info".

En contrepartie de l'accessibilit� au code source et des droits de copie,
de modification et de redistribution accord�s par cette licence, il n'est
offert aux utilisateurs qu'une garantie limit�e.  Pour les m�mes raisons,
seule une responsabilit� restreinte p�se sur l'auteur du programme,  le
titulaire des droits patrimoniaux et les conc�dants successifs.

A cet �gard  l'attention de l'utilisateur est attir�e sur les risques
associ�s au chargement,  � l'utilisation,  � la modification et/ou au
d�veloppement et � la reproduction du logiciel par l'utilisateur �tant 
donn� sa sp�cificit� de logiciel libre, qui peut le rendre complexe � 
manipuler et qui le r�serve donc � des d�veloppeurs et des professionnels
avertis poss�dant  des  connaissances  informatiques approfondies.  Les
utilisateurs sont donc invit�s � charger  et  tester  l'ad�quation  du
logiciel � leurs besoins dans des conditions permettant d'assurer la
s�curit� de leurs syst�mes et ou de leurs donn�es et, plus g�n�ralement, 
� l'utiliser et l'exploiter dans les m�mes conditions de s�curit�. 

Le fait que vous puissiez acc�der � cet en-t�te signifie que vous avez 
pris connaissance de la licence CeCILL-C, et que vous en avez accept� les
termes.

*/


/**
 *
 * @package Boo\Objets\Chaines\XML\Balises
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooXhtmlBalise
 *
 * @package Boo\Objets\Chaines\XML\Balises
 */
class BooXhtmlBalise extends BooXmlBalise {


	/**
	 * sortie
	 *
	 * @var string
	 */
	protected $sortie;
	
	
	/**
	 * fonction qui initialise les variables
	 *
	 * @return true
	 */
	protected function variablesInitialiser() {

		$this->attributs = array();
		$this->sortie = '';
		return true;
	
	}

	
	
	/**
	 * fonction qui genere le code html de l'attribut id
	 *
	 * @return string
	 */
	protected function idGenerer() {

		$sortie = '';
		if ($this->attributDonner('id')) {
			$sortie = ' ' . $this->attributGenerer('id');
		}
		return $sortie;
	
	}

	
	/**
	 * fonction qui genere le code html de l'attribut class
	 *
	 * @return string
	 */
	protected function classeGenerer() {

		$sortie = '';
		if ($this->attributDonner('class')) {
			$sortie = ' ' . $this->attributGenerer('class');
		}
		return $sortie;
	
	}

	
	/**
	 * fonction qui genere le code html de l'attribut style
	 *
	 * @return string
	 */
	protected function styleGenerer() {

		$sortie = '';
		if ($this->attributDonner('style')) {
			$sortie = ' ' . $this->attributGenerer('style');
		}
		return $sortie;
	
	}

	
	/**
	 * fonction qui genere le code html des attributs id, class et style
	 *
	 * @return string
	 */
	protected function cssGenerer() {

		$sortie = $this->idGenerer() . $this->classeGenerer() . $this->styleGenerer();
		return $sortie;
	
	}
	
}


?>