<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 * Solved by Apache NetBeans 11.2
 * User: Adel.Mahmoud
 * Date: 2020-01-19
 * Time: 11:26 PM
 */
ini_set('display_errors', 1);

echo '<br>Start<br>===================================<br>';

# remove number 3 from array(1,2,3,4,5,6,7,8,9,10) using unset function and print it after remove
echo '<p>NO. 1</p>';
echo "<p>NO. 1 First Solution remove item with its index 'so no index is 2'</p>";
$arr1 = array(1,2,3,4,5,6,7,8,9,10);
print_r($arr1);
echo '<br>';
unset($arr1[2]);
print_r($arr1);


echo "<p>NO. 1 Second Solution remove item then reindex items 'so index 2 is found'</p>";
$arr2 = array(1,2,3,4,5,6,7,8,9,10);
print_r($arr2);
echo '<br>';
unset($arr2[2]);
$arr2 = array_values($arr2);
print_r($arr2);




# loop using while to print preceding array as 1_2_4_5 , break and continue
echo '<p>NO. 2</p>';
echo '<p>NO. 2 First Solution Assume that we have the array complete & using break</p>';
$arr3 = array(1,2,3,4,5,6,7,8,9,10);
$index = 0;
$txt = "";
while(true){
    if($arr3[$index] == 5){
        $txt .= $arr3[$index];    
        echo $txt;
        break;
    } elseif ($arr3[$index] == 3) {
        $index++;
        continue;
    }else{
    $txt .= $arr3[$index]."_";
    }
    $index++;
}



echo '<p>NO. 2 Second Solution Assume that we have the array complete & No need to break</p>';
$index = 0;
$txt = "";
while($index < 5){
    if($arr3[$index] == 5){
        $txt .= $arr3[$index];    
        echo $txt;
    } elseif ($arr3[$index] == 3) {
        $index++;
        continue;
    }else{
    $txt .= $arr3[$index]."_";
    }
    $index++;
}



echo '<p>NO. 2 Third Solution Assume that we have the array arr1 which without index 2 </p>';
$index = 0;
$txt = "";
while(true){
    if($arr1[$index] == 5){
        $txt .= $arr1[$index];    
        echo $txt;
        break;
    } elseif ($index == 1) {
        $txt .= $arr1[$index]."_";
        $index += 2;
        continue;
    } elseif ($arr1[$index] == 3) {
        $index++;
        continue;
    }else{
    $txt .= $arr1[$index]."_";
    }
    $index++;
}



echo '<p>NO. 2 Fourth Solution Assume that we have the array arr1 which without index 2 & using check of index exist (try catch)</p>';
echo "<p>It prints '1_2__4_5'  not  '1_2_4_5' why ?</p>";

$index = 0;
$txt = "";
while(true){
    try {
       $err = $arr1[$index];    
    }catch (Exception $exc) {
        $index++;
        continue;
    }
    if($arr1[$index] == 5){
        $txt .= $arr1[$index];    
        echo $txt;
        break;
    }
    $txt .= $arr1[$index]."_";
    $index++;    
}


# loop using while to print numbers from 0 to 10 using while and Incrementing Operators (++)
echo '<p>NO. 3</p>';
$i = 0;
while ($i<=10){
    echo $i;
    $i++;
}


# print array(1,2,3,4,5) as 1-2-3-4-5 using implode
echo '<p>NO. 4</p>';
$arr4 = array(1,2,3,4,5);
echo implode('-', $arr4);



# convert "1/2/3/4/5" string to array using explode then print it
echo '<p>NO. 5</p>';
print_r(explode('/', "1/2/3/4/5"));



# loop through array(1,2,3,4,5) and print as 2,3,6,8,10 using for loop
echo '<p>NO. 6</p>';
echo '<p>NO. 6 First Solution using foreach loop</p>';
$arr5 = array(1,2,3,4,5);
$arr6 = array();
foreach ($arr5 as $value){
    if($value < 3){
        $arr6[] = $value + 1;
    } else {
        $arr6[] = $value * 2;
    }
}
echo implode(', ', $arr6);


echo '<p>NO. 6 Second Solution using for loop</p>';
$arr7 = array(1,2,3,4,5);
$arr8 = array();
for ($i = 1; $i <= count($arr7);$i++){
    if($i < 3){
        $arr8[] = $i + 1;
    } else {
        $arr8[] = $i * 2;
    }
}
echo implode(', ', $arr8);



# read line 20 on the quotes.txt file and print it
echo '<p>NO. 7</p>';
$rfile = file('quotes.txt');
echo $rfile[19]; // line 20 is the index of 19 as we start from zero




# remove line 30 on the quotes.txt file
echo '<p>NO. 8</p>';
echo '<p>NO. 8 First Solution delete line and left it empty</p>';
$rfile2 = file('quotes.txt');
unset($rfile2[29]);
file_put_contents('quotes.txt', $rfile2);



echo '<p>NO. 8 First Solution delete line and push lines up</p>';
$rfile3 = file('quotes.txt');
unset($rfile3[29]);
$rfile3 = array_values($rfile3);
file_put_contents('quotes.txt', $rfile3);


# add your name to the end quotes.txt file
echo '<p>NO. 9</p>';
$rfile4 = fopen('quotes.txt', 'a');
fwrite($rfile4, "\nADEL\n");
fclose($rfile4);



// what is the difference between while and do while loop -- google it ?
echo '<p>NO. 10 </p>';
echo '<p>Both make loop, But</p>';
echo '<p>do while make one turn at least even if the condition is false</p>';





echo '<br>===================================<br>End<br>';