<?php
$use = $_POST['comment1'];
if ($use != 'en') {
	setcookie('googtrans',"/en/en");
}
$use1 = explode(".", $use);
$i = sizeof($use1);
if ($use1[$i-1] == "") {
	$i = $i - 1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >
<div id = "check" >
<?php  
	for($c = 0;$c < $i;$c++) 
	{
	?><div id="Translate" >
	<?php
	print($use1[$c]);
	print(".");
	}
	?>	
	</div>
</div>
<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement('Translate');
}
</script>	
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>