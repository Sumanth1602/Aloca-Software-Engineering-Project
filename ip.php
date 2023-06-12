<?php
  
  $publicIP = file_get_contents("http://ipecho.net/plain");
  echo $publicIP;
  
  $localIp = gethostbyname(gethostname());
  echo $localIp;

?>