<?php

$date = "";
if (key_exists('date', $_GET)) {
    $date = $_GET['date'];
}

$occurrenceMax = max(array_column($tags, '1'));

$res = '';
shuffle($tags);

foreach ($tags as $tag) {
    $style = 'style="';

    if ($tag['occurrences'] <= $occurrenceMax * 0.2) {
        $style .= 'font-size: 6pt;';
    } elseif ($tag['occurrences'] <= $occurrenceMax * 0.4) {
        $style .= 'font-size: 12pt; font-weight: 300';
    } elseif ($tag['occurrences'] <= $occurrenceMax * 0.6) {
        $style .= 'font-size: 18pt; font-weight: 500';
    } elseif ($tag['occurrences'] <= $occurrenceMax * 0.8) {
        $style .= 'font-size: 24pt; font-weight: 700';
    } else {
        $style .= 'font-size: 30pt; font-weight: 900';
    }

    $style .= '"';

    $res .= "<a " . $style . "href=\"" . $tag['url'] . "\">" . $tag['tagname'] . "</a>";
}

echo $res;
