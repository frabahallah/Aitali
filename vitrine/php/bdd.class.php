<?php
class BDD {
	// Attributs de la classe
	protected $host;
	protected $base;
	protected $user;
	protected $pass;
	protected $conn;
	public $isConnected;
	
	// Constructeur
	public function __construct($p_host, $p_base, $p_user, $p_pass) {
		// Initialisation des attributs
		$this->setHost ( $p_host );
		$this->setBase ( $p_base );
		$this->setUser ( $p_user );
		$this->setPass ( $p_pass );
		// Connexion
		try {
			$this->conn = new PDO ( 'mysql:host=' . $this->getHost () . ';dbname=' . $this->getBase (), $this->getUser (), $this->getPass (), array (
					PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8' 
			) );
			$this->conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->conn->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
			$this->isConnected = true;
		} catch ( PDOException $e ) {
			throw new Exception ( 'ERR_LESLY: ' . $e->getMessage () );
			$this->isConnected = false;
		}
	}
	
	// Destructeur
	public function disconnect() {
		unset ( $this->conn ); // OU BIEN $this->conn = null
		$this->isConnected = false;
	}
	
	// Accesseurs
	private function setHost($param) {
		$this->host = $param;
	}
	public function getHost() {
		return $this->host;
	}
	private function setBase($param) {
		$this->base = $param;
	}
	public function getBase() {
		return $this->base;
	}
	private function setUser($param) {
		$this->user = $param;
	}
	public function getUser() {
		return $this->user;
	}
	private function setPass($param) {
		$this->pass = $param;
	}
	public function getPass() {
		return $this->pass;
	}
	
	// Méthode qui renvoie le résultat d'une requête SQL
	// sous la forme d'une liste HTML
	public function drawSelect($id, $name, $sql, $var = array()) {
		try {
			$res = $this->conn->prepare ( $sql );
			$res->execute ( $var );
			$code = '<select id="' . $name . '" name="' . $name . '" class="form-control">' . "\n";
			while ( $row = $res->fetch ( PDO::FETCH_NUM ) ) {
				$selected = ($id == $row [0] ? 'selected' : '');
				$code .= '<option value="' . $row [0] . '" ' . $selected . '>' . $row [1] . '</option>' . "\n";
			}
			$code .= '</select>' . "\n";
			return $code;
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	// Méthode qui renvoie le résultat d'une requête SQL
	// sous la forme d'un tableau HTML
	/**
	 *
	 * @param unknown $table        	
	 * @param unknown $id        	
	 * @param unknown $sql        	
	 * @param unknown $var        	
	 * @throws Exception
	 * @return string
	 */
	public function drawTable($table, $id, $sql, $var = array()) {
		try {
			// Exécution de la requête
			$res = $this->conn->prepare ( $sql );
			$res->execute ( $var );
			// En-tête du tableau
			$code = '<table class="table table-striped table-bordered table-hover">' . "\n";
			$code .= '<thead>' . "\n";
			$code .= '<tr>' . "\n";
			// Affichage du nom des colonnes
			for($i = 0; $i < $res->columnCount (); $i ++) {
				$col = $res->getColumnMeta ( $i );
				$code .= '<th>' . $col ['name'] . '</th>' . "\n";
			}
			$code .= '<th></th>' . "\n";
			$code .= '<th></th>' . "\n";
			$code .= '</tr>' . "\n";
			$code .= '</thead>' . "\n";
			// Corps du tableau
			$code .= '<tbody>' . "\n";
			while ( $row = $res->fetch () ) {
				$code .= '<tr>' . "\n";
				foreach ( $row as $key => $val ) {
					$code .= '<td>' . $val . '</td>' . "\n";
				}
				$code .= '<td><a href="edit_' . $table . '.php?id=' . $row [$id] . '" class="glyphicon glyphicon-pencil"></a></td>' . "\n";
				$code .= '<td><a href="supr_' . $table . '.php?id=' . $row [$id] . '" class="glyphicon glyphicon-trash"></a></td>' . "\n";
				$code .= '</tr>' . "\n";
			}
			$code .= '</tbody>' . "\n";
			$code .= '</table>' . "\n";
			// Renvoie le tableau
			return $code;
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	// Méthode qui renvoie le résultat d'une requête SQL
	// sous la forme de sa première ligne
	public function getRow($sql, $var = array()) {
		try {
			$res = $this->conn->prepare ( $sql );
			$res->execute ( $var );
			return $res->fetch ();
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	// Méthode qui renvoie le résultat d'une requête SQL
	// avec toutes ses lignes
	public function getRows($sql, $var = array()) {
		try {
			$res = $this->conn->prepare ( $sql );
			$res->execute ( $var );
			return $res->fetchAll ();
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
	
	// Méthode pour ajouter, mettre à jour ou supprimer
	// des données
	public function execQuery($sql, $var = array()) {
		try {
			$res = $this->conn->prepare ( $sql );
			$res->execute ( $var );
		} catch ( PDOException $e ) {
			throw new Exception ( $e->getMessage () );
		}
	}
}
?>