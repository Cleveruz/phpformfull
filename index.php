<!DOCTYPE html>
<html>
<head>
	<title>FORM REQUIRED</title>
</head>
<body>
	<?php 
$fish = $_POST["fish"];
$num = $_POST["num"];
$email = $_POST["email"];
$web = $_POST["web"];
//FIShni tekshirish
if (empty($fish)) {
	$noname = "*FISH to'ldirilmagan";
}elseif(!preg_match("/^[a-zA-Z. ]{5,30}$/", $fish)) {
	$fisher = "*FISH faqat harflardan iborat bo'lsin Min: 5, maks: 30 belgi.";
}
else{
	$fnam = "Ismingiz: ".Forma($fish);
}
//Telefon raqamni tekshirish
if (empty($num)) {
	$nolname = "*Raqam to'ldirilmagan";
}elseif (!preg_match("/^[0-9+-]{9,13}$/", $num)) {
	$numer = "*Raqam faqat sonlardan iborat bo'lsin.";
}
else{
	$lnam = "Raqamingiz: ".Forma($num);
}
//Email manzilni tekshirish
if (empty($email)) {
	$noemail = "*Email to'ldirilmagan";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$emailer = "*Pochta noto'g'ri kiritilgan";
}
else{
	$emal = "Pochtangiz: ".Forma($email);
}
//Vebsayt url ni tekshirish
if (empty($web)) {
	$nostudy = "*Vebsayt manzil to'ldirilmadi";
}elseif (!filter_var($web, FILTER_VALIDATE_URL)) {
	$urler = "*URL manzil noto'g'ri kiritilgan.";
}
else{
	$stud = "Vebsaytingiz: ".Forma($web);
}
//funksiya yaratib olamiz
function Forma($input){
	$input = trim($input);
	$input = htmlspecialchars($input);
	$input = stripcslashes($input);
	return $input;
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	F.I.SH: <span style="color:red"><?php if($noname){echo $noname;}else{ echo $fisher;}?></span><br><input type="text" name="fish"><br>
	Telefon: <span style="color:red"><?php if($nolname){echo $nolname;} else{ echo $numer;}?></span><br><input type="text" name="num"><br>
	Email: <span style="color:red"><?php if($noemail){ echo $noemail;} else { echo $emailer;}?></span><br><input type="text" name="email"><br>
	Vebsayt: <span style="color:red"><?php if($nostudy){echo $nostudy;}else{ echo $urler;}?></span><br><input type="text" name="web"><br>
	<input type="submit" value="Yuborish">
</form>

<h1>Sizning ma'lumotlaringiz: </h1>

<?php 
//o'zgaruvchidagi ma'lumotlarni ekranga chiqaramiz
echo $fnam;
echo "<br>";
echo $lnam;
echo "<br>";
echo $emal;
echo "<br>";
echo $stud;
echo "<br>";
?>
</body>
</html>
