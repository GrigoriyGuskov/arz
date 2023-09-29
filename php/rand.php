<?php

define ("ARR_SIZE", 20);

function cmp($a, $b) {
    if(abs($a) > abs($b))
        return 1;
    if(abs($a) < abs($b))
        return -1;
    return 0;
}

$zeros = 0;
$min = 0;

for ($i=0; $i<ARR_SIZE; $i++) {
    $arr[$i]=rand(0,100);
    if($arr[$min] > $arr[$i])
        $min = $i;
    if(!$arr[$i])
        ++$zeros;
}

$sum = 0;

for($i=$min; $i<ARR_SIZE; $i++) {
    $sum += $arr[$i];
}

print "<table border=\"1\" cellpadding=\"10\"><tr>";

print "Number of zeros: $zeros";
print "Sum after min: $sum";

usort($arr, "cmp");

for($i=0; $i<ARR_SIZE; $i++) {
    print "<td>".$arr[$i]."</td>";
}

print "</table>";

?>
