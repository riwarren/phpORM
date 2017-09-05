<?php

require_once(__DIR__ . '/lib/rows.php');

$lead = getRows("leads", "status = 'Quoted'");
if(is_array($lead)) {
	foreach($lead as $l) {
		print $l->company;
//		$l->company = "Toys R Us";
//		$l->save();
	}
} else {
	print $lead->company;
}

$lead = new Row("leads");
$lead->company = "Toys R U";
$lead->save();
