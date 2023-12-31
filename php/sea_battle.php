<?php

define ("MATRIX_SIZE", 10);

class Ship {
	public $x = -1;
	public $y= -1;
	public $dir = -1;
	public $lenght = -1;
	public $alive = 1;
	
	public function is_dead(&$matrix) {
		for($i = 0; $i < $this->lenght; ++$i) {
			if($this->dir == 0) {
				if($matrix[$this->y + $i][$this->x] == $this->lenght) {
					$this->alive = 1;
					return 0;
				} else if($matrix[$this->y + $i][$this->x] != $this->lenght + 4)
					exit();
			} else {
				if($matrix[$this->y][$this->x + $i] == $this->lenght) {
					$this->alive = 1;
					return 0;
				} else if($matrix[$this->y][$this->x + $i] != $this->lenght + 4)
					exit();
			}
		}
		$this->alive = 0;
		return 1;
	}
	//проверка можно ли поставить корабль
	public function is_empty(&$matrix) {
		if($this->dir == 1) {
			if($this->x > MATRIX_SIZE - $this->lenght)
				return 0;
			for($i = 0; $i < $this->lenght; ++$i) {
				if($matrix[$this->y][$this->x + $i])
					return 0;
			}
		} 
		if($this->dir == 0) {
			if($this->y > MATRIX_SIZE - $this->lenght)
				return 0;
			for($i = 0; $i < $this->lenght; ++$i) {
				if($matrix[$this->y + $i][$this->x])
					return 0;
			}
		}
		return 1;
	}
	public function place_ship(&$matrix) {
		if($this->is_empty($matrix)) {
			//окружаем корабль "забором"
			if($this->dir == 1) {
				if($this->x > 0) {
					$matrix[$this->y][$this->x-1] = -1;
					if($this->y > 0) 
						$matrix[$this->y-1][$this->x-1] = -1;
					if($this->y < 9)
						$matrix[$this->y+1][$this->x-1] = -1;
				}
				if($this->x+$this->lenght-1 < 9) {
					$matrix[$this->y][$this->x+$this->lenght] = -1;
					if($this->y > 0) 
						$matrix[$this->y-1][$this->x+$this->lenght] = -1;
					if($this->y < 9)
						$matrix[$this->y+1][$this->x+$this->lenght] = -1;
				}
			}
			else {
				if($this->y > 0) {
					$matrix[$this->y-1][$this->x] = -1;
					if($this->x > 0)
						$matrix[$this->y-1][$this->x-1] = -1;
					if($this->x < 9)
						$matrix[$this->y-1][$this->x+1] = -1;
				}
				if($this->y+$this->lenght-1 < 9) {
					$matrix[$this->y+$this->lenght][$this->x] = -1;
					if($this->x > 0)
						$matrix[$this->y+$this->lenght][$this->x-1] = -1;
					if($this->x < 9)
						$matrix[$this->y+$this->lenght][$this->x+1] = -1;
				}
			}
			//ставим сам корабль
			for($j = 0; $j < $this->lenght; ++$j) {
				if($this->dir == 0) {
					$matrix[$this->y + $j][$this->x] = $this->lenght;
					if($this->x < 9)
						$matrix[$this->y + $j][$this->x+1] = -1;
					if($this->x > 0)
						$matrix[$this->y + $j][$this->x-1] = -1;
				} else {
					$matrix[$this->y][$this->x + $j] = $this->lenght;
					if($this->y < 9)
						$matrix[$this->y+1][$this->x + $j] = -1;
					if($this->y > 0)
						$matrix[$this->y-1][$this->x + $j] = -1;
				}
			}
		}
	}
	public function is_that_ship(&$matrix, $x, $y) {
		$value = $matrix[$x][$y];
		if($value > 4)
			$value -= 4;
		if($value != $this->lenght)
			return 0;

		if($this->dir == 0) {
			if($x != $this->x || $y < $this->y || $y > $this->y + $this->lenght - 1)
				return 0;
		} else {
			if($y != $this->y || $x < $this->x || $x > $this->x + $this->lenght - 1)
				return 0;
		}
		return 1;

	}
	public function death(&$matrix) {
		if(!$alive && $this->is_dead($matrix)) {
			if($this->dir == 0) {
				if($this->x > 0) {
					$matrix[$this->y][$this->x-1] = -2;
					if($this->y > 0) 
						$matrix[$this->y-1][$this->x-1] = -2;
					if($this->y < 9)
						$matrix[$this->y+1][$this->x-1] = -2;
				}
				if($this->x+$this->lenght-1 < 9) {
					$matrix[$this->y][$this->x+$this->lenght] = -2;
					if($this->y > 0) 
						$matrix[$this->y-1][$this->x+$this->lenght] = -2;
					if($this->y < 9)
						$matrix[$this->y+1][$this->x+$this->lenght] = -2;
				}
			}
			else {
				if($this->y > 0) {
					$matrix[$this->y-1][$this->x] = -2;
					if($this->x > 0)
						$matrix[$this->y-1][$this->x-1] = -2;
					if($this->x < 9)
						$matrix[$this->y-1][$this->x+1] = -2;
				}
				if($this->y+$this->lenght-1 < 9) {
					$matrix[$this->y+$this->lenght][$this->x] = -2;
					if($x > 0)
						$matrix[$this->y+$this->lenght][$this->x-1] = -2;
					if($this->x < 9)
						$matrix[$this->y+$this->lenght][$this->x+1] = -2;
				}
			}
			for($j = 0; $j < $this->lenght; ++$j) {
				if($this->dir == 0) {
					if($this->x < 9)
						$matrix[$this->y + $j][$this->x+1] = -2;
					if($this->x > 0)
						$matrix[$this->y + $j][$this->x-1] = -2;
				} else {
					if($this->y < 9)
						$matrix[$this->y+1][$this->x + $j] = -2;
					if($this->y > 0)
						$matrix[$this->y-1][$this->x + $j] = -2;
				}
			}
		}
	}
}


//функция для выстрела
function shot(&$matrix, $x, $y) {
	if($matrix[$y][$x] < -1 || $matrix[$y][$x] > 4)
		return -1;
	if($matrix[$y][$x] <= 0) {
		$matrix[$y][$x] = -2;
		return 0;
	} else {
		$matrix[$y][$x] += 4;
		return 1;
	}
}


//создаем поле
for ($i=0; $i < MATRIX_SIZE; ++$i) {
	for ($j=0; $j < MATRIX_SIZE; ++$j) {
		$mat[$i][$j] = 0;
	}
}
//расставляем корабли
for($shcount = 0, $i = 4; $i > 0; --$i) {
	for($k = 0; $k < 5 - $i; ++$k, ++$shcount) {
		//задаем координаты
		$ships[$shcount] = new Ship;
		for($empt_fl = 0; !$empt_fl;) {
			$ships[$shcount]->x = rand(0, 9);
			$ships[$shcount]->y = rand(0, 9);
			$ships[$shcount]->dir = rand(0, 1);
			$ships[$shcount]->lenght = $i;
			$empt_fl = $ships[$shcount]->is_empty($mat);
		}
		//ставим корабль на поле
		$ships[$shcount]->place_ship($mat);
	}
}
//печатаем поле
print "<table border=\"1\" > <tr>";
print "<td bgcolor = black width = \"50\" height = \"50\" > </td>";
for($i = 0, $let = "ABCDEFGHIJ"; $i < MATRIX_SIZE; ++$i) {
	print "<td bgcolor = orange width = \"50\" height = \"50\" > ". $let[$i]."</td>";
}
print "</tr>";
for ($i=0; $i < MATRIX_SIZE; ++$i) {
	print "<td bgcolor = orange width = \"50\" height = \"50\" >".$i."</td>";
	for ($j=0; $j < MATRIX_SIZE; ++$j) {
		switch($mat[$i][$j]) {
			case 4:
				print "<td bgcolor = blue width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
				break;
			case 3:
				print "<td bgcolor = green width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
				break;
			case 2:
				print "<td bgcolor = purple width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
				break;
			case 1:
				print "<td bgcolor = pink width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
				break;
			default:
				print "<td bgcolor = yellow width = \"50\" height = \"50\" > ".$mat[$i][$j]."</td>";
		}
	}
	print "</tr>";
}
print "</table>";

?>