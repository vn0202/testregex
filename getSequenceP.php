<?php
include "parseData.php";
function getSequenceP($arr)
{
global $pattern_string_date;
$pattern_seq_date= '/(|[^\s\.][^\.\n]+)(sáng|chiều|trưa|hôm\s*(nay)*|ngày|vào)\s(\d+\/\d+(\/\d+)*)+([^\.]+((\d+\.\d+).+(\d+\.\d+))?[^\.]+\.|[^\.]*\.)/ui';
$pattern_tag_p= "/\<p[^\>]*\>([^>]+([^p]>?)*[^>]+)\<\/p\>/ui";
  $result=array();
  $numberUrl = count($arr);
        for($i = 0; $i < $numberUrl; $i++ )
        {
          $file_into_string = file_get_contents($arr[$i]);
          preg_match_all($pattern_tag_p,$file_into_string,$array_sequence_tag_p);
          $string_sequence_p= implode("",$array_sequence_tag_p[0]);
          // strip tag p
          $string_sequence_p_content=strip_tags($string_sequence_p);
      
          preg_match_all($pattern_seq_date,$string_sequence_p_content,$sequence_date);
          parseData($sequence_date[0],$result,$pattern_string_date,$arr[$i]);
           
        }
      return $result;
}
?>