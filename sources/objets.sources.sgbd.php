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
 * @package Boo\Sources\SGBD
 * @author Olivier ROUET
 * @version 1.0.0
 */


/**
 * classe BooSgbdMssql
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdMssql extends BooSgbd {


	/**
	 * Compte le nombre de lignes d'une opération
	 */
	public function compter($operation) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$nombre = sqlsrv_num_rows($operation);
		if ($nombre) {
			$sortie = $nombre;
		}
		
		// sortie
		return $sortie;
	
	}
	
	//
	public function connecter() {
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->parametres['persistance'] == 'oui') {
			$lien = sqlsrv_connect($this->parametres['hote'], $this->parametres['informations']);
		} else {
			$lien = sqlsrv_connect($this->parametres['hote'], $this->parametres['informations']);
		}
		if ($lien === false) {
			$erreur = sqlsrv_errors();
			$message = 'Erreur de connexion : code=' . $erreur['code'] . ', message=' . $erreur['message'];
			die($message);
			$this->messages[] = array('erreur', $message);
			$this->etat = 0;
		} else {
			$this->lien = $lien;
			$this->etat = 1;
			$sortie = true;
		}
		
		// sortie
		return $sortie;
		
	}
	
	
	//
	public function executer($requete) {
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
			if ($operation = sqlsrv_query($this->lien, $requete)) {
				$this->operation = $operation;
				$sortie = $operation;
			}
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function lire($operation = false) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$sortie = sqlsrv_fetch_array($operation, SQLSRV_FETCH_ASSOC);

		// sortie
		return $sortie;
		
	}
	

}


/**
 * classe BooSgbdMysql
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdMysql extends BooSgbd {


	/**
	 * Compte le nombre de lignes d'une opération
	 */
	public function compter($operation) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$nombre = mysqli_num_rows($operation);
		if ($nombre) {
			$sortie = $nombre;
		}
		
		// sortie
		return $sortie;
	
	}

	
	//
	public function connecter() {
	
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
			$message = 'Erreur de connexion : code=' . mysqli_connect_errno() . ', message=' . mysqli_connect_error();
			die($message);
			$this->messages[] = array('erreur', $message);
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
	
	
	//
	public function executer($requete) {
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
			$operation = mysqli_query($this->lien, $requete);
			if ($operation === false) {
				$this->operation = $operation;
				$sortie = $operation;
			} else {
				$erreur = mysqli_error($this->lien);
				$message = '';
				$message .= '<p>' . $erreur . '</p>';
				die($message);
			}
		}
		
		// sortie
		return $sortie;
	
	}

	
	//
	public function lire($operation = false) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$sortie = mysqli_fetch_assoc($operation);
	
		// sortie
		return $sortie;
		
	}

}


/**
 * classe BooSgbdOracle
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdOracle extends BooSgbd {


	/**
	 * Compte le nombre de lignes d'une opération
	 */
	public function compter($operation) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$nombre = pg_num_rows($operation);
		if ($nombre) {
			$sortie = $nombre;
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function connecter() {
	
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
		if (!$lien) {
			$e = oci_error();
			$message = 'Erreur de connexion : code = ' . $e['code'] . ', message = ' . $e['message'] . ', offset = ' . $e['offset'] . ', sqltext = ' . $e['sqltext'];
			die($message);
			$this->messages[] = array('erreur', $message);
			$this->etat = 0;
		} else {
			$this->lien = $lien;
			$this->etat = 1;
			$sortie = true;
		}
		
		// sortie
		return $sortie;
		
	}
	
	
	//
	public function executer($requete) {
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
			$operation = oci_parse($this->lien, $requete);
			if (oci_execute($operation)) {
				$this->operation = $operation;
				$sortie = $operation;
			} else {
				$erreur = oci_error($operation);
				$position = ($erreur['offset'] - 1);
				$avant = substr($erreur['sqltext'], 0, $position);
				$apres = substr($erreur['sqltext'], $position);
				$message = '';
				$message .= '<p>CODE=' . $erreur['code'] . '</p>';
				$message .= '<p>MESSAGE=' . $erreur['message'] . '</p>';
				$message .= '<p>OFFSET=' . $erreur['offset'] . '</p>';
				$message .= '<p>' . $avant . '<span style="color:red;">' . $apres . '</span></p>';
				die($message);
			}
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function lire($operation = false) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$sortie = oci_fetch_array($operation, OCI_ASSOC + OCI_RETURN_NULLS);
	
		// sortie
		return $sortie;
		
	}

}


/**
 * classe BooSgbdPgsql
 *
 * @package Boo\Sources\SGBD
 */
class BooSgbdPgsql extends BooSgbd {


	/**
	 * Compte le nombre de lignes d'une opération
	 */
	public function compter($operation) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$nombre = pg_num_rows($operation);
		if ($nombre) {
			$sortie = $nombre;
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function connecter() {
	
		// initialisation des variables
		$sortie = false;
	
		// traitement
		$chaine = 'host=' . $this->parametres['hote'] . ' port=' . $this->parametres['port'] . ' dbname=' . $this->parametres['base'] . ' user=' . $this->parametres['identifiant'] . ' password=' . $this->parametres['motdepasse'];	
		if ($this->parametres['persistance'] == 'oui') {
			$lien = pg_pconnect($chaine);
		} else {
			$lien = pg_connect($chaine);
		}
		if (!$lien) {
			$message = 'Erreur de connexion';
			die($message);
			$this->messages[] = array('erreur', $message);
			$this->etat = 0;
		} else {
			$this->lien = $lien;
			$this->etat = 1;
			$sortie = true;
		}
		
		// sortie
		return $sortie;
		
	}
	
	
	//
	public function executer($requete) {
	
		// initialisation des variables
		$sortie = false;
		
		// traitement
		if ($this->lien) {
			$operation = pg_query($this->lien, $requete);
			if ($operation) {
				$this->operation = $operation;
				$sortie = $operation;
			} else {
				$erreur = pg_last_error($operation);
				$message = '';
				$message .= '<p>' . $erreur . '</p>';
				die($message);
			}
		}
		
		// sortie
		return $sortie;
	
	}
	
	
	//
	public function lire($operation = false) {
	
		// initialisation des variables
		$sortie = false;
		if ($operation == false) {
			$operation = $this->operation;
		}
		
		// traitement
		$sortie = pg_fetch_array($operation, null, PGSQL_ASSOC);
	
		// sortie
		return $sortie;
		
	}

}


?>