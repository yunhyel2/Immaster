<?php 

if(!$_POST['Name']){ 
echo "<option value=''>선택하세요</option>";	
exit; 
} 

$zipfile = array(); 
$fp = fopen("./code.db", "r"); 
while(!feof($fp)) { 
$zipfile[] = fgets($fp, 4096); 
} 
fclose($fp); 
$cnt = count($zipfile); 

for($i=0; $i <= $cnt; $i++){ 
if(preg_match("/".$_POST['Name']."/",$zipfile[$i])){ 
$joso_ex = explode(" ",$zipfile[$i]); 
echo "<option>".$joso_ex[1]."</option>"; 
} 
} 
?> 
