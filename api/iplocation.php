<?php
function getRemoteIP(){
if( !empty( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ){
$REMOTE_ADDR = $_SERVER["HTTP_X_FORWARDED_FOR"];
$tmp_ip = explode( ",", $REMOTE_ADDR );
$REMOTE_ADDR = $tmp_ip[0];
}
return empty( $REMOTE_ADDR ) ? ( $_SERVER["REMOTE_ADDR"] ) : ( $REMOTE_ADDR ) ;
}


function getIPLoc($queryIP){  
  
  
$url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP;  
  
  
$ch = curl_init($url);  
  
  
curl_setopt($ch,CURLOPT_ENCODING ,'gb2312');  
  
  
curl_setopt($ch, CURLOPT_TIMEOUT, 10);  
  
  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // ��ȡ���ݷ���  
  
  
$result = curl_exec($ch);  
  
  
//$result = mb_convert_encoding($result, "utf-8", "gb2312"); // ����ת������������  
  
  
   curl_close($ch);  
  
  
preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray);  
$loc = $ipArray[1];  
return $loc;  
}  
?>