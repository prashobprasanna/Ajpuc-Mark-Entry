
<?php
  header('Content-Type: Text/Plain');



$my_array1 = array(0 => 'zero_a', 2 => 'two_a', 3 => 'three_a'); 
$my_array2 = array(1 => 'one_b', 3 => 'three_b', 4 => 'four_b'); 
$res = array_merge($my_array1,$my_array2); 
print_r($res); 
?>

