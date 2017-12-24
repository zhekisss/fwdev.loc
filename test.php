<?php
 $name = 'Vasya';
 $colors = [
     'white' => 'белый',
     'black' => 'черный'
 ];

$vars =  compact("name", "colors");

print_r($vars);
?>