<?php

// @mpyw oop basic

// Robotクラス
class Robot { }

// 実行コード(インスタンス化)　
$a = new Robot();
$b = new Robot();

// プロパティ　
class Robot {

      public $name = '';

}

// 実行コード
$a = new Robot();
$a->name = 'ロボ太郎';
$b = new Robot();
$b->name = 'ロボ次郎';

echo $a->name;    // ロボ太郎
echo $b->name;    // ロボ次郎

// private
class Robot {

      private $name = '';

}
$a = new Robot();
$a->name = 'ロボ太郎';    // error
$b = new Robot();
$b->name = 'ロボ次郎';    // error

echo $a->name;    // error
echo $b->name;    // error

// method setter
class Robot {

      private $name = '';
      public function setName($name) {

            $this->name = (string)filter_var($name);     // 文字列型のみ許可

      }
}

// getter setter
class Robot {

      private $name = '';
      public function setName($name) {

            $this->name = (string)filter_var($name);

      }

      public function getName() {

            return $this->name;

      }
}

// 実行コード　
$a = new Robot();
$a->setName('ロボ太郎');
$b = new Robot();
$b->setName('ロボ次郎');

echo $a->getName();    // ロボ太郎
echo $b->getName();    // ロボ次郎

// construct
class Robot {

      private $name = '';
      public function __construct($name) {

            $this->setName($name);

      }
      public function setName($name) {

            $this->name = (string)filter_var($name);

      }
      public function getName() {

            return $this->name;
      }
}
// 実行コード　
$a = new Robot('ロボ太郎');
$b = new Robot('ロボ次郎');

echo $a->getName();    // ロボ太郎
echo $b->getName();    // ロボ次郎　

// stdClass
class stdClass { }

$a = new stdClass();
$a->name = 'ロボ太郎';
echo $a->name;     // ロボ太郎　

// 値渡し　
$a = 'value';
$b = $a;    // $a is copy

// reference
$a = 'value';
$b = &$a;

// People class
class People {

      public $name = '';
      public $age = '';
      public $gender = '';

      public function walk($distance) {

            echo "${distance}m走りました。";

      }

      public function hello() {

            echo "こんにちは。私の名前は{$this->name}です。{$this->age}歳の｛$this->gender｝です。";
      }
}

// インスタンスを生成
$a_san = new People();
$a_san->name = '山田';
$a_san->age = 20;
$a_san->gender = '女性';

$b_kun = new People();
$b_kun->name = '佐藤';
$b_kun->age = 25;
$b_kun->gender = '男性';

$a_san->hello();    // こんにちは私の名前は山田です。20歳の女性です。
$b_kun->hello();    // こんにちは私の名前は佐藤です。25歳の男性です。

// __construct
class People {

      public $name = '';
      public $age = '';
      public $gender = '';

      public function __construct($name, $age, $gender) {

            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
      }

      publict function hello() {

            echo "こんにちは私の名前は{$this->name}です。{$this->age}歳の{$this->gender}です。";
      }
}

$a_san = new People('山崎', 22, '女');
$a_san->hello();    // こんにちは私の名前は山崎です。22歳の女性です。

// getter setter
class Robot {

      private $name = '';

      public function setName($name) {

            $this->name = (string)filter_var($name);
      }

      public function getName() {

            return $this->name;
      }
}

$a = new Robot();
$a->setName('ロボ太郎');
$b = new Robot();
$b->setName('ロボ次郎');

echo $a->getName();    // ロボ太郎
echo $b->getName();    // ロボ次郎　

?>
