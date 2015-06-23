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
 * SGBD
 * @package Boo\Sources\SGBD
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooSgbdMssql
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdMssql extends BooSgbd
{


	/**
	 * Etablit un lien avec le SGBD
	 *
	 * @return boolean
	 */
	public function connecter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->parametres['persistance'] == 'oui') {
		
			$lien = sqlsrv_connect($this->parametres['hote'], $this->parametres['informations']);
		
		} else {
		
			$lien = sqlsrv_connect($this->parametres['hote'], $this->parametres['informations']);
		
		}
		
		if ($lien === false) {
		
			$erreurs = sqlsrv_errors();
			// var_dump($erreur);
			$message = '<h1>Erreur de connexion MSSQL</h1>' . "\n";
			
			foreach($erreurs as $erreur) {
			
				$message .= '<p>' . "\n";
				$message .= '<p>CODE=' . $erreur['code'] . '</p>' . "\n";
				$message .= '<p>MESSAGE=' . $erreur['message'] . '</p>' . "\n";
				$message .= '</p>' . "\n";
			
			}
			
			var_dump($message);
			
			$this->messages[] = array('erreur', $message);
			
			$this->lien = false;
			$this->etat = 0;
		
		} else {
		
			$this->lien = $lien;
			$this->etat = 1;
			
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoi l'ID de la dernière insertion
	 *
	 * @return mixed
	 */
	public function dernier()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = mysqli_insert_id($this->lien);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Exécute une requète
	 *
	 * @param string $requete Requète
	 * @return mixed
	 */
	public function executer($requete)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
		
			if ($operation = sqlsrv_query($this->lien, $requete)) {
			
				$resultat = new BooSgbdMssqlResultat($operation);
				$this->operation = $operation;
				$sortie = $resultat;
			
			} else {
			
				$erreurs = sqlsrv_errors();
				$message = '';
				$message .= '<h1>Erreur MS SQL</h1>';
				$message .= '<p>' . $requete . '</p>';
				
				foreach ($erreurs as $erreur) {
				
					$message .= '<p>code=' . $erreur['code'] . ', message=' . $erreur['message'] . '</p>';
				
				}
				
				var_dump($message);
			
			}
		
		} else {
		
			var_dump("Liaison interrompue");
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	


}



/**
 * classe BooSgbdMysql
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdMysql extends BooSgbd
{


	/**
	 * Etablit un lien avec le SGBD
	 *
	 * @return boolean
	 */
	public function connecter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->parametres['persistance'] == 'oui') {
		
			$lien = mysqli_connect(
				'p:' . $this->parametres['hote'],
				$this->parametres['identifiant'],
				$this->parametres['motdepasse'],
				$this->parametres['base']
			);
		
		} else {
		
			$lien = mysqli_connect(
				$this->parametres['hote'],
				$this->parametres['identifiant'],
				$this->parametres['motdepasse'],
				$this->parametres['base']
			);
		
		}
		
		if ($lien === false) {
		
			$erreur = [
				'code' => mysqli_connect_errno(),
				'message' => mysqli_connect_error()
			];
			$message = '<h1>Erreur de connexion MYSQL</h1>' . "\n";
			$message .= '<p>CODE=' . $erreur['code'] . '</p>' . "\n";
			$message .= '<p>MESSAGE=' . $erreur['message'] . '</p>' . "\n";
			var_dump($message);
			
			$this->messages[] = array('erreur', $message);
			
			$this->lien = false;
			$this->etat = 0;
		
		} else {
		
			mysqli_set_charset($lien, 'utf8');
			
			$this->lien = $lien;
			$this->etat = 1;
			
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoi l'ID de la dernière insertion
	 *
	 * @return mixed
	 */
	public function dernier()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = mysqli_insert_id($this->lien);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Exécute une requète
	 *
	 * @param string $requete Requète
	 * @return mixed
	 */
	public function executer($requete)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
		
			$operation = mysqli_query($this->lien, $requete);
			
			if ($operation !== false) {
			
				$resultat = new BooSgbdMysqlResultat($operation);
				$this->operation = $operation;
				$sortie = $resultat;
			
			} else {
			
				$erreur = mysqli_error($this->lien);
				// var_dump($erreur);
				
				$message = '';
				$message .= '<h1>Erreur MySQL</h1>';
				$message .= '<p>' . $requete . '</p>';
				$message .= '<p>ERREUR=' . $erreur . '</p>';
				var_dump($message);
			
			}
		
		} else {
		
			var_dump("Liaison interrompue");
		
		}
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSgbdOracle
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdOracle extends BooSgbd
{


	/**
	 * Etablit un lien avec le SGBD
	 *
	 * @return boolean
	 */
	public function connecter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->parametres['persistance'] == 'oui') {
		
			$lien = oci_pconnect(
				$this->parametres['identifiant'],
				$this->parametres['motdepasse'],
				$this->parametres['hote'],
				$this->parametres['encodage']
			);
		
		} else {
		
			$lien = oci_connect(
				$this->parametres['identifiant'],
				$this->parametres['motdepasse'],
				$this->parametres['hote'],
				$this->parametres['encodage']
			);
		
		}
		
		if ($lien === false) {
		
			$erreur = oci_error();
			// var_dump($erreur);
			
			$message = '<h1>Erreur de connexion ORACLE</h1>' . "\n";
			$message .= '<p>CODE=' . $erreur['code'] . '</p>' . "\n";
			$message .= '<p>MESSAGE=' . $erreur['message'] . '</p>' . "\n";
			$message .= '<p>OFFSET=' . $erreur['offset'] . '</p>' . "\n";
			$message .= '<p>SQLTEXT=' . $erreur['sqltext'] . '</p>' . "\n";
			var_dump($message);
			
			$this->messages[] = array('erreur', $message);
			
			$this->lien = false;
			$this->etat = 0;
		
		} else {
		
			$this->lien = $lien;
			$this->etat = 1;
			
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoi l'ID de la dernière insertion
	 *
	 * @return mixed
	 */
	public function dernier()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = mysqli_insert_id($this->lien);
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Exécute une requète
	 *
	 * @param string $requete Requète
	 * @return mixed
	 */
	public function executer($requete)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
		
			$operation = oci_parse($this->lien, $requete);
			
			if (oci_execute($operation)) {
			
				$resultat = new BooSgbdOracleResultat($operation);
				$this->operation = $operation;
				$sortie = $resultat;
			
			} else {
			
				$erreur = oci_error($operation);
				// var_dump($erreur);
				
				$position = ($erreur['offset'] - 1);
				$avant = substr($erreur['sqltext'], 0, $position);
				$apres = substr($erreur['sqltext'], $position);
				
				$message = '';
				$message .= '<h1>Erreur ORACLE</h1>';
				$message .= '<p>' . $requete . '</p>';
				$message .= '<p>CODE=' . $erreur['code'] . '</p>';
				$message .= '<p>MESSAGE=' . $erreur['message'] . '</p>';
				$message .= '<p>OFFSET=' . $erreur['offset'] . '</p>';
				$message .= '<p>' . $avant . '<span style="color:red;">' . $apres . '</span></p>';
				var_dump($message);
			
			}
		
		} else {
		
			var_dump("Liaison interrompue");
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Pagine une requète
	 *
	 * @param string $requete Requète SQL
	 * @param string $debut Numéro du premier enregistrement
	 * @param string $pas Nombre d'enregistrements
	 * @return mixed
	 */
	public function requetePaginer($requete, $debut, $pas)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = "
			SELECT
				*
			FROM
				(
					SELECT
						ROWNUM R,
						pow_pb.*
					FROM
						(" . $requete . ") pow_pb
					WHERE
						ROWNUM <= " . ($debut + $pas) . "
				) pow_pc
			WHERE
				R > " . $debut . "
		";
		// var_dump($sortie);
		
		// sortie
		return $sortie;
	
	}


}



/**
 * classe BooSgbdPDO
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdPDO extends BooSgbd
{


	/**
	 * Etablit un lien avec le SGBD
	 *
	 * @return boolean
	 */
	public function connecter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->parametres['persistance'] == 'oui') {
		
			
		
		} else {
		
			
		
		}
		
		$type = $this->parametres['type'];
		$hote = 'host=' . $this->parametres['hote'];
		$base = 'dbname=' . $this->parametres['base'];
		$dsn = $type . ':' . $hote . ';' . $base;
		
		$user = $this->parametres['identifiant'];
		$password = $this->parametres['motdepasse'];
		
		try {
		
			$lien = new PDO($dsn, $user, $password);
		
		} catch (PDOException $e) {
		
			die('Connection failed: ' . $e->getMessage());
		
		}
		
		if ($lien === false) {
		
			$erreurs = array();
			// var_dump($erreur);
			$message = '<h1>Erreur de connexion MSSQL</h1>' . "\n";
			
			foreach($erreurs as $erreur) {
			
				$message .= '<p>' . "\n";
				$message .= '<p>CODE=' . $erreur['code'] . '</p>' . "\n";
				$message .= '<p>MESSAGE=' . $erreur['message'] . '</p>' . "\n";
				$message .= '</p>' . "\n";
			
			}
			
			var_dump($message);
			
			$this->messages[] = array('erreur', $message);
			
			$this->lien = false;
			$this->etat = 0;
		
		} else {
		
			$this->lien = $lien;
			$this->etat = 1;
			
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoi l'ID de la dernière insertion
	 *
	 * @return mixed
	 */
	public function dernier()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = $this->lien->lastInsertId();
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Exécute une requète
	 *
	 * @param string $requete Requète
	 * @return mixed
	 */
	public function executer($requete)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
		
			if ($operation = $this->lien->query($requete)) {
			
				$resultat = new BooSgbdPDOResultat($operation);
				$this->operation = $operation;
				$sortie = $resultat;
			
			} else {
			
				$erreurs = sqlsrv_errors();
				$message = '';
				$message .= '<h1>Erreur MS SQL</h1>';
				$message .= '<p>' . $requete . '</p>';
				
				foreach ($erreurs as $erreur) {
				
					$message .= '<p>code=' . $erreur['code'] . ', message=' . $erreur['message'] . '</p>';
				
				}
				
				var_dump($message);
			
			}
		
		} else {
		
			var_dump("Liaison interrompue");
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	


}



/**
 * classe BooSgbdPgsql
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdPgsql extends BooSgbd
{


	/**
	 * Etablit un lien avec le SGBD
	 *
	 * @return boolean
	 */
	public function connecter()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$chaine = '';
		$chaine .= 'host=' . $this->parametres['hote'];
		$chaine .= ' ';
		$chaine .= 'port=' . $this->parametres['port'];
		$chaine .= ' ';
		$chaine .= 'dbname=' . $this->parametres['base'];
		$chaine .= ' ';
		$chaine .= 'user=' . $this->parametres['identifiant'];
		$chaine .= ' ';
		$chaine .= 'password=' . $this->parametres['motdepasse'];
		
		if ($this->parametres['persistance'] == 'oui') {
		
			$lien = pg_pconnect($chaine);
		
		} else {
		
			$lien = pg_connect($chaine);
		
		}
		
		if ($lien === false) {
		
			$message = 'Erreur de connexion POSTGRESQL';
			var_dump($message);
			
			$this->messages[] = array('erreur', $message);
			
			$this->lien = false;
			$this->etat = 0;
		
		} else {
		
			$this->lien = $lien;
			$this->etat = 1;
			
			$sortie = true;
		
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Renvoi l'ID de la dernière insertion
	 *
	 * @return mixed
	 */
	public function dernier()
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		$sortie = mysqli_insert_id($this->lien);
	
		// sortie
		return $sortie;
	
	}
	
	
	/**
	 * Exécute une requète
	 *
	 * @param string $requete Requète
	 * @return mixed
	 */
	public function executer($requete)
	{
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
		
			$operation = pg_query($this->lien, $requete);
			
			if ($operation) {
			
				$resultat = new BooSgbdPgsqlResultat($operation);
				$this->operation = $operation;
				$sortie = $resultat;
			
			} else {
			
				$erreur = pg_last_error($operation);
				// var_dump($erreur);
				
				$message = '';
				$message .= '<h1>Erreur PostgreSQL</h1>';
				$message .= '<p>' . $requete . '</p>';
				$message .= '<p>' . $erreur . '</p>';
				var_dump($message);
			
			}
		
		} else {
		
			var_dump("Liaison interrompue");
		
		}
		
		// sortie
		return $sortie;
	
	}


}


?>