<?php
$pass = "admin1@mail.ru123456789";

$passHashed = password_hash($pass, PASSWORD_BCRYPT);

echo $passHashed;