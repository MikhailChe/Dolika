<?php
function getRow($N){
	$fullRowE24 = array(1.0, 1.1, 1.2, 1.3, 1.5, 1.6, 1.8, 2.0, 2.2, 2.4, 2.7, 3.0, 3.3, 3.6, 3.9, 4.3, 4.7, 5.1, 5.6, 3.2, 6.8, 7.5, 8.2, 9.1, 10);
	$row = array();
	if($N<=24){
		$row = $fullRowE24;
		while(count($row)>$N){
			$row = shrink($row);
		}
	}else{
		for($i=1; $i<=$N; $i++){
			$row[] = round(exp(($i-1)/$N*log(10)), 2) ;
		}
	}
	
	return $row;
}
function shrink($row){
	$out = array();
	for($i=0; $i<count($row); $i++){
		if($i%2==0){
			$out[] = $row[$i];
		}
	}
	return $out;
}
function getNearestTo($number, $row, $mode = "middle"){
	$number = normalizeNumber($number);
	
	$nnum = $number['number'];
	
	$nval = 99999;
	$row = getRow($row);
	
	if($mode == "middle"){
		for($i=0; $i<count($row); $i++){
			if(abs($nnum - $row[$i]) < abs($nnum - $nval)){
				$nval = $row[$i];
			}
		}
	}elseif($mode == "up"){
		$nval = $row[count($row)-1];
		for($i=0; $i<count($row); $i++){
			if($row[$i]>$nnum){
				$nval = $row[$i];
				break;
			}
		}
	}

	$rnum = renormalizeNumber(array("number" => $nval, "degree" => $number['degree']));
	return $rnum;
}

function getRowNames(){
	return array(array("name" => "E192", "value" => 192), 
		array("name" => "E96", "value" => 96),
		array("name" => "E48", "value" => 48),
		array("name" => "E24", "value" => 24),
		array("name" => "E12", "value" => 12),
		array("name" => "E6", "value" => 6),
		array("name" => "E3", "value" => 3));
}

function normalizeNumber($number){
	$degree = 0;
	while($number >= 10){
		$number /= 10;
		$degree++;
	}
	while($number < 1){
		$number *= 10;
		$degree--;
	}
	$res['degree']=$degree;
	$res['number']=$number;
	return $res;
}
function renormalizeNumber($norm){
	$number = $norm['number'];
	$degree = $norm['degree'];
	while($degree!=0){
		if($degree < 0){
			$number /= 10;
			$degree ++;
		}else{
			$number *= 10;
			$degree --;
		}
	}
	return $number;
}
?>