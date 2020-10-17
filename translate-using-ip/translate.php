<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$cookie_name = "translate1";
$comment="";
$cookie_value = $comment;
$use=$_POST['sendvar'];
#print($use);
if($use != 'en') {
setcookie('googtrans', "/en/".$use."");
}
setcookie($cookie_name, $cookie_value,time()+(86400*30),"/");	
if ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])){
if(empty($_POST["Translatorf"])){
	$_COOKIE[$cookie_name]="";
}else{
	$_COOKIE[$cookie_name]=test_input($_POST["Translatorf"]);
}
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head><link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/translate_static/js/element/main.js"></script><script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/element/TE_20170911_00/e/js/element/element_main.js"></script></head>
<body>
<div class="notranslate">
<h1 class="notranslate">My Web Page</h1>

<p>Translator BOX</p>

<p>Using Google Translate</p>
</div>
<div id="hello_there"></div>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">		
	</textarea><br>
	<span class="notranslate">OUTPUT TEXT<br></span>
	<textarea class="translate" rows="15" cols="60">
	<?php
	echo "Writing an essay often seems to be a dreaded task among students. Whether the essay is for a scholarship ,a class or maybe even a contest many students often find the task overwhelming. While an essay is a large project there are many steps a student can take that will help break down the task into manageable parts, Following this process is the easiest way to draft a successful essay, whatever its purpose might be, According to Kathy Livingston’s Guide to Writing a Basic Essay, there are seven steps to writing a successful essay";
	?>
</textarea>
	<br></form>
<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'es'}, 'hello_there');
}
</script>	
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>
</html>