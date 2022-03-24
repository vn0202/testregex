
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
          $pattern_p_date= "/\<p\>([^>]+([^p]>?)*[^>]+)\<\/p\>/ui";
          $pattern_seq_date= '/[^\.\n\s][^\.]+(\d+\/\d+(\/\d+)*)+([^\.]+((\d+\.\d+).+(\d+\.\d+))?[^\.]+\.|[^\.]+\.)/';
          $pattern_date= '/(\d+\/\d+(\/\d+)*)/';
        preg_match_all($pattern_p_date,$string,$sequence_p);
      $sequence_p= implode("",$sequence_p[0]);
      $sequence_p=strip_tags($sequence_p);
      preg_match_all($pattern_seq_date,$sequence_p,$sequence_date);
    //   print_r($sequence_date[0]);
      function parseData($arr,$pattern_date,$a)

      {
          $clength= count($arr);
          $newArray=array();
          for($i =0 ; $i < $clength; $i++)
          {
              $subArray = array();
              preg_match_all($pattern_date,$arr[$i],$date);
              $date= implode(",",$date[0]);
              $subArray['date']= $date;
              $subArray['url'] = $a;
              $subArray['content'] = $arr[$i];
          
          array_push($newArray,$subArray);
          }
          return $newArray;

      }
      $result= parseData($sequence_date[0],$pattern_date,$a);

     echo file_put_contents('test.txt',json_encode($result,JSON_UNESCAPED_UNICODE),FILE_USE_INCLUDE_PATH);

         
        
     
      
           
       ?>  
 
           
          
      
   
  
      
    <!-- <?php phpinfo();?> -->
      

     
</body>
</html>