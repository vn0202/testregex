
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
        $a='https://dantri.com.vn/the-gioi/nga-canh-bao-nguy-co-xung-dot-truc-tiep-voi-nato-20220324123314762.htm';
        $a2 ='https://dantri.com.vn/xa-hoi/sang-611-khong-khi-nhieu-noi-o-bac-bo-o-nhiem-nang-20201106085509973.htm';
       $a3='https://dantri.com.vn/the-gioi/khong-quan-nga-doi-chien-thuat-doi-pho-mua-ten-lua-ukraine-20220324152856030.htm';
        $a4= 'https://dantri.com.vn/the-gioi/nga-chuyen-chien-loi-pham-cho-luc-luong-ly-khai-ukraine-20220314194542428.htm';
         $arrUrl = array($a,$a2,$a3,$a4);
         $string="";
         $numberUrl = count($arrUrl);
        for($i= 0 ; $i < $numberUrl; $i++)
           {
              $string .=file_get_contents($arrUrl[$i]);
           }
      $pattern_p_date= "/\<p[^\>]*\>([^>]+([^p]>?)*[^>]+)\<\/p\>/ui";
      $pattern_seq_date= '/(|[^\s\.][^\.\n]+)(sáng|chiều|trưa|hôm\s*(nay)*|ngày|vào)\s(\d+\/\d+(\/\d+)*)+([^\.]+((\d+\.\d+).+(\d+\.\d+))?[^\.]+\.|[^\.]*\.)/ui';
      $pattern_date= '/(\d+\/\d+(\/\d+)*)/';
      $patter_id_url= '/(\d+)\.htm/';
      // get data from url $a and pass into array with format: data=>date,url=>url; content=>content
      function parseData($arr,&$result,$pattern_date,$a)
      {
      if($arr)
      {
        global $patter_id_url,$pattern_date;
        ///get year which is the first 4 digits in \d\d\d....htm
        preg_match_all($patter_id_url,$a,$id_url);
        $getYear=implode("",$id_url[1]);
        $getYear = str_split($getYear,4);
        $getYear= (string)($getYear[0]);
          $clength= count($arr);
         
          for($i =0 ; $i < $clength; $i++)
          {
              $subArray = array();
              preg_match_all($pattern_date,$arr[$i],$date);
              $date= implode(",",$date[0]);
              if(preg_match("/\d+\/\d+\/\d+/",$date)==0)
              {    
                    $date=$date."/".$getYear;
              }
              
              $subArray['date']= $date;
              $subArray['url'] = $a;
              $subArray['content'] = $arr[$i];
          
          array_push($result,$subArray);
          }
          
        }
      }
    function getSequencep($arr)
    {
    global $pattern_p_date,$pattern_date,$pattern_seq_date;
      $sequenceDate="";
      $result=array();
      $numberUrl = count($arr);
            for($i = 0; $i < $numberUrl; $i++ )
            {
              $string = file_get_contents($arr[$i]);
              preg_match_all($pattern_p_date,$string,$sequence_p);
              $sequence_p= implode("",$sequence_p[0]);
              // echo strip_tags($sequence_p);
              $sequence_p=strip_tags($sequence_p);
          
              preg_match_all($pattern_seq_date,$sequence_p,$sequence_date);
              parseData($sequence_date[0],$result,$pattern_date,$arr[$i]);
               
            }
          return $result;
    }
      $result= getSequencep($arrUrl);

     echo file_put_contents('test.txt',json_encode($result),FILE_USE_INCLUDE_PATH);
   
       ?>  
 
           
          
      
   
  
      
   
      

     
</body>
</html>