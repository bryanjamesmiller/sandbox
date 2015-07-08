<?php
function curl_get($url)
{
    return file_get_contents($url);
}


//First explode it, then remove tags....
$string = curl_get("http://www.extension.harvard.edu/academics/courses/course-catalog?search_api_views_fulltext=&page=15");
/*$string = '
    <td class="views-field views-field-field-course-display-name" >
        <a href="http://www.extension.harvard.edu/academics/courses/intensive-elementary-modern-standard-arabic-ii/23418" title="Intensive Elementary Modern Standard Arabic II - 23418">ARAB E-2 Intensive Elementary Modern Standard Arabic II</a>
        <div class="view view-secondary-instructors-per-course-search-results- view-id-secondary_instructors_per_course_search_results_ view-display-id-default view-dom-id-379fb400d5afeef4123f53ca325fec05">
            <div class="view-content">
                <div>
                    <a href="/faculty-directory/feryal-hijazi"><p>Feryal Hijazi </p></a>
                </div>
            </div>
        </div>
    </td>
    <td class="views-field views-field-field-term-display-name" >
        Spring Term 2016
    </td>
    <td class="views-field views-field-field-meeting-times" >
        Mondays, Wednesdays, 5:30-7:30 pm
    </td>
    <td class="views-field views-field-field-course-format" >
        On campus only
    </td>
    <td class="views-field views-field-field-crn" >
        23418
    </td>';
*/
//preg_split uses a REGULAR EXPRESSION to split a string.  Gives me more flexibility and power!
$pieces = explode('</', $string);
$newstring = array();
$j = 0;
for($i = 0; $i < sizeof($pieces); $i++){
    $newstring[$j] = $pieces[$i];
    $j++;
}

for($k = 0; $k < sizeof($newstring); $k++) {
//    echo "Array #" . $k . " is: " . strip_tags($newstring[$k]) . "<br>";
    echo strip_tags($newstring[$k]) . "<br>";
}


