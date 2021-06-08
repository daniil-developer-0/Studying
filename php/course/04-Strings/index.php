<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Working with Strings</title>
</head>
<body>
	<?php 
	$topic = 'Strings'; // Topic variable
	$heading = 'This page about ' . $topic; // Example of concatenation of strings
	echo "<h1>$heading</h1>";


		$info = 'My name is Daniil';
		echo "<p>Our string variable has a value: '$info'</p>";

		// To lowercase:
		echo "<p>Lowercase with <code>strtolower()</code> function: " . strtolower($info) . "</p>"; // Transform our string letters to lowercase

		// To uppercase:
		echo "<p>Uppercase with <code>strtoupper()</code> function: " . strtoupper($info) . "</p>"; // Transform our string letters to uppercase

		// String length:
		echo "<p>Length of our string with <code>strlen()</code> function: " . strlen($info) . "</p>"; // Get length of our string

		// Our string is array:
		echo "<p>Every string in PHP is an array (get first letter from our string with brackets): " . $info[0] . "</p>"; // Get the first letter from our string

		// Replace something:
		echo "<p>If you wanna replace some text in the string, then use <code>str_replace()</code>: " . str_replace('name', 'beautiful name', $info) . "</p>"; // Replace 'name' with 'beautiful name' (selfish, yup)

		// Substring
		echo "<p>Do yo wanna get some text from your variables without use of brackets? Use <code>substr()</code>: " . substr($info, 11, 6) . "</p>"; // Output will be: 'Daniil'. Substring from index 11 with length 6 (including letter with index 11) 

	 ?>
</body>
</html>