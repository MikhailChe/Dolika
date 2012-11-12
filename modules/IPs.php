<?php
global $mysql;
$IPs = $mysql->result("SELECT `number`, `date`, UNIX_TIMESTAMP() AS `current` FROM IPs ORDER BY `id` DESC LIMIT 0,1");
if( ($IPs == 0) || ( (int)($IPs['date'] + 3600) < (int)$IPs['current'] ) ){
	$file = fopen ("ftp://ftp.ripe.net/pub/stats/ripencc/delegated-ripencc-extended-latest", "r");
	if (!$file) {
		die("<p>Невозможно прочитать файлы с сервера\n");
	}
	$summ = 0;
	while (!feof ($file)) {
		$line = fgets ($file);
		/* This only works if the title and its tags are on one line */
		if (strpos($line, "avail")!=FALSE) {
			if(strpos($line, "ipv4")!=FALSE) {
				$expl = explode("|", $line);
				$summ += $expl[4];
			}
		}
	}
	$mysql->query("INSERT INTO IPs(`number`, `date`) VALUES ('" . $summ . "', UNIX_TIMESTAMP() )");
	fclose($file);
}else{
	$summ = $IPs['number'];
}
$countme = $mysql->results("SELECT `date` FROM `IPs` GROUP BY FROM_UNIXTIME(`date`, '%d.%m.%y')");
$count = count($countme);
unset($countme);
$addr = $mysql->results("SELECT `date` AS `date_order`, FROM_UNIXTIME(`date`, '%d.%m.%y') AS `date`, `number` FROM `IPs`  GROUP BY FROM_UNIXTIME(`date`, '%d.%m.%y') ORDER BY `date_order` ASC, `id` ASC LIMIT " . ($count - 10) . ", 10");
foreach($addr AS $key=>$value){
	$addr[$key]['number'] = number_format($value['number'], 0, '.', ' ');
}

$spc = $mysql->results("SELECT `date` AS `date_order`, `number` FROM `IPs` WHERE `date`>(UNIX_TIMESTAMP()-60*60*24*8) ORDER BY `date_order` ASC, `id` ASC");
$t1 = $spc[0];

$t2 = $spc[count($spc)-1];
$speed = abs(((int)($t2['number']-$t1['number']))/((int)($t2['date_order']-$t1['date_order'])));

$endtime = round($t2['date_order'] + ($t2['number'] / $speed));

$endday = $mysql->result("SELECT FROM_UNIXTIME('" . $endtime . "', '%d.%m.%Y') AS `date`");

$endday = $endday['date'];

$smarty->assign('addr', $addr);
$smarty->assign('summ', number_format($summ, 0, '.', ' '));
$smarty->assign('speed', number_format(round($speed*60*60*24), 0, '.', ' '));
$smarty->assign('endday', $endday);
$smarty->assign('module', 'ipv4/index');
?>