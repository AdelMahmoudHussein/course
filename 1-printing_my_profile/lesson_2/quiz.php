<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-18
 * Time: 4:26 PM
 */
echo '<br>Start<br>===================================<br>';

# define Indexed array (colors) and assign value for 4 color's names
$colors = array('white', 'red', 'green', 'blue' );

# define Associative array (countries) and assign 4 countries as key =(character) , value = (country name)
$countries = array('EG'=>'Egypt', 'KSA'=>'kingdom of saydi arabia',
    'LE'=>'Lebanon', 'KW'=>'Kuwait');

# add new element to colors array
$colors[]= 'black';

# print the last element from colors array
echo $colors[4];echo '<br>';

echo $colors[count($colors)-1];echo '<br>'; // if I do not know the number of items 

// it is a Wrong solution not just a bad one as it change the original array
echo array_reverse($colors)[0];echo '<br>'; // if I do not know the number of items 

// The best solution is by using end function
echo end($colors);echo '<br>'; 

#  change the second element from  countries array
$countries['KSA'] = 'Saudia';

# print the second element from  countries array
echo $countries['KSA'];echo '<br>';

$countries['IR'] = 'Iraq';

# print countries array with foreach and add a comma after every country
foreach ($countries as $key => $value) {
    echo "$value, ";
}
echo '<br><br>';

foreach ($countries as $key => $value) {
    echo "$key: $value, ";
}
echo '<br><br>';

# print array with commas without loop php - Google it ?
echo implode(', ', $colors);echo '<br>';

echo implode(', ', $countries);echo '<br>';

echo '<br>===================================<br>End<br>';