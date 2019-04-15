<?php

function reduceNumber($input) { 
	while ($input > 9 ) {
		$tempSubName = 0;
		$subNameValue = 0;
		$tempSubName = str_split($input);		
		for ($x = 0, $y = count($tempSubName); $x < $y; $x++)
			{$subNameValue = $subNameValue + $tempSubName[$x];}
		$input = $subNameValue;	
	}
return $input;
}

$errorMessageLife = "<span class='errorMessage'>Enter numbers only.</span>";
$errorMessageName = "<span class='errorMessage'>Enter letters and spaces only.</span>";

if (isset($_POST['inputNumber'])) { 
	if (preg_match('/[^a-zA-Z ]+/', $_POST['inputNumber'], $matches)) { $nameInput = 0; $destinyNumber = $errorMessageName;}
	else { $nameInput = $_POST['inputNumber']; }
}

$inputtoArr = explode(" ", $nameInput);
$countNames = count($inputtoArr);
$nameSum = array();
$totalNameValue = array();
$nameDisplay = strip_tags($nameInput);

for($i = 0, $c = $countNames; $i < $c; $i++) {
	$currentName = $inputtoArr[$i];
	$currentNameValue = 0;
	$tempName = strtolower($currentName);
	$tempNameArr = str_split($tempName);
	for ($j = 0, $d = count($tempNameArr); $j < $d; $j++) { 
		if($tempNameArr[$j] == "a" || $tempNameArr[$j] == "j" || $tempNameArr[$j] == "s") { $nameSum[$i] = $nameSum[$i] + 1; }
		if($tempNameArr[$j] == "b" || $tempNameArr[$j] == "k" || $tempNameArr[$j] == "t") { $nameSum[$i] = $nameSum[$i] + 2; }
		if($tempNameArr[$j] == "c" || $tempNameArr[$j] == "l" || $tempNameArr[$j] == "u") { $nameSum[$i] = $nameSum[$i] + 3; }
		if($tempNameArr[$j] == "d" || $tempNameArr[$j] == "m" || $tempNameArr[$j] == "v") { $nameSum[$i] = $nameSum[$i] + 4; }
		if($tempNameArr[$j] == "e" || $tempNameArr[$j] == "n" || $tempNameArr[$j] == "w") { $nameSum[$i] = $nameSum[$i] + 5; }
		if($tempNameArr[$j] == "f" || $tempNameArr[$j] == "o" || $tempNameArr[$j] == "x") { $nameSum[$i] = $nameSum[$i] + 6; }
		if($tempNameArr[$j] == "g" || $tempNameArr[$j] == "p" || $tempNameArr[$j] == "y") { $nameSum[$i] = $nameSum[$i] + 7; }
		if($tempNameArr[$j] == "h" || $tempNameArr[$j] == "q" || $tempNameArr[$j] == "z") { $nameSum[$i] = $nameSum[$i] + 8; }
		if($tempNameArr[$j] == "i" || $tempNameArr[$j] == "r" ) { $nameSum[$i] = $nameSum[$i] + 9; }
	}
	$sumCurrentName = str_split($nameSum[$i]);
	for ($k = 0, $e = count($sumCurrentName); $k < $e; $k++) {
		$currentNameValue = $currentNameValue + $sumCurrentName[$k];
	}
	$totalNameValue[$i] = reduceNumber($currentNameValue);
}	

for ($m = 0, $g = count($totalNameValue); $m < $g; $m++) {
	$destinyNumber = $destinyNumber + $totalNameValue[$m];
}

if ($destinyNumber == 0) { $destinyNumber = $errorMessageName; }
else { $destinyNumber = reduceNumber($destinyNumber); }

if (isset($_POST['inputLife'])) { 
	if (preg_match('/[^0-9]+/', $_POST['inputLife'], $matches)) { $lifeInput = 0; $lifeNumber = $errorMessageLife;}
	else { $lifeInput = $_POST['inputLife']; }
}
$lifeNumber = 0;
$tempLifeNumber = str_split($lifeInput);
$numberDisplay = strip_tags($lifeInput);
for ($p = 0, $q = count($tempLifeNumber); $p < $q; $p++) { $lifeNumber = $lifeNumber + $tempLifeNumber[$p]; }
$lifeNumber = reduceNumber($lifeNumber);
if ($lifeNumber == 0) { $lifeNumber = $errorMessageLife;}

?>
