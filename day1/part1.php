<?php

function getFuelByMass(int $mass): int
{
	$fuel = floor($mass / 3) - 2;

	if ($fuel <= 0)
		return (0);
	else
		return ($fuel);
}

$sumFuel = 0;

$file = fopen("input", "r");

while (!feof($file)) {
	$mass = (int) fgets($file);
	if ($mass <= 0)
		continue;
	$sumFuel += getFuelByMass($mass);
}
fclose($file);

echo "Sum of fuel requirements: " . $sumFuel . PHP_EOL;
