<?php

function getFuelByMass(int $mass): int
{
	$fuel = floor($mass / 3) - 2;

	if ($fuel <= 0)
		return (0);
	else
		return ($fuel);
}

function getTotalFuelByMass(int $mass): int
{
	$totalFuel = 0;
	$subMass = $mass;
	while (1) {
		$subFuel = getFuelByMass($subMass);
		if ($subFuel <= 0)
			break;
		$totalFuel += $subFuel;
		$subMass = $subFuel;
	}
	return ($totalFuel);
}

$sumFuel = 0;

$file = fopen("input", "r");

while (!feof($file)) {
	$mass = (int) fgets($file);
	if ($mass <= 0)
		continue;
	$sumFuel += getTotalFuelByMass($mass);
}
fclose($file);

echo "Sum of fuel requirements: " . $sumFuel . PHP_EOL;
