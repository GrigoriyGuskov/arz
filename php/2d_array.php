<?php

define ("MATRIX_SIZE", 10);
$K = 2;

function get_array($matrix, $size, $str) {
	for($i = $str; $i < $size - $str - 1; ++$i) {
		$arr[$i - $str] = $matrix[$str][$i];
		$arr[$size - 2*$str - 1 + $i - $str] = $matrix[$i][$size - $str - 1];
		$arr[2*($size - 2*$str - 1) + $i - $str] = $matrix[$size - $str - 1][$size - 1 - $i];
		$arr[3*($size - 2*$str - 1) + $i - $str] = $matrix[$size - 1 - $i][$str];
	}
	return $arr;
}

function put_array (&$matrix, $size, $str, $arr) {
	$arr_size = 4*($size - 2*$str - 1);
	
	for($i = $str; $i < $size - $str - 1; ++$i) {
		$matrix[$str][$i] = $arr[$i - $str];
		$matrix[$i][$size - $str - 1] = $arr[$size - 2*$str - 1 + $i - $str];
		$matrix[$size - $str - 1][$size - 1 - $i] = $arr[2*($size - 2*$str - 1) + $i - $str];
		$matrix[$size - 1 - $i][$str] = $arr[3*($size - 2*$str - 1) + $i - $str];
	}
}

function sdvig($k, $n, $arr) {
	for($i = 0; $i < $n; ++$i) {
		$arr2[($i+$k)%$n] = $arr[$i];
	}
	
	return $arr2;
}


for ($i=0; $i < MATRIX_SIZE; ++$i) {
	for ($j=0; $j < MATRIX_SIZE; ++$j) {
		$mat[$i][$j] = rand(-100,100);
	}
}
print "Initial matrix: <br>";
print "<table border=\"1\" cellpadding=\"10\"> <tr>";
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			print "<td>".$mat[$i][$j]."</td>";
		}
		print "</tr>";
	}
print "</table>";

//sdvig

for($i = 0; $i < MATRIX_SIZE/2; ++$i) {
	$arr = get_array($mat, MATRIX_SIZE, $i);
	$arr = sdvig($K, 4*(MATRIX_SIZE - 2*$i - 1), $arr);
	put_array($mat, MATRIX_SIZE, $i, $arr);
}

print "<br><br><br>";

print "Altered matrix: <br>";
print "<table border=\"1\" cellpadding=\"10\"> <tr>";
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			print "<td>".$mat[$i][$j]."</td>";
		}
		print "</tr>";
	}
print "</table>";
?>