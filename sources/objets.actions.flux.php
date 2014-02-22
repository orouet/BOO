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
 * @package Boo\Objets\Actions\Flux
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooOrdonnateur
 *
 * @package Gibolin\Base\Objets
 */
class BooOrdonnateur extends BooFlux {
	
	
	//
	private $file = array();
	
	
	//
	public function processusAjouter($objet) {

		$this->file[] = $objet;
	
	}
	
	
	//
	public function executer() {

		$this->donnees = $this->stdin;
		
		while (list($cle, $processus) = each($this->file)) {
		
			$processus->stdinAssocier($this->donnees);
			$processus->executer();
			$this->donnees = $processus->stdoutDonner();
			
		}
		
		$this->stdout = $this->donnees;
	
	}
	
}


/**
 * classe BooProcessus
 *
 * @package Gibolin\Base\Objets
 */
class BooProcessus extends BooFlux {
	
	
	//
	protected $ordonnateur;
	
	
	//
	public function ordonnateurAssocier(BooOrdonnateur &$ordonnateur) {

		$this->ordonnateur = &$ordonnateur;
	
	}
	
}

?>