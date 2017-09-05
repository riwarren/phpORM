<?php

require_once('classes/row-class.php');

function getRows($name, $where = null) {
	if($where != null) {
	     	$result = db_select("select * from " . $name . " where " . $where);
	} else {
		$result = db_select("select * from " . $name);
	}
   	if(!$result) {
         	print db_error();
   	} else {
        	if(count($result) > 1) {
                 	$arr = array();
                 	foreach($result as $res) {
                          	$arr[] = new Row($name, $res); 
                     	}
                 	return $arr;
          	} else {
                     	return new Row($name, $result[0]);
     		}
     	}
}
