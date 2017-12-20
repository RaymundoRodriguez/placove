<?php
$oldpass=$_REQUEST['oldpass'];
$newpass=sha1($_REQUEST['newpass']);
//echo 'a94187c0a35e4c8d4f150fbe918111b0';
//$newpass=sha1('platsimbiosys');
$compara = md5("$newpass");
//echo '<br/>'.$compara;
if($compara==$oldpass)
{
    echo 'si';
}
else{
    return 'no';  
} 

?>
