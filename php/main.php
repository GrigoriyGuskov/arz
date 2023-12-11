<?php
//если была нажата какая-либо кнопка, включение соответствующего режима игры
if(isset($_POST['typ'])) {
    switch($_POST['typ']) {
        case 'pve':
            unset($_POST['typ']);
            header('Location: ./single_player.php');
            break;
        case 'pvp':
            unset($_POST['typ']);
            header('Location: ./two_players.php');
            break;
    }
}
//кнопки с выбором
print "<br><h1 align=\"center\">Выберите тип игры<br></h1>";
?>
<form style="text-align:center" method="POST"> 
	<button style="height:50px; width:100px" name="typ" type="submit" value="pve">Один игрок</button>
	<button style="height:50px; width:100px" name="typ" type="submit" value="pvp">Два игрока</button>
</form>