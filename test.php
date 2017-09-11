<?php 

$query = "SELECT "

$test = 'martin,tom,adam,yo';

$test1 = explode(",", $test);

print_r($test1);


if(in_array("martin", $test1)) {

	echo "exists";



} else {

	echo "failed";
}
