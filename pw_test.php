<?php
$password = "123Admin$";
$hashPassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
echo $hashPassword;
$bytes = openssl_random_pseudo_bytes(20);
$hex = bin2hex($bytes);
echo "<br>".$hex." len: ".strlen($hex);
$salt = base64_encode($hex);
echo "<br>".$salt." len: ".strlen($salt);
if (password_verify($password, $hashPassword)) {
  echo "<br>valid";
}
?>
