<?php
function myUrlEncode($string) {
    $entities = array('%D8%A7', '%D8%A8', '%D9%BE', '%D8%AA', '%D8%AB', '%D8%AC', '%DA%86', '%D8%AD', '%D8%AE', '%D8%AF', '%D8%B0', '%D8%B1', '%D8%B2', '%DA%98', '%D8%B3', '%D8%B4', '%D8%B5', '%D8%B6', '%D8%B7','%D8%B8','%D8%B9','%D8%BA','%D9%81','%D9%82','%DA%A9','%DA%AF','%D9%84','%D9%85','%D9%86','%D9%88','%D9%87','%DB%8C','%D9%83','%D9%8A','%21', '%2A', '%27', '%28', '%29', '%3B', '%3A',  '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
    $replacements = array('ا', 'ب', "پ", "ت", "ث", "ج", "چ", "ح", "خ", "د", "ذ", "ر", "ز", "ژ", "س", "ش", "ص", "ض", "ط",'ظ','ع','غ','ف','ق','ک','گ','ل','م','ن','و','ه','ی','ك','ي','!', '*', "'", "(", ")", ";", ":",  "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
    return str_replace($entities, $replacements,$string);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Free!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="check.php" method="POST">
	<input type="text" name="Search" placeholder="Type ..." style='text-align:left;padding-left:10px'>
	<input type="submit" name="send" value="Search!">
</form>

<a href="http://127.0.0.1/search" style="text-decoration: none; color: darkred;font-size: 20px;">For Refresh Toch Me</a><br><br>
<?php
$files1 = scandir('searchs');
foreach ($files1 as $key) {
	$res = explode(' ',$key);
	if(isset($res[1])){
	if($res[1] == '1'){
		$path='searchs/'.$key;
		$myfile = fopen($path, "r") or die("Unable to open file!");
		if(filesize($path) > 0){
    		$li = fread($myfile,filesize($path));
			$ok = explode('123',$li);
			foreach($ok as $key){
                //53

                $dat = '<a id="resualt" href='.$key.'>'.str_replace('.org','',str_replace('.com','',str_replace('.html',' ' ,str_replace('pdf',' کتاب',str_replace('.zip','فایل فشرده',str_replace('.rar','فایل فشرده',str_replace('%40' ,'',myUrlEncode(mb_substr($key,53))))))))) .'</a><br><br>';
                echo $dat;
			}
	}
	fclose($myfile);
	}}}

?>
</body>
<script>
setTimeout(function(){
   window.location.reload(1);
}, 60000);
</script>

</html>
