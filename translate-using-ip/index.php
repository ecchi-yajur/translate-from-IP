<?php
//For including a file in which the country code has been mapped with the language code which can then be hardcoded inside 
//Google Translate
include "locale.php";
// GET VISITOR IP
function get_ip() {
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
return $_SERVER['HTTP_CLIENT_IP'];
}
//If IP is pass from Proxy
elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
return $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "");
}
}
//If we are accessing the file from localhost It has been set to NCR 
$ip=get_ip();
//"::1" signifies Localhost
if($ip=="::1"){
	$ip="182.73.13.202";
}
// USE AN API TO GET VISITOR DATA
//The data that is available on ip-api.com has been serialized so we need to unserialize it
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
//ALL OF THE INFORMATION GIVEN AVAILABLE BELOW IS AVAILABLE. HOWEVER IT IS NOT AS ACCURATE AS IP2LOCATION BUT ITS FREE
//echo "VISITOR ISP IS :".$query['isp']."<br/>";
//echo "VISITOR COUNTRY IS :".$query['country']."<br/>";
//echo "VISITOR COUNTRY CODE IS :".$query['countryCode']."<br/>";
//Class pocale is a class of the file locale.php
$hi = new pocale();
//country2locale is a function present in class pocale of locale.php
//it returns the most spoken languages in a country in which the first language is the one that is spoken the most and the remainig 
//decrease in order of popularity. The languages are of the form hi_IN en_IN where the first word before the _ signifies the 
//language and the second word signifies the country so we use explode to seperate hi form IN and en from IN  
$arr=explode("_",$hi->country2locale($query['countryCode'])); // Here we are collecting the list of languages followed by the country
print_r($arr);
//echo $hi->country2locale($query['countryCode'])."<br/>";
//echo "VISITOR REGION IS :".$query['region']."<br/>";
//echo "VISITOR REGION NAME IS :".$query['regionName']."<br/>";
//echo "VISITOR CITY IS :".$query['city']."<br/>";
//echo "VISITOR ZIP CODE IS :".$query['zip']."<br/>";
//echo "VISITOR LATITUDE IS :".$query['lat']."<br/>";
//echo "VISITOR TIMEZONE IS :".$query['timezone']."<br/>";
//echo "VISITOR ORG IS :".$query['org']."<br/>";
//echo "VISITOR AS IS :".$query['as']."<br/>";
} 
else
{
//If queries and executed succesfully
echo 'Something is wrong !';	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Click Proceed to Proceed
	<!-- Create a form which will pass the language we got from country2locale to the next page-->
<form method="POST" action="translate.php">
	<!-- Here we are passing the most famous language of a country as a hidden input to the next page-->
	<input type="hidden" name="sendvar" value="<?php echo $arr[0]?>">
	<button type="submit" name="submit">Proceed</button>
</form>
</body>
</html>