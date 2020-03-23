<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

    </body>
</html>

<?php

echo '<br>###########################################<br>';
#############################################################################
echo '<pre>';


$juice = "apple";
    
echo "He drank some juice made of $juice.<br>";
    
echo "He drank some juice made of ${juice}s.<br>";
    
echo "He drank some juice made of {$juice}s.<br>";
    
/* It will show
He drank some juice made of apple.
He drank some juice made of apples.
He drank some juice made of apples.
 */

echo '<br>###########################################<br>';
#############################################################################


$string = 'string';
echo "The character at index -2 is {$string[-2]}", PHP_EOL;
$string[-3] = 'o';
echo "Changing the character at index -3 to o gives $string.", PHP_EOL;

echo '<br>###########################################<br>';
#############################################################################


$salary = [1,2,3,4,5,6];
    
for($i=0,$total=0,$ii=count($salary); $i<$ii; $i++){
    $total += $i;
}
echo '<h3>Total is : ' . $total . '</h3>';

echo '<br>###########################################<br>';
#############################################################################

$hex = 'FACE13FF';
echo base_convert($hex, 16, 2).'<br>';
echo hexdec($hex).'<br>';


echo round(5714.1234,-2).'<br>'.'<br>';

echo '<br>###########################################<br>';
#############################################################################

function odd($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "Even:\n";
print_r(array_filter($array2, "even"));

echo '<br>###########################################<br>';
#############################################################################

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
        . ' %3$s (%4$2d = %4$04b)' . "\n";

echo <<<EOH
 ---------     ---------  -- ---------
 result        value      op test
 ---------     ---------  -- ---------
EOH;


/*
 * Here are the examples.
 */

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "<br> Bitwise AND <br>";
foreach ($values as $value) {
    $result = $value & $test;
    printf($format, $result, $value, '&', $test);
}

echo '<br>###########################################<br>';
#############################################################################

$arr = ['first'=>'Ahmed','last'=>'Ali'];

array_push($arr,'Mohamed');
array_unshift($arr, '1');
print_r($arr);


echo '<br>###########################################<br>';
#############################################################################


echo '</pre>';
?>