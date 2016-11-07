<?php
header('Content-Type:image/png');
$url = "1.png";//图片链接
$ch = curl_init();
//Cookie:PHPSESSID=121b1127dcded8702c6a1e702c40eca4
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
curl_setopt($ch, CURLOPT_TIMEOUT,0);//忽略超时
curl_setopt($ch, CURLOPT_NOBODY, false);
$str = curl_exec($ch);
curl_close($ch);
?>