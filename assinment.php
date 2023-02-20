<?php

/* 1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.) */

function my_sort($arr) {
    usort($arr, function($a, $b) {
        return strlen($a) - strlen($b);
    });
    return $arr;
}

$myArray = array("apple", "banana", "cherry", "date");
$sortedArray = my_sort($myArray);
print_r($sortedArray);


/* 
    2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.

*/

function concatenateStrings($string1, $string2) {
    $length1 = strlen($string1);
    $length2 = strlen($string2);
    $result = "";
  
    for ($i = $length1 - 1; $i >= 0; $i--) {
      $result = $string1[$i] . $result;
      if ($i == $length1 - $length2) {
        $result = $string2 . $result;
        break;
      }
    }
  
    return $result;
  }
  
$string1 = "Hello";
$string2 = "world";
$result = concatenateStrings($string1, $string2);
echo $result; 


/* 3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array */


function removeFirstAndLast($arr) {
    array_shift($arr);  
    array_pop($arr);    
    return $arr;       
  }
  
  $arr = array(1, 2, 3, 4, 5);
  $result = removeFirstAndLast($arr);
  print_r($result); 

  /* 
        4.Write a PHP function to check if a string contains only letters and whitespace.
  
  */

  function containsOnlyLettersAndWhitespace($str) {
    return preg_match('/^[a-zA-Z\s]+$/', $str);
  }

  $str = "Hello, world!";

 $result = containsOnlyLettersAndWhitespace($str);

echo $result; 

/* 
        5.Write a PHP function to find the second largest number in an array of numbers.
*/


function findSecondLargest($arr) {
    
    $largest = $arr[0];
    $secondLargest = $arr[0];
  
    foreach ($arr as $num) {
      if ($num > $largest) {
        $secondLargest = $largest;
        $largest = $num;
      } elseif ($num > $secondLargest && $num != $largest) {
        $secondLargest = $num;
      }
    }
  
    return $secondLargest;
  }

  $arr = array(3, 6, 2, 8, 5);
$result = findSecondLargest($arr);
echo $result; // Output: 6

  


?> 