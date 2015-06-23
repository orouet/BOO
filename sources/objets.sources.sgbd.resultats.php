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
 * Résultats SGBD
 * @package Boo\Sources\SGBD\Résultats
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooSgbdResultat
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdResultat extends BooObjet
{


	/**
	 * Opération
	 *
	 * @access public
	 * @var mixed
	 */
	public $operation;
	
	
	/**
	 * Constructeur
	 *
	 * @param mixed $operation
	 */
	public function __construct($operation)
	{
	
		$this->operation = $operation;
	
	}


}



/**
 * classe BooSgbdMssqlResultat
 *
 * @package Boo\Sources\SGBD\Résultats
 */
class BooSgbdMssqlResultat extends BooSgbdResultat
{


	/**
	 * Compte le nombre de lignes d'une opération
	 *
	 * @return mixed
	 */
	public function compter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$nombre = sqlsrv_num_rows($this->operation);
		
		if ($nombre) {
		
			$sortie = $nombre;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Lit l'enregistrement courant de l'opération
	 *
	 * @return mixed
	 */
	public function lire()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = sqlsrv_fetch_array($this->operation, SQLSRV_FETCH_ASSOC);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSgbdMysqlResultat
 *
 * @package Boo\Sources\SGBD\Résultats
 */
class BooSgbdMysqlResultat extends BooSgbdResultat
{


	/**
	 * Compte le nombre de lignes d'une opération
	 *
	 * @return mixed
	 */
	public function compter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$nombre = mysqli_num_rows($this->operation);
		
		if ($nombre) {
		
			$sortie = $nombre;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Lit l'enregistrement courant de l'opération
	 *
	 * @return mixed
	 */
	public function lire()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = mysqli_fetch_assoc($this->operation);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSgbdOracleResultat
 *
 * @package Boo\Sources\SGBD\Résultats
 */
class BooSgbdOracleResultat extends BooSgbdResultat
{


	/**
	 * Compte le nombre de lignes d'une opération
	 *
	 * @return mixed
	 */
	public function compter()
	{
	
		// initialisation des variables
		$sortie = false;
		$temp = array();
		$operation = $this->operation;
		
		// traitement
		$sortie = oci_fetch_all($operation, $temp);
		
		unset($temp);
		unset($operation);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Lit l'enregistrement courant de l'opération
	 *
	 * @return mixed
	 */
	public function lire()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = oci_fetch_array($this->operation, OCI_ASSOC + OCI_RETURN_NULLS);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSgbdPDOResultat
 *
 * @package Boo\Sources\SGBD\Résultats
 */
class BooSgbdPDOResultat extends BooSgbdResultat
{


	/**
	 * Compte le nombre de lignes d'une opération
	 *
	 * @return mixed
	 */
	public function compter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $this->operation->rowCount();
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Lit l'enregistrement courant de l'opération
	 *
	 * @return mixed
	 */
	public function lire()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $this->operation->fetch(PDO::FETCH_ASSOC);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSgbdPgsqlResultat
 *
 * @package Boo\Sources\SGBD\Résultats
 */
class BooSgbdPgsqlResultat extends BooSgbdResultat
{


	/**
	 * Compte le nombre de lignes d'une opération
	 *
	 * @return mixed
	 */
	public function compter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$nombre = pg_num_rows($this->operation);
		
		if ($nombre) {
		
			$sortie = $nombre;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Lit l'enregistrement courant de l'opération
	 *
	 * @return mixed
	 */
	public function lire()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = pg_fetch_array($this->operation, null, PGSQL_ASSOC);
		
		// sortie
		return $sortie;
	
	}


}


?>