
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
       <?php
     $a= 'https://dantri.com.vn/doi-song/electeka-thuong-hieu-gia-dung-cao-cap-dan-mach-ra-mat-tai-viet-nam-20220318201447512.htm';
          $string=  file_get_contents($a);
          $stringContainDate= '/([^\n\.]+)(\d+\/\d+(\/\d+)*)(.+(\d+\.+).+|[^\.\n]+(\.)?)/';
        preg_match_all($stringContainDate,$string,$result);
       
       foreach($result as $val)
       {
         echo "$val \n";
       }
          
       ?>


</body>
</html>