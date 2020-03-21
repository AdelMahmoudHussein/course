<?php
$juice = "apple";

echo "He drank some juice made of $juice.<br>";

echo "He drank some juice made of ${juice}s.<br>";

echo "He drank some juice made of {$juice}s.<br>";

/* It will show
He drank some juice made of apple.
He drank some juice made of apples.
He drank some juice made of apples.
 */


$string = 'string';
echo "The character at index -2 is {$string[-2]}", PHP_EOL;
$string[-3] = 'o';
echo "Changing the character at index -3 to o gives $string.", PHP_EOL;


?>