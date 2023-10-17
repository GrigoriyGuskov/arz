<?php

define ("MATRIX_SIZE", 10);

function is_empty($matrix, $x, $y, $dir, $lenght) {
	if($dir == 1) {
		if($x > MATRIX_SIZE - $lenght)
			return 0;
		for($i = 0; $i < $lenght; ++$i) {
			if($matrix[$y][$x + $i])
				return 0;
		}
	} 
	if($dir == 0) {
		if($y > MATRIX_SIZE - $lenght)
			return 0;
		for($i = 0; $i < $lenght; ++$i) {
			if($matrix[$y + $i][$x])
				return 0;
		}
	}
	return 1;
}

for ($i=0; $i < MATRIX_SIZE; ++$i) {
	for ($j=0; $j < MATRIX_SIZE; ++$j) {
		$mat[$i][$j] = 0;
	}
}

for($i = 4; $i > 3; --$i) {
	$empt_fl = 0;
	for(; !$empt_fl; $empt_fl = is_empty($mat, $x, $y, $dir, $i)) {
		$x = rand(0, 10);
		$y = rand(0, 10);
		$dir = rand(0, 1);
	}
	if($dir == 0) {
		if($x > 0) {
			$mat[$y][$x-1] = -1;
			if($y > 0) 
				$mat[$y-1][$x-1] = -1;
			if($y < 9)
				$mat[$y+1][$x-1] = -1;
		}
		if($x+$i-1 < 9) {
			$mat[$y][$x+$i] = -1;
			if($y > 0) 
				$mat[$y-1][$x+$i] = -1;
			if($y < 9)
				$mat[$y+1][$x+$i] = -1;
		}
	}
	else {
		if($y > 0) {
			$mat[$y-1][$x] = -1;
			if($x > 0)
				$mat[$y-1][$x-1] = -1;
			if($x < 9)
				$mat[$y-1][$x+1] = -1;
		}
		if($y+$i-1 < 9) {
			$mat[$y+$i][$x] = -1;
			if($x > 0)
				$mat[$y+$i][$x-1] = -1;
			if($x < 9)
				$mat[$y+$i][$x+1] = -1;
		}
	}

	for($j = 0; $j < $i; ++$j) {
		if($dir == 0) {
			$mat[$y + $j][$x] = $i;
			if($x < 9)
				$mat[$y + $j][$x+1] = -1;
			if($x > 0)
				$mat[$y + $j][$x-1] = -1;
		} else {
			$mat[$y][$x + $j] = $i;
			if($y < 9)
				$mat[$y+1][$x + $j] = -1;
			if($y > 0)
				$mat[$y-1][$x + $j] = -1;
		}
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