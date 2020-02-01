<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-19
 * Time: 12:26 AM
 */
ini_set('display_errors', 1);

echo '<br>Start<br>===================================<br>';


# create function that takes two integer parameters ,multiply them, and return the result
function multi($a,$b){
    return $a*$b;
}

echo multi(3,4).'<br>';

# create function that takes this array as a parameter : array("A"=>"Ahmed","b"=>"bassem","c"=>"careem")
# loop through array, if the value is bassem print the index else return the count of items
$array_a = array("A"=>"Ahmed","b"=>"bassem","c"=>"careem");
function loop($arr){
    foreach ($arr as $key => $value) {
        if ($value == 'bassem'){
            echo $key;
        } else {
            return count($arr);
        }
    }
}

// Here we notice that hitting return will stop the function
echo loop($array_a).'<br>'; // output => 3 

// Another function
function loop2($arr){
    foreach ($arr as $key => $value) {
        if ($value == 'bassem'){
            echo $key;
            break;
        }
    }    
    return count($arr);
}

// Here We loop on array for bassem and when found print the key for it 
// then stop the loop by using break & return the count 
echo loop2($array_a).'<br>'; // output => b3 


# create function that takes this array as a parameter : array("A"=>"Ahmed","b"=>"bassem","c"=>"careem")
# loop through array,  return the index as a new array value like this :  array("A","b","c")
function loop3($arr){
    $ar = array();
    foreach ($arr as $key=>$value) {
        $ar[] = $key;
    }
    return $ar;
}

print_r(loop3($array_a));

# create function that takes this array as a parameter : array(1,2,3,4)
# loop through array , multiply all values and return the result
// شرح المهندس احمد فخر في الفيديو عن السؤال دة غير اللي مكتوب في السؤال 
$nums = array(1,2,3,4);
function loop4($arr){
    $product = 1; // as it is (المحايد الضربي)
    foreach ($arr as $value) {
        $product *= $value;
    }
    return $product;
}

echo '<br>' . loop4($nums). '<br>';

# create function that takes this array as a parameter :
# array("fruit"=>"orange","country"=>"egypt","animal"=>"cat","device"=>"computer")
# use switch to print every array element as a string (key = value) like this : device = computer
$info = array("fruit"=>"orange","country"=>"egypt","animal"=>"cat","device"=>"computer");
foreach ($info as $key => $value) {
    // it is stupid use of switch as I think Now!?
    switch ($key) {
        case $key:
            echo "$key = $value<br>";
            break;
    }
}

# Can we use Logical Operators with switch ,how - Google it ?
// Yes Of Course
$a = 5;
$b = -2;

switch ($b) {
    case ($a>0 && $b>0):
        echo "Both Positive<br>";
        break;
    
    case ($a<0 && $b <0):
        echo "Both Negative<br>";
        break;
    
    case ($a==0 && $b ==0):
        echo "Both Zero<br>";
        break;
    
    default:
        echo "They are Mix<br>";
        break;
}

echo '<br>===================================<br>End<br>';