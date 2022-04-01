<?php
include "getYear.php";
function parseData($arr,&$result,$pattern_string_date,$url)
{
if($arr)
{
$getYear = getYearFromUrl($url);
    $clength= count($arr);
    for($i =0 ; $i < $clength; $i++)
    {
      // creat a new sub array to save data for each sequence
        $subArray = array();
        preg_match_all($pattern_string_date,$arr[$i],$date);
        $date= implode(",",$date[0]);
        if(preg_match("/\d+\/\d+\/\d+/",$date)==0)
        {    
              $date=$date."/".$getYear;
        }
        $subArray['date']= $date;
        $subArray['url'] = $url;
        $subArray['content'] = $arr[$i];
    array_push($result,$subArray);
    }
  }
}
?>