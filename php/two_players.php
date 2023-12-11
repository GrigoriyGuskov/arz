<?php
// start a session 
session_start();
if(!isset($_SESSION['game']))
	$_SESSION['game'] = 0;
define ("MATRIX_SIZE", 10);

class Ship {			//класс корабль
	public $x = -1;		//координаты верхней левой клетки
	public $y= -1;
	public $dir = -1;	//направление корабля
	public $lenght = -1;//длина корабля
	public $alive = 1;	//статус жизни

	//функция проверки жив ли корабль
	public function is_dead(&$matrix) {
		if($this->alive == 0)
			return 1;
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
	//постановка корабля на поле
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
	//проверка принадлежит ли клетка кораблю
	public function is_that_ship($x, $y) {
		if($this->dir == 0) {
			if($x != $this->x || $y < $this->y || $y > $this->y + $this->lenght - 1)
				return 0;
		} else {
			if($y != $this->y || $x < $this->x || $x > $this->x + $this->lenght - 1)
				return 0;
		}
		return 1;

	}
	//окружение корабля пустыми клетками после смерти 
	public function death(&$matrix) {
		if($this->alive) 
			exit();
		else{
			if($this->dir == 1) {
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
					if($this->x > 0)
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
function shot(&$shipes, &$matrix, $x, $y) {
	if($matrix[$y][$x] < -1 || $matrix[$y][$x] > 4)		//если в эту клетку уже стреляли
		return -1;
	if($matrix[$y][$x] <= 0) {	//промах
		$matrix[$y][$x] = -2;
		return 0;
	}
	$i = 0;
	for(; $i < 10;++$i) {
		if($shipes[$i]->is_that_ship($x, $y)) {
			$matrix[$y][$x] += 4;
			return $i+1;
		}
	}
}
//создаем поле для 1 игрока
if(!isset($_SESSION['first_field']) && $_SESSION['game'] == 0) {
	//создаем поле
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			$mat2[$i][$j] = 0;
		}
	}
	$_SESSION['first_field'] = $mat2;
	$_SESSION['i2'] = 4;
	$_SESSION['shcount2'] = 0;
	$_SESSION['k2'] = 0;
	$_SESSION['dr2'] = -1;
    $_SESSION['turn'] = rand(0, 1);

}
//ставим корабли 1 игрока
if($_SESSION['game'] == 0) {
	//ставим все корабли автоматически
	if(isset($_POST['dir_button']) && $_POST['dir_button'] == '3') { 
		for($shcount = $_SESSION['shcount2'], $i = $_SESSION['i2']; $i > 0; --$i) {
			for($k = 0; $k < 5 - $i; ++$k, ++$shcount) {
				if(isset($_SESSION['k2'])) {
					$k = $_SESSION['k2'];
					unset($_SESSION['k2']);
				}
				//задаем координаты
				$_SESSION['first_ships'][$shcount] = new Ship;
				for($empt_fl = 0; !$empt_fl;) {
					$_SESSION['first_ships'][$shcount]->x = rand(0, 9);
					$_SESSION['first_ships'][$shcount]->y = rand(0, 9);
					$_SESSION['first_ships'][$shcount]->dir = rand(0, 1);
					$_SESSION['first_ships'][$shcount]->lenght = $i;
					$empt_fl = $_SESSION['first_ships'][$shcount]->is_empty($_SESSION['first_field']);
				}
				//ставим корабль на поле
				$_SESSION['first_ships'][$shcount]->place_ship($_SESSION['first_field']);
			}
		}
        unset($_POST['dir_button']);
		$_SESSION['game'] = 1;
	} else {
		$_SESSION['first_ships'][$_SESSION['shcount2']] = new Ship;
		if(isset($_POST['dir_button'])) { 
			switch($_POST['dir_button']) {
				case '1':
					$_SESSION['dr2'] = 1;
					break;
				case '0':
					$_SESSION['dr2'] = 0;
					break;
				default:
					$_SESSION['dr2'] = -1;
			}
			//автоматически ставим следующий корабль
			if($_POST['dir_button'] == '2') {
				$_SESSION['first_ships'][$_SESSION['shcount2']]->x = rand(0,9);
				$_SESSION['first_ships'][$_SESSION['shcount2']]->y = rand(0,9);
				$_SESSION['first_ships'][$_SESSION['shcount2']]->dir = rand(0,1);
				
				$_SESSION['first_ships'][$_SESSION['shcount2']]->lenght = $_SESSION['i2'];
				if($_SESSION['first_ships'][$_SESSION['shcount2']]->is_empty($_SESSION['first_field'])) {
					$_SESSION['first_ships'][$_SESSION['shcount2']]->place_ship($_SESSION['first_field']);
					$_SESSION['shcount2'] = $_SESSION['shcount2'] + 1;
					$_SESSION['k2'] = $_SESSION['k2'] + 1;
					if($_SESSION['k2'] > 4 - $_SESSION['i2']) {
						$_SESSION['k2'] = 0;
						$_SESSION['i2'] = $_SESSION['i2'] - 1;
						if($_SESSION['i2'] <= 0) {
                            unset($_POST['dir_button']);
							$_SESSION['game'] = 1;

						}
					}

				}
			}
		}

		if (isset($_POST['first_buttons'])) {
			$var = $_POST['first_buttons'];
			$_SESSION['first_ships'][$_SESSION['shcount2']]->x = $var%10;
			$_SESSION['first_ships'][$_SESSION['shcount2']]->y = ($var-$var%10)/10;

			if($_SESSION['dr2'] == -1)
				$_SESSION['first_ships'][$_SESSION['shcount2']]->dir = rand(0,1);
			else {
				$_SESSION['first_ships'][$_SESSION['shcount2']]->dir = $_SESSION['dr2'];
				$_SESSION['dr2'] = -1;
			}
			$_SESSION['first_ships'][$_SESSION['shcount2']]->lenght = $_SESSION['i2'];
			if($_SESSION['first_ships'][$_SESSION['shcount2']]->is_empty($_SESSION['first_field'])) {
				$_SESSION['first_ships'][$_SESSION['shcount2']]->place_ship($_SESSION['first_field']);
				$_SESSION['shcount2'] = $_SESSION['shcount2'] + 1;
				$_SESSION['k2'] = $_SESSION['k2'] + 1;
				if($_SESSION['k2'] > 4 - $_SESSION['i2']) {
					$_SESSION['k2'] = 0;
					$_SESSION['i2'] = $_SESSION['i2'] - 1;
					if($_SESSION['i2'] <= 0) {
						$_SESSION['game'] = 1;

					}
				}

			}
		}
	}
}
//создаем поле для 2 игрока
if(!isset($_SESSION['second_field']) && $_SESSION['game'] == 1) {
    header("refresh:0");
	//создаем поле
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			$mat2[$i][$j] = 0;
		}
	}
	$_SESSION['second_field'] = $mat2;
	$_SESSION['i2'] = 4;
	$_SESSION['shcount2'] = 0;
	$_SESSION['k2'] = 0;
	$_SESSION['dr2'] = -1;
    $_SESSION['turn'] = rand(0, 1);

}
//ставим корабли 2 игрока
if($_SESSION['game'] == 1) {
	//ставим все корабли автоматически
	if(isset($_POST['dir_button']) && $_POST['dir_button'] == '3') { 
		for($shcount = $_SESSION['shcount2'], $i = $_SESSION['i2']; $i > 0; --$i) {
			for($k = 0; $k < 5 - $i; ++$k, ++$shcount) {
				if(isset($_SESSION['k2'])) {
					$k = $_SESSION['k2'];
					unset($_SESSION['k2']);
				}
				//задаем координаты
				$_SESSION['second_ships'][$shcount] = new Ship;
				for($empt_fl = 0; !$empt_fl;) {
					$_SESSION['second_ships'][$shcount]->x = rand(0, 9);
					$_SESSION['second_ships'][$shcount]->y = rand(0, 9);
					$_SESSION['second_ships'][$shcount]->dir = rand(0, 1);
					$_SESSION['second_ships'][$shcount]->lenght = $i;
					$empt_fl = $_SESSION['second_ships'][$shcount]->is_empty($_SESSION['second_field']);
				}
				//ставим корабль на поле
				$_SESSION['second_ships'][$shcount]->place_ship($_SESSION['second_field']);
			}
		}
		$_SESSION['game'] = 2;
	} else {
		$_SESSION['second_ships'][$_SESSION['shcount2']] = new Ship;
		if(isset($_POST['dir_button'])) { 
			switch($_POST['dir_button']) {
				case '1':
					$_SESSION['dr2'] = 1;
					break;
				case '0':
					$_SESSION['dr2'] = 0;
					break;
				default:
					$_SESSION['dr2'] = -1;
			}
			//автоматически ставим следующий корабль
			if($_POST['dir_button'] == '2') {
				$_SESSION['second_ships'][$_SESSION['shcount2']]->x = rand(0,9);
				$_SESSION['second_ships'][$_SESSION['shcount2']]->y = rand(0,9);
				$_SESSION['second_ships'][$_SESSION['shcount2']]->dir = rand(0,1);
				
				$_SESSION['second_ships'][$_SESSION['shcount2']]->lenght = $_SESSION['i2'];
				if($_SESSION['second_ships'][$_SESSION['shcount2']]->is_empty($_SESSION['second_field'])) {
					$_SESSION['second_ships'][$_SESSION['shcount2']]->place_ship($_SESSION['second_field']);
					$_SESSION['shcount2'] = $_SESSION['shcount2'] + 1;
					$_SESSION['k2'] = $_SESSION['k2'] + 1;
					if($_SESSION['k2'] > 4 - $_SESSION['i2']) {
						$_SESSION['k2'] = 0;
						$_SESSION['i2'] = $_SESSION['i2'] - 1;
						if($_SESSION['i2'] <= 0) {
							$_SESSION['game'] = 2;

						}
					}

				}
			}
		}

		if (isset($_POST['first_buttons'])) {
			$var = $_POST['first_buttons'];
			$_SESSION['second_ships'][$_SESSION['shcount2']]->x = $var%10;
			$_SESSION['second_ships'][$_SESSION['shcount2']]->y = ($var-$var%10)/10;

			if($_SESSION['dr2'] == -1)
				$_SESSION['second_ships'][$_SESSION['shcount2']]->dir = rand(0,1);
			else {
				$_SESSION['second_ships'][$_SESSION['shcount2']]->dir = $_SESSION['dr2'];
				$_SESSION['dr2'] = -1;
			}
			$_SESSION['second_ships'][$_SESSION['shcount2']]->lenght = $_SESSION['i2'];
			if($_SESSION['second_ships'][$_SESSION['shcount2']]->is_empty($_SESSION['second_field'])) {
				$_SESSION['second_ships'][$_SESSION['shcount2']]->place_ship($_SESSION['second_field']);
				$_SESSION['shcount2'] = $_SESSION['shcount2'] + 1;
				$_SESSION['k2'] = $_SESSION['k2'] + 1;
				if($_SESSION['k2'] > 4 - $_SESSION['i2']) {
					$_SESSION['k2'] = 0;
					$_SESSION['i2'] = $_SESSION['i2'] - 1;
					if($_SESSION['i2'] <= 0) {
						$_SESSION['game'] = 2;

					}
				}

			}
		}
	}
}


if($_SESSION['game'] == 2) {
    unset($_SESSION['i2']);
	unset($_SESSION['k2']);
	unset($_SESSION['dr2']);
	unset($_SESSION['shcount2']);
	unset($_POST['dir_button']);
}

//сброс
if (isset($_POST['res'])) {
	unset($_SESSION['game']);
	unset($_SESSION['turn']);
	unset($_SESSION['i2']);
	unset($_SESSION['k2']);
	unset($_SESSION['dr2']);
	unset($_SESSION['shcount2']);
	unset($_POST['dir_button']);
	unset($_POST['second_buttons']);
	unset($_POST['first_buttons']);
	unset($_SESSION['second_field']);
	unset($_SESSION['second_ships']);
	unset($_SESSION['first_field']);
	unset($_SESSION['first_ships']);
	unset($_POST['res']);
	header('Location: ./main.php');
}

//обработка выстрела
if($_SESSION['game'] == 2) {
	if ($_SESSION['turn'] && isset($_POST['first_buttons'])) {	//ход 2 игрока
		$var = $_POST['first_buttons'];							//считывание кнопки
		$sh = shot($_SESSION['first_ships'], $_SESSION['first_field'], $var%10, ($var-$var%10)/10);
		if($sh > 0) {		//попадание
			if($_SESSION['first_ships'][$sh-1]->is_dead($_SESSION['first_field'])) {
				$_SESSION['first_ships'][$sh-1]->death($_SESSION['first_field']);
				$dead_counter = 0;
				for($i = 0; $i < 10; ++$i) {
					if($_SESSION['first_ships'][$i]->alive == 0) {
						++$dead_counter;
					}
				}
				if($dead_counter == 10) {
					$_SESSION['game'] = -2;		//победа 2 игрока
				}
			}
		} else							//промах
			$_SESSION['turn'] = 0;		//переход хода
		header("refresh:0");
	} else if ($_SESSION['turn'] == 0 && isset($_POST['second_buttons'])) {	//ход 2 игрока
		$var = $_POST['second_buttons'];									//считывание кнопки
		$sh = shot($_SESSION['second_ships'], $_SESSION['second_field'], $var%10, ($var-$var%10)/10);
		if($sh > 0) {		//попадание
			if($_SESSION['second_ships'][$sh-1]->is_dead($_SESSION['second_field'])) {
				$_SESSION['second_ships'][$sh-1]->death($_SESSION['second_field']);
				$dead_counter = 0;
				for($i = 0; $i < 10; ++$i) {
					if($_SESSION['second_ships'][$i]->alive == 0) {
						++$dead_counter;
					}
				}
				if($dead_counter == 10) {
					$_SESSION['game'] = -1;		//победа 1 игрока
				}
			}
		} else							//промах
			$_SESSION['turn'] = 1;		//переход хода
		header("refresh:0");
	}
}
//поле для расстановки
if($_SESSION['game'] >= 0 && $_SESSION['game'] < 2) {
    print "<table align=\"center\" border=\"0\" > <tr>";
	?> <form method="POST"> <?php
	print "<td bgcolor = black width = \"50\" height = \"50\" >"?> <button style="background-color: #000000; border: medium none; height:44px; width:50px" name="res" type="submit" value="res"></button><?php "</td>";
	?> </form> <?php
	$let = "ABCDEFGHIJ";
	for($i = 0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" > ". $let[$i]."</td>";
	}
	print "</tr>";
	if($_SESSION['game'] == 0) {		//кнопки для расстановки кораблей 1 игрока
        for ($i=0; $i < MATRIX_SIZE; ++$i) {
            print "<td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
            ?><form method="POST"><?php
            for ($j=0; $j < MATRIX_SIZE; ++$j) {
                switch($_SESSION['first_field'][$i][$j]) {
                    case 8:
                    case 7:
                    case 6:
                    case 5:
                        print "<td bgcolor = darkred width = \"50\" height = \"50\" ></td>";
                        break;
                    case 4:
                        print "<td bgcolor = YellowGreen width = \"50\" height = \"50\" ></td>";
                        break;
                    case 3:
                        print "<td bgcolor = DarkGreen width = \"50\" height = \"50\" ></td>";
                        break;
                    case 2:
                        print "<td bgcolor = purple width = \"50\" height = \"50\" ></td>";
                        break;
                    case 1:
                        print "<td bgcolor = pink width = \"50\" height = \"50\" ></td>";
                        break;
                    case -2:
                        print "<td bgcolor = CadetBlue width = \"50\" height = \"50\" ></td>";
                        break;
                    default:
                        print "<td bgcolor = DarkBlue width = \"50\" height = \"50\" >"?> <button style="background-color: #00008B; border: medium none; height:44px; width:50px" name="first_buttons" type="submit" value="<?php echo $i,$j;?>"></button> <?php "</td>";
                }
            }
            print "</tr>";
        }
        print "</table>";
    } else {		//кнопки для расстановки кораблей 2 игрока
        for ($i=0; $i < MATRIX_SIZE; ++$i) {
            print "<td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
            ?><form method="POST"><?php
            for ($j=0; $j < MATRIX_SIZE; ++$j) {
                switch($_SESSION['second_field'][$i][$j]) {
                    case 8:
                    case 7:
                    case 6:
                    case 5:
                        print "<td bgcolor = darkred width = \"50\" height = \"50\" ></td>";
                        break;
                    case 4:
                        print "<td bgcolor = YellowGreen width = \"50\" height = \"50\" ></td>";
                        break;
                    case 3:
                        print "<td bgcolor = DarkGreen width = \"50\" height = \"50\" ></td>";
                        break;
                    case 2:
                        print "<td bgcolor = purple width = \"50\" height = \"50\" ></td>";
                        break;
                    case 1:
                        print "<td bgcolor = pink width = \"50\" height = \"50\" ></td>";
                        break;
                    case -2:
                        print "<td bgcolor = CadetBlue width = \"50\" height = \"50\" ></td>";
                        break;
                    default:
                        print "<td bgcolor = DarkBlue width = \"50\" height = \"50\" >"?> <button style="background-color: #00008B; border: medium none; height:44px; width:50px" name="first_buttons" type="submit" value="<?php echo $i,$j;?>"></button> <?php "</td>";
                }
            }
            print "</tr>";
        }
        print "</table>";
    }
}

//печатаем игровое поле
if($_SESSION['game'] > 1) {
	//печатаем заголовки
	print "<table align=\"center\" border=\"0\" > <tr>";
	?> <form method="POST"> <?php
	print "<td bgcolor = black width = \"50\" height = \"50\" >"?> <button style="background-color: #000000; border: medium none; height:44px; width:50px" name="res" type="submit" value="res"></button><?php "</td>";
	?> </form> <?php
	$let = "ABCDEFGHIJ";
	for($i = 0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" > ". $let[$i]."</td>";
	}

	print "<td width = \"50\" height = \"50\"></td><td bgcolor = black width = \"50\" height = \"50\" ></td>";
	for($i = 0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" > ". $let[$i]."</td>";
	}
	//поле 1 игрока
	print "</tr>";
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
		?><form method="POST"><?php
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			switch($_SESSION['first_field'][$i][$j]) {
				case 8:
                case 7:
                case 6:
                case 5:
                    print "<td bgcolor = darkred width = \"50\" height = \"50\" ></td>";
                    break;
                case -2:
                    print "<td bgcolor = CadetBlue width = \"50\" height = \"50\" ></td>";
                    break;
				default:
					print "<td bgcolor = DarkBlue width = \"50\" height = \"50\" >"?> <button style="background-color: #00008B; border: medium none; height:44px; width:50px" name="first_buttons" type="submit" value="<?php echo $i,$j;?>"></button> <?php "</td>";
                
            }
		}
		?></form><?php		//стрелочки для подсказки кому ходить
        if($_SESSION['turn'])
		    print "<td align = center width = \"50\" height = \"50\"> <<< </td><td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
        else
		    print "<td align = center width = \"50\" height = \"50\"> >>> </td><td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
		?><form method="POST"><?php		//поле 2 игрока
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			switch($_SESSION['second_field'][$i][$j]) {
				case 8:
				case 7:
				case 6:
				case 5:
					print "<td bgcolor = darkred width = \"50\" height = \"50\" ></td>";
					break;
				case -2:
					print "<td bgcolor = CadetBlue width = \"50\" height = \"50\" ></td>";
					break;
				default:
    				print "<td bgcolor = DarkBlue width = \"50\" height = \"50\" >"?> <button style="background-color: #00008B; border: medium none; height:44px; width:50px" name="second_buttons" type="submit" value="<?php echo $i,$j;?>"></button> <?php "</td>";
                
            }
        }
		?></form><?php
		print "</tr>";
	}
	print "</table>";
}
//кнопки для расстоновки кораблей
if($_SESSION['game'] >= 0 && $_SESSION['game'] < 2){
	print "<br><div align=\"center\">Как поставить следующий корабль?</div><br>";
	?>
<form style="text-align:center">
</form>
<form style="text-align:center" style="text-align:center" method="POST">
	<button style="height:50px; width:150px" name="dir_button" type="submit" value= "1">Горизонтально</button>
	<button style="height:50px; width:150px" name="dir_button" type="submit" value= "0">Вертикально</button>
</form>
<form style="text-align:center" method="POST">
	<button style="height:50px; width:150px" name="dir_button" type="submit" value= "2">Автоматически</button>
	<button style="height:50px; width:150px" name="dir_button" type="submit" value= "3">Автоматически все</button>
</form>

<?php //результат игры
} else if($_SESSION['game'] < 0) {
	if($_SESSION['game'] == -1) {
		print "<<h1 align=\"center\">Первый игрок победил<br></h1>";
	} else if($_SESSION['game'] == -2) {
		print "<h1 align=\"center\">Второй игрок победил<br></h1>";
	}

	//печатаем заголовки
	print "<table align=\"center\" border=\"0\" > <tr>";
	?> <form method="POST"> <?php
	print "<td bgcolor = black width = \"50\" height = \"50\" >"?> <button style="background-color: #000000; border: medium none; height:44px; width:50px" name="res" type="submit" value="res"></button><?php "</td>";
	?> </form> <?php
	$let = "ABCDEFGHIJ";
	for($i = 0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" > ". $let[$i]."</td>";
	}

	print "<td width = \"50\" height = \"50\"></td><td bgcolor = black width = \"50\" height = \"50\" ></td>";
	for($i = 0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" > ". $let[$i]."</td>";
	}
	//поле игрока
	print "</tr>";
	for ($i=0; $i < MATRIX_SIZE; ++$i) {
		print "<td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			switch($_SESSION['first_field'][$i][$j]) {
				case 8:
				case 7:
				case 6:
				case 5:
					print "<td bgcolor = darkred width = \"50\" height = \"50\" ></td>";
					break;
				case 4:
					print "<td bgcolor = YellowGreen width = \"50\" height = \"50\" ></td>";
					break;
				case 3:
					print "<td bgcolor = DarkGreen width = \"50\" height = \"50\" ></td>";
					break;
				case 2:
					print "<td bgcolor = purple width = \"50\" height = \"50\" ></td>";
					break;
				case 1:
					print "<td bgcolor = pink width = \"50\" height = \"50\" ></td>";
					break;
				case -2:
					print "<td bgcolor = CadetBlue width = \"50\" height = \"50\" ></td>";
					break;
				default:
					print "<td bgcolor = DarkBlue width = \"50\" height = \"50\" ></td>";
			}
		}
		//поле компьютера
		print "<td></td><td bgcolor = orange align = center width = \"50\" height = \"50\" >".($i + 1)."</td>";
		for ($j=0; $j < MATRIX_SIZE; ++$j) {
			switch($_SESSION['second_field'][$i][$j]) {
				case 8:
				case 7:
				case 6:
				case 5:
					print "<td bgcolor = darkred width = \"50\" height = \"50\" ></td>";
					break;
				case 4:
					print "<td bgcolor = YellowGreen width = \"50\" height = \"50\" ></td>";
					break;
				case 3:
					print "<td bgcolor = DarkGreen width = \"50\" height = \"50\" ></td>";
					break;
				case 2:
					print "<td bgcolor = purple width = \"50\" height = \"50\" ></td>";
					break;
				case 1:
					print "<td bgcolor = pink width = \"50\" height = \"50\" ></td>";
					break;
				case -2:
					print "<td bgcolor = CadetBlue width = \"50\" height = \"50\" ></td>";
					break;
				default:
					print "<td bgcolor = DarkBlue width = \"50\" height = \"50\" ></td>";
			}
		}
		print "</tr>";
	}
	print "</table>";


	?> <form style="text-align:center" method="POST"> 
		<button style="height:100px; width:200px" name="res" type="submit" value="res">Начать заново</button>
	</form> <?php
}

?>