<?php

function curl_get($url)
{
    return file_get_contents($url);
}

$string = curl_get("http://www.extension.harvard.edu/academics/courses/course-catalog/");
//echo(strip_tags($string));

//If you don't use the strip_tags function, you can still parse the $string - the only reason
//why it shows up as marked in the browser is because the browser is just interpreting the tags,
//but the tags can still be parsed just within the php code.  For instance:
$string = curl_get("http://www.extension.harvard.edu/academics/courses/course-catalog/");

//preg_split uses a REGULAR EXPRESSION to split a string.  Gives me more flexibility and power!
$pieces = preg_split('/(?=[A-Z])/', strip_tags($string));
$newstring = array();
$j = 0;
for($i = 0; $i < sizeof($pieces); $i++){
    if($pieces[$i] == "Jameel") {
        $j = $j - 1;
        $newstring[$j] = $pieces[$i]  . " " . $pieces[$i - 2] . " " . $pieces[$i - 1];
        $i++;
    } else if($pieces[$i] == "Yvette"){
        $j = $j - 1;
        $newstring[$j] = $pieces[$i]  . " " . $pieces[$i - 2] . " " . $pieces[$i - 1];
        $i++;
    } else {
        $newstring[$j] = $pieces[$i + 1] . " " . $pieces[$i];
    }
    $i++;
    $j++;
}

for($k = 0; $k < sizeof($newstring); $k++) {
    echo $newstring[$k] . "<br>";
}