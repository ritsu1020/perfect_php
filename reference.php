<?php

// reference.php
$a = 10;
$ref = &$a;    // 10
$ref = 20;
echo $a;    // 20

$a = 10;
$c = 20;
$ref = &$a;    // 10
$ref = &$c;    // 20
$ref = 30;
echo $a;    // 10
echo $c;    // 30 $cに再代入される

function array_pass($array) {

      $array[0] *=2;
      $array[1] *=2;

}

function array_pass_ref(&$array) {

      $array[0] = *2;
      $array[1] = *2;

}

$a = 10;
$b = 20;

$array = array($a, &$b);
array_pass($array);

echo $a;  // 10
echo $b;  // 40

$a = 10;
$b = 20;
$array = array($a, $b);
array_pass_ref($array);

echo $a;  // 10
echo $b;  // 20

// リファレンスカウントとオブジェクトの寿命
class RefClass {

      public function __construct() {

            echo __CLASS__.'が生成されました'.PHP_EOL;

      }

      public function __destruct() {

            echo __CLASS__.'が破棄されました'.PHP_EOL;

      }
}

$a = RefClass();    // RF(リファレンスカウント) = 1
$b = $a;            // RF = 2
unset($a);          // RF = 1
unset($b);          // RF = 0

?>
