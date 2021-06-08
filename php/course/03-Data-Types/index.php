<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data types in PHP</title>
</head>
<body>
<?php 
	$topic = 'Data Types'; // Topic variable
	$heading = 'This page about ' . $topic; // Example of concatenation of strings
	echo "<h1>$heading</h1>";

	// Data Types
	$string = 'A String Variable';
	$number = 40; // A number variable
	$float = 40.0; // A float number variable
	$bool = false;
	// null - variable without an value (undefined in Javascript)

	// Output
	echo "<p>String variable: $string</p>";
	echo "<p>Number variable: $number</p>";
	echo "<p>Floating number variable: $float</p>";
	echo "<p>Boolean variable: $bool</p>";
 ?>
</body>
</html>