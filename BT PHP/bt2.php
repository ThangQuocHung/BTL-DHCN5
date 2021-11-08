<?php
         $url = 'https://github.com/ThangQuocHung/BTL-DHCN5';  
		 $url=parse_url($url);  
		 echo 'Scheme : '.$url['scheme']."<br>";  
		 echo 'Host : '.$url['host']."<br>";  
		 echo 'Path : '.$url['path']."<br>";
?>