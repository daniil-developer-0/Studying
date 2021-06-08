<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Numbers in PHP</title>
</head>
<body>
<?php 
	$topic = 'Numbers'; // Topic variable
	$heading = 'This page about ' . $topic; // Example of concatenation of strings
	echo "<h1>$heading</h1>";

	echo '<p> There\'s two types of numbers: </p>';
	echo '<ol>
	<li>Whole numbers</li>
	<li>Decimal numbers</li>
	</ol>';

	echo "<h2>Ariphmetics</h2>";
	$first_num = 30;
	$second_num = 22;

	echo "<p>Our first num is ${first_num}, second is ${second_num}</p>"; // Another method of concatenation. It's better, because PHP re-concatenate string every '.'

	echo '<p>You can add one number to another: ' . ($first_num + $second_num) . 'or substract it: ' . ($first_num - $second_num) . '</p>';
	echo '<p>Also, you can divide it: ' . $first_num / $second_num . ', or mutliply it: ' . $first_num * $second_num . '. PHP also have division with remainder: ' . ($first_num % $second_num) . '</p>';

	echo "<h2>Mathematical functions</h2>";
	echo '<p>If you wanna get a absolute value of number, than use <code>abs()</code>: ' . abs(-100) . '</p>';
	echo '<p>If you wanna get a square root of number, than use <code>sqrt()</code> function: ' . sqrt(36) . '</p>';
 ?>
</body>
</html>