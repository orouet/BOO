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
 * @package Boo\Objets\Annuaires
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooSgbdAnnuaire
 *
 * @package Boo\Annuaire
 */
class BooSgbdAnnuaire extends BooAnnuaire
{


	//
	private $nom;
	
	
	//
	private $donnees = array();
	
	
	//
	function __construct($nom = 'defaut')
	{
	
		$this->nom = (string) $nom;
	
	}
	
	
	//
	public function nom_donner()
	{
	
		return $this->nom;
	
	}
	
	
	//
	public function ajouter($nom, $objet)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (!isset($this->donnees[$nom])) {
		
			$this->donnees[$nom] = $objet;
			$sortie = $nom;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function ajouterConnexion($source)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// Cr�ation de l'objet connexion
		switch ($source['type']) {
		
			case 'mariadb' :
			case 'mysql' :
				$connexion = new BooSgbdMysql($source['donnees']);
			break;
			
			
			case 'oracle' :
				$connexion = new BooSgbdOracle($source['donnees']);
			break;
			
			
			case 'mssql' :
				$connexion = new BooSgbdMssql($source['donnees']);
			break;
		
		}
		
		// tentative de connexion
		$sortie = $connexion->connecter();
		
		// ajout de la connexion aux sources disponibles
		$this->ajouter($source['code'], $connexion);
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function lire($nom)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if (isset($this->donnees[$nom])) {
		
			$sortie = $this->donnees[$nom];
		
		}
		
		// sortie
		return $sortie;
	
	}


}


?>