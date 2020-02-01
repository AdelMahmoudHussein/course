<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-18
 * Time: 10:05 PM
 */
ini_set('display_errors', 1);

echo '<br>Start<br>===================================<br>';

# define variable (gender) and assign value for your gender
$gender = 'male';

# use if condition to check if gender = male then return yes or return no
if($gender == 'male'){
    echo 'yes<br>';
} else {
    echo 'no<br>';
}

# use ternary operator to apply the same condition
echo ($gender == 'male')? 'yes<br>': 'no<br>';

# define array (prices) and assign integer value from 100 to 1000 range
$prices = array(101,180,240,403,505,790,820,900,930,999);

#  print prices and gender  using var_dump
var_dump($prices, $gender);
echo '<br>';

# loop through prices array using foreach and print only prices from 500 to 900 using if
foreach ($prices as $price){
    if($price >= 500 && $price<=900){
        echo "$price<br>";
    }
}

# loop through prices array using foreach and print (prices - 100)
foreach ($prices as $price){
    echo $price-100 .'<br>';
}


# print how many elements in prices array using count function
echo count($prices).' elements<br>';

# Quiz
// - how to Make $size_recommendation = -1 using type casting ?

// We Will Use (int) casting

$tall = 178.5;
$weight = "80";

$size_diff = (int) ($tall - 100 - $weight) ;
if($size_diff < 0){
    $size_recommendation =  "You should loose $size_diff Kg." ;
}elseif($size_diff == 0){
    $size_recommendation =  "Your weight is Great " ;
}else{
    $size_recommendation =  "You should weight $size_diff Kg." ;
}


echo "
Tall:$tall </br> 
Weight:$weight </br> 
Size Recommendation : $size_recommendation </br>";


/*
switch ($size_diff) {
    case ($size_diff > 20):
        $size_recommendation = "Too skinny, You should weight $size_diff Kg." ;
        break;
    
    case ($size_diff > 5):
        $size_recommendation = "Skinny, You should weight $size_diff Kg." ;
        break;
    
    case ($size_diff < -20):
        $size_recommendation = "Too fat, You should loose $size_diff Kg." ;
        break;
    
    case ($size_diff < -5):
        $size_recommendation = "Fat, You should loose $size_diff Kg." ;
        break;
    
    default:
        $size_recommendation = "Your weight is Great " ;
        break;
}
*/


        
echo '<br>===================================<br>End<br>';