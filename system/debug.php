<?php
/**
 * Prints out an user-readable variable to debug
 * @param $variable Variable to debug
 */
function pr($variable){
	echo '<pre>';
	print_r($variable);
	echo '</pre>';
}