<?php
require_once 'config/connect.php';
$imgs = mysqli_query($connect, "SELECT * FROM `imgs`");
$imgs = mysqli_fetch_all($imgs);
$a = $_GET['arr'];
$k=$a%10;
$id=($a-$k)/10;

foreach ($imgs as $i) {
	if ($id == $i[0]) {
		$item=$i;
	}
}
	
$s=$item[5]+$k;
$n=$item[6]+1;
$sr=$s/$n;
$sql = mysqli_query($connect, "UPDATE `imgs` SET `summ` = '{$s}',`k` = '{$n}',`sr` = '{$sr}' WHERE `id`={$id}");
echo $sr;
header("Location: /info_img.php?id=$id");
?>