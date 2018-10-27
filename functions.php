<?php

// functions.php

// function basic

function add($v1, $v2) {

      $answer = $v1 + $v2;
      return $answer;
}

$result = add(1, 2);
echo $result;        // 3

// default argument
function hello($name, $greeting = 'Hello!') {

      echo $greeting.$name.'<br />';
}

hello('Bob', 'Goodmorning!');    // Goodmorning!Bob
hello('Tom');                    // Hello!Tom

// タイプヒンティング(引数の値を配列に限定する)
function array_output(array $var) {

      if (is_array($var)) {

            foreach ($var as $v) {

              echo $v;
            }
      }
}

$array = array(1, 2, 3);
array_output($array);    // 1 2 3
array_output(1);         // catchable fatal error;

// call function
$array = array(1, 2, 3, 4, 5);
$first_value = array_shift($array);
echo $first_value;    // 1(array_shitで配列の先頭を取得する)

// callback function
$array = array(1, 1.5, "2", true);
$new_array = array_map('strval', $array);    // 配列の値を文字列に変換

?>
