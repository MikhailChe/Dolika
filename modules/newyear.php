<?php

$current = time();
$newyear = strtotime("1st January 2013 00:00:00");

$newyear = $newyear-$current;

$newyear = "До нового года осталось " . number_format($newyear, 0, '.', ' ') . " секунд.";

$static['body'] = $newyear;
$smarty->assign("module", "static");
$smarty->assign("static", $static);
?>