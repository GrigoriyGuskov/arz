<?php

define ("MATRIX_SIZE", 10);

class Ship {
	public $x;
	public $y;
	public $dir;
	public $lenght;
	public $alive = 1;

	public function is_dead($matrix) {
		for($i = 0; $i < .$lenght; ++$i) {
			if(.$dir == 0) {
				if($matrix[.$y + $i][.$x] == .$lenght) {
					.$alive = 1;
					return 0;
				} else if($matrix[.$y + $i][.$x] != .$lenght + 4)
					exit();
			} else {
				if($matrix[.$y][.$x + $i] == .$lenght) {
					.$alive = 1;
					return 0;
				} else if($matrix[.$y][.$x + $i] != .$lenght + 4)
					exit();
			}
		}
		.$alive = 0;
		return 1;
	}
	//проверка можно ли поставить корабль
	public function is_empty($matrix) {
		if(.$dir == 1) {
			if(.$x > MATRIX_SIZE - .$lenght)
				return 0;
			for($i = 0; $i < .$lenght; ++$i) {
				if($matrix[.$y][.$x + $i])
					return 0;
			}
		} 
		if(.$dir == 0) {
			if(.$y > MATRIX_SIZE - .$lenght)
				return 0;
			for($i = 0; $i < .$lenght; ++$i) {
				if($matrix[.$y + $i][.$x])
					return 0;
			}
		}
		return 1;
	}
	public function place_ship($matrix) {
		//окружаем корабль "забором"
		if(.$dir == 0) {
			if(.$x > 0) {
				$matrix[.$y][.$x-1] = -1;
				if(.$y > 0) 
					$matrix[.$y-1].[$x-1] = -1;
				if(.$y < 9)
					$matrix[.$y+1][.$x-1] = -1;
			}
			if(.$x+.$lenght-1 < 9) {
				$matrix[.$y][.$x+.$lenght] = -1;
				if(.$y > 0) 
					$matrix[.$y-1][.$x+.$lenght] = -1;
				if(.$y < 9)
					$matrix[.$y+1][.$x+.$lenght] = -1;
			}
		}
		else {
			if(.$y > 0) {
				$matrix[.$y-1][.$x] = -1;
				if(.$x > 0)
					$matrix[.$y-1][.$x-1] = -1;
				if(.$x < 9)
					$matrix[.$y-1][.$x+1] = -1;
			}
			if(.$y+.$lenght-1 < 9) {
				$matrix[.$y+.$lenght][.$x] = -1;
				if($x > 0)
					$matrix[.$y+.$lenght][.$x-1] = -1;
				if(.$x < 9)
					$matrix[.$y+.$lenght][.$x+1] = -1;
			}
		}
		//ставим сам корабль
		for($j = 0; $j < .$lenght; ++$j) {
			if(.$dir == 0) {
				$matrix[.$y + $j][.$x] = .$lenght;
				if(.$x < 9)
					$matrix[.$y + $j][.$x+1] = -1;
				if(.$x > 0)
					$matrix[.$y + $j][.$x-1] = -1;
			} else {
				$matrix[.$y][.$x + $j] = .$lenght;
				if(.$y < 9)
					$matrix[.$y+1][.$x + $j] = -1;
				if(.$y > 0)
					$matrix[.$y-1][.$x + $j] = -1;
			}
		}
	}
}


//функция для выстрела
function shot($matrix, $x, $y) {
	if($matrix[$y][$x] <= 0) {
		$matrix[$y][$x] = -2;
		return 0;
	}
	if($matrix[$y][$x] / 5 == 0) {
		$matrix[$y][$x] += 4;
		return 1;
	}
	return -1; 


}


//создаем поле
for ($i=0; $i < MATRIX_SIZE; ++$i) {
	for ($j=0; $j < MATRIX_SIZE; ++$j) {
		$mat[$i][$j] = 0;
	}
}
//расставляем корабли
for($shcount = 0, $i = 4; $i > 3; --$i) {
	for($k = 0; $k < $i - 4; ++$k, ++$shcount) {
		//задаем координаты
		for($empt_fl = 0; !$empt_fl;) {
			$ships[$shcount] = new Ship;
			$ships[$shcount]->$x = rand(0, 10);
			$ships[$shcount]->$y = rand(0, 10);
			$ships[$shcount]->$dir = rand(0, 1);
			$ships[$shcount]->$lenght = $i;
			$empt_fl = $ships[$shcount].is_empty($mat);
		}
		//ставим корабль на поле
		$ships[$shcount].place_ship($mat);
	}
}
//печатаем поле
print "<table border=\"1\" > <tr>";
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			print "<td width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
		}
		print "</tr>";
	}
print "</table>";

?>