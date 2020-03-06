<?php

/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-19
 * Time: 01:26 AM
 */
ini_set('display_errors', 1);

echo '<br>Start<br>===================================<br>';

?>

<!--# print variable using short php tag-->
<p>NO. 1</p>
<p><?= $i=5;?></p>


<?php

# loop through this array : array(1,2,3,4) and print values between <p> tag using short php tag
echo '<p>NO. 2</p>';
$array_a = array(1,2,3,4);
foreach ($array_a as $value) {
    echo "<p>$value</p>";
}

# print these two variables values with it's data types $tall1 = "180"; $tall2 = 180;
echo '<p>NO. 3</p>';
$tall1 = "180"; 
$tall2 = 180;
var_dump($tall1,$tall2);
echo '<br>';


# create function and pass array as a parameter : array(5,2,1,4,3), sort array by order and print result
echo '<p>NO. 4</p>';
$not_sorted = array(5,2,1,4,3);
print_r($not_sorted);echo '<br>';

/**
 * sort_a function sort an array and print it
 * @param $array type $array
 */
function sort_a($array){
    sort($array); 
    print_r($array);
}

sort_a($not_sorted);
echo '<br>';

# create function and pass array as a parameter : array(1,2,3,4), remove number 3 and return the remaining
echo '<p>NO. 5</p>';
$nums =array(1,2,3,4);
print_r($nums);
echo '<br>';

// First Bad Way
echo '<p>NO. 5 First Bad Solution</p>';

/**
 * rm3 function remove 3 from array of numbers
 * @param $array type $array
 * @return $new type $array
 */
function rm3($array){
    $new = array();
    foreach ($array as $value) {
        if($value != 3){
            $new[] = $value;
        }
    }
    return $new;
}

print_r(rm3($nums));echo '<br>';

// Second Way is better
echo '<p>NO. 5 Second better solution</p>';
function rem3($array){
    unset($array[2]);
    return array_values($array);
}
print_r(rem3($nums));echo '<br>';


# create function and pass two arrays as a parameters: array(1,2,3,4); array(10,20,30,40); , merge them and print the result
echo '<p>NO. 6</p>';
$ar1 = array(1,2,3,4); 
$ar2 = array(10,20,30,40);
function arr_merg($array1, $array2){
    return array_merge($array1,$array2);
}
print_r(arr_merg($ar1, $ar2));



# create for loop to print 9 numbers from 100 to 90 without 95 like this 100,99,98
echo '<p>NO. 7</p>';
echo '<p>NO. 7 First Way using for loop</p>';
for($i=100; $i>90; $i--){
    if($i != 95){
        if($i!= 91){
            echo "$i, ";
        }else{
            echo "$i";
        }    
    }
}

echo '<p>NO. 7 Second Way using continue keyword</p>';
for($i=100; $i>90; $i--){
    if($i == 95){
        continue;
    }
    if($i!= 91){
        echo "$i, ";
    }else{
        echo "$i";
    }
}


# create for loop to print 5 numbers like this 15,45,135,405,1215
echo '<p>NO. 8</p>';
echo '<p>NO. 8 First Way : Bad Way depending on knowing the value of fifth number</p>';
for($i = 15;$i<1500;$i *=3){
    echo "$i, ";
}

echo '<p>NO. 8 Second Way : using array & count() & implode() & break</p>';
$arr = array();
for($i=15; $i>1; $i *=3){    
    if(count($arr) < 5){
        $arr[] = $i;
    } else {
        echo implode(', ', $arr);
        break;
    }
}



# what is the different between include and require - Google it ?
echo '<p>NO. 9</p>';
$diff = "Both try to get the file and use it in the code <br>";
$diff .= "But differ in case of not found the file <br>";
$diff .= "'include'=> not stop the code and continue to the next line of code <br>";
$diff .= "'require'=> stop executing the code<br>";

echo $diff;

# why using continue and break into a loop - Google it ?
echo '<p>NO. 10</p>';
$why  = "'continue'=> to go to the next step in loop directly without executing the rest of code in loop <br>";
$why .= "'break'=> to stop the loop in this line of code<br>";

echo $why;
echo '<br>===================================<br>End<br>';

?>