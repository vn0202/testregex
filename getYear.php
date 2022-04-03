<?php
   // function to get year from url:
      //get year which is the first 4 digits in \d\d\d....htm


function getYearFromUrl($url)
      {
        
        $pattern_string_digit_in_url= '/(\d+)\.htm/';

        preg_match_all($pattern_string_digit_in_url,$url,$string_digit_in_url);
        $getYear=implode("",$string_digit_in_url[1]);
        $getYear = str_split($getYear,4);
        $getYear= (string)($getYear[0]);
        return $getYear;      
      }


 
      ?>