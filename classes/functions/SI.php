<?php
function fromSImetrik($number){
	$pres = array(
				array("pre"=>"мк", "value"=>1E-6),
				array("pre"=>"k", "value"=>1E3),
				array("pre"=>"к", "value"=>1E3),
				array("pre"=>"M", "value"=>1E6),
				array("pre"=>"М", "value"=>1E6),
				array("pre"=>"G", "value"=>1E9),
				array("pre"=>"Г", "value"=>1E9),
				array("pre"=>"T", "value"=>1E12),
				array("pre"=>"Т", "value"=>1E12),
				array("pre"=>"m", "value"=>1E-3),
				array("pre"=>"м", "value"=>1E-3),
				array("pre"=>"u", "value"=>1E-6),
				array("pre"=>"n", "value"=>1E-9),
				array("pre"=>"н", "value"=>1E-9),
				array("pre"=>"p", "value"=>1E-12),
				array("pre"=>"п", "value"=>1E-12)
			);
	for($i=0; $i<count($pres); $i++){
		if(substr($number, strlen($number)-strlen($pres[$i]['pre']))==$pres[$i]["pre"]){
			$number = ((float) substr($number, 0, strlen($number)-1))*$pres[$i]["value"];
			break;
		}
	}
	return $number;
}

function toSImetrik($number){
	if(strlen($number)<=1){
		return $number;
	}
	$tdivs = 0;
	if((float)$number<=0){
		return $number;
	}
	while($number>=1000){
		$number /= 1000;
		$tdivs++;
	}
	while($number < 1){
		$number *= 1000;
		$tdivs--;
	}
	$pres = array(
				array("pre"=>"k", "value"=>1),
				array("pre"=>"к", "value"=>1),
				array("pre"=>"M", "value"=>2),
				array("pre"=>"М", "value"=>2),
				array("pre"=>"G", "value"=>3),
				array("pre"=>"Г", "value"=>3),
				array("pre"=>"T", "value"=>4),
				array("pre"=>"Т", "value"=>4),
				array("pre"=>"m", "value"=>-1),
				array("pre"=>"м", "value"=>-1),
				array("pre"=>"u", "value"=>-2),
				array("pre"=>"мк", "value"=>-2),
				array("pre"=>"n", "value"=>-3),
				array("pre"=>"н", "value"=>-3),
				array("pre"=>"p", "value"=>-4),
				array("pre"=>"п", "value"=>-4)
			);
	for($i=0; $i<count($pres); $i++){
		if($tdivs == $pres[$i]["value"]){
			$number = $number . $pres[$i]["pre"];
			break;
		}
	}
	return $number;
}

function generateHintTable(){
	return 
	'<table class="pres">
	<tr>
		<td>
			T (Тера)
		</td>
		<td>
			10<sup>12</sup>
		</td>
	</tr>
	<tr>
		<td>
			G / Г (Гига)
		</td>
		<td>
			10<sup>9</sup>
		</td>
	</tr>
	<tr>
		<td>
			M (Мега)
		</td>
		<td>
			10<sup>6</sup>
		</td>
	</tr>
	<tr>
		<td>
			k / к (Кило)
		</td>
		<td>
			10<sup>3</sup>
		</td>
	</tr>
	<tr>
		<td>
			m / м (Мили)
		</td>
		<td>
			10<sup>-3</sup>
		</td>
	</tr>
	<tr>
		<td>
			u / мк (Микро)
		</td>
		<td>
			10<sup>-6</sup>
		</td>
	</tr>
	<tr>
		<td>
			n / н (Нано)
		</td>
		<td>
			10<sup>-9</sup>
		</td>
	</tr>
	<tr>
		<td>
			p / п (Пико)
		</td>
		<td>
			10<sup>-12</sup>
		</td>
	</tr>
</table>';
}
?>