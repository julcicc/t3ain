<?php

class DB extends PDO {
	
	public function __construct() {
		try {
			parent::__construct(getlocalconfig("PDO_DSN")
								, getlocalconfig("PDO_USER")
								, getlocalconfig("PDO_PASS"));
		}
		catch(Exception $e) {
			plog_exception($e);
			error_page("DB ERROR");
		}
	}

	public function quick() {
		return $this->rapidQuery(func_get_args())->fetchAll();
	}

	public function quickOne() {
		return $this->rapidQuery(func_get_args())->fetch();
	}
	
	public function qexec() {
		$this->rapidQuery(func_get_args());
		return $this->lastInsertId();
	}

	public function queryArray($sql, $params=array()) {
		$st = $this->prepare($sql);
		$i = 1;
		foreach($params as $param) {
			$st->bindValue($i, $param);
			$i++;
		}
		if (!$st->execute()) {
			plog_error("SQL Error for:", $sql);
			plog_error("SQL Params:", $params);
			plog_error("SQL Error info:", $st->errorInfo());
			throw new Exception("Invalid statement");	
		}
		$this->debugStmt($st);
		return $st;
	}
	
	private function rapidQuery($args) {
		return $this->queryArray($args[0], array_slice($args, 1));
	}

	public function val() {
		$st = $this->rapidQuery(func_get_args());
		if( $result = $st->fetch() ) {
			return $result[0];
		}
		return null;
	}

	private function debugStmt($st) {
		ob_start();
		$st->debugDumpParams();
		$str = ob_get_contents();
		ob_end_clean();	
		plog_debug("Statement:", $str);
	}
}
