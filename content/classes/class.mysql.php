<?php
class mysql {

	var $sql_serveur;

	var $sql_utlisateur;

	var $sql_password;

	var $connection_sql;

	var $select_bd;

	var $resultat;

	var $nb_requete;

	var $erreur;

	var $sql_debug;

	function mysql($host, $user, $pass)
	{
		$this->sql_serveur = $host;

		$this->sql_utilisateur = $user;

		$this->sql_password = $pass;

		$this->resultat = array();

		$this->connection();

		$this->sql_debug = '1';
	}



	//fonction de connection a mysql

	function connection()
	{
		$this->connection_sql = mysql_connect($this->sql_serveur, $this->sql_utilisateur, $this->sql_password);

		if(!$this->connection_sql)
		{
			$this->mysql_erreur();
		}
	}



	//fonction de selection de la base de donnée

	function selection_bd($db)
	{
		$this->select_bd = mysql_select_db($db, $this->connection_sql);  

		if (!$this->select_bd)
		{
			$this->mysql_erreur();
		}
	}



	//fonction de déconnexion de la base de donnée

	function deconnexion()
	{
		mysql_close($this->connection_sql);
	}



	//fonction d'execution de requête

	function requete($requete, $p)
	{
		$this->resultat[$p] = mysql_query($requete);

		$this->nb_requete++;

		if(!$this->resultat[$p])
		{
			$this->mysql_erreur();
		}
	}



	//fontion qui retourne les données

	function resultat($p,$type)
	{
		switch($type)
		{
			case("array"):
				return @mysql_fetch_array($this->resultat[$p]);
				break;

			case("row"):
				return @mysql_fetch_row($this->resultat[$p]);
				break;

			case("assoc"):
				return @mysql_fetch_assoc($this->resultat[$p]);
				break;

			case("result"):
				return @mysql_result($this->resultat[$p],0);
				break;
		}
	}



	//fonction permettant de compter le nombre de resultat trouvé

	function nb_resultat($p)
	{
		return mysql_num_rows($this->resultat[$p]);
	}

	

	//function d'affichage des erreur mysql	

	function mysql_erreur()
	{
		if ($this->sql_debug == 1)
		{
		    $this->erreur = @mysql_error($this->connection_sql); 
		    $message = "<p class='stop'>".$this->erreur."</p>";
		    echo $message;
		}
	}
}
?>
