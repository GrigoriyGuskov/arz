<?php

define ("MATRIX_SIZE", 10);

for ($i=0; $i < MATRIX_SIZE; ++$i) {
	for ($j=0; $j < MATRIX_SIZE; ++$j) {
		$mat[$i][$j] = 0;
	}
}

for($i = 4; $i > 3; --$i) {
	for($x = 10, $y = 10; $x > 10 - $i || $y > 10 - $i;) {
		$x = rand(0, 10);
		$y = rand(0, 10);
		$dir = rand(0, 1);
	}
	if($x > 0) {
		$mat[$y][$x-1] = -1;
		if($y > 0) 
			$mat[$y-1][$x-1] = -1;
		if($y < 9)
			$mat[$y+1][$x-1] = -1;
			
	}
	
	for($j = 0; $j < $i; ++$j) {
		$mat[$y - $j*($dir-1)][$x + $j*$dir] = $i;
	}
}

print "<table border=\"1\" > <tr>";
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			print "<td width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
		}
		print "</tr>";
	}
print "</table>";

?>