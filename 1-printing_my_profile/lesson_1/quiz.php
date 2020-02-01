<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-16
 * Time: 11:26 PM
 */
echo '<br>Start<br>===================================<br>';


# define variable (name) and assign value for your name as string
$name ="Adel";

# define variable (age) and assign value for your age as an integer
$age = 28;

# define variable (tall) and assign value for your tall as an float
$tall = 1.81;

# define variable (info) and concatenate all above variables to it
$info = "My name is $name, I am $age years old and my tall is $tall m.";

# print variable (info)
echo $info;echo '<br>';

# Can i use concatination to sum two numbers  - Google it ?
//No (in php)
echo "5"."3";echo '<br>';   // 53
echo "5"+"3";echo '<br>';   // 8 

echo '<br>===================================<br>End<br>';
