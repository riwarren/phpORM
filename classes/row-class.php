<?php

require_once(__DIR__ . '/../lib/db.php');

$con = db_connect();
if(!$con) {
	print db_error();
}

class Row {
	public $table = null;
	
	public function __construct($name, $res = null) {
		if($res != null) {
	    		foreach($res as $k => $v) {
	      			$this->{$k} = $v;
 	 		}
		}
		$this->table = $name;
	}

	public function save() {
		if($this->id != null) {
			$sql = "update " . $this->table . " set ";
		} else {
			$sql = "insert into " . $this->table . " set ";
		}
		foreach(get_object_vars($this) as $k => $v) {
			if(($k != 'table') && ($v != null)) {
				if(is_int($v)) {
					$sql .= $k . " = " . $v . ", ";
				} else if(is_string($v)) {
					$sql .= $k . " = '" . $v . "', ";
				}
			}
		}
		$sql = substr($sql, 0, -2);
		if($this->id != null) {
			$sql .= " where id = " . $this->id;
		}
		return db_query($sql);
	}
}
