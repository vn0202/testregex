
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
        $a= 'https://dantri.com.vn/the-gioi/nga-chuyen-chien-loi-pham-cho-luc-luong-ly-khai-ukraine-20220314194542428.htm';
          $string=  file_get_contents($a);
          $getElementP= "/\<p\>([^\>]+)\<\/p\>/ui";
          
          preg_match_all($getElementP,$string,$out_put_p);
          
          $string2 = implode("",$out_put_p[1]);
         
           
          $stringContainDate= '/[^\.\n]+(\d+\/\d+(\/\d+)*)([^\.]+((\d+\.\d+).+(\d+\.\d+))?[^\.]+\.|[^\.]+\.)/';
        
        
           preg_match_all($stringContainDate,$string2, $result);
           foreach($result[0] as $val)
           {
             echo "$val <br/>";
           }
           
          

          
   
  
       ?>  
    <!-- <?php phpinfo();?> -->
      

      
       <!-- <?php
       $text =  "
       <div>
       <h1> Thái Bình</h1>
       <p>ngày 22/3/2020, Hôm nay thời tiết thật mát mẻ, không khí thật dễ chịu, tôi thích cảm giác này. Không gian rất mát mẻ. Từ 22/3 tôi sẽ trở thành 1 con người khác, nỗ lực hơn tôi của ngày hôm qua.Thật tuyệt vời khi bạn nỗ lực mỗi ngày.</p>

        </div>
        ";
        $stringContainDate= '/([^\n\.]+)(\d+\/\d+(\/\d+)*)(.+(\d+\.+).+|[^\.\n]+(\.)?)/';
        $string =strip_tags($text);
        // echo $string;
        preg_match_all($stringContainDate,$string,$result);
        print_r($result[0]);

        
       ?> -->


</body>
</html>