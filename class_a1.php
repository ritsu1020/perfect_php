<?php

// class_a1.php

// method only
class Employee {

      public function work() {

            echo '書類を整理しています'.PHP_EOL;

      }
}

$yamada = new Employee();
$yamada->work();

// property
class Employee {

      public $name;
      public $status = '働いている';

      public function work() {

            echo '書類を整理しています';

      }
}

$yamada = new Employee();
$yamada->name = '山田';
$yamada->status;          // 働いている

echo $yamada->status.$yamada->name.'さん';    // 働いている山田さん

// private
class Employee {

      private $name;
      public $status = '働いている';

      public function getName() {

            return $this->name;
      }

      public function setName($name) {

            $this->name = $name;
      }

      public function work() {

            echo '書類を整理しています';

      }

$yamada = new Employee();
$yamada->setName('山田');
echo $yamada->getName().'さんは'.$yamada->work();    // 山田さんは書類を整理しています

// static
class Employee {

      public $name;
      public static $company = 'abcompany';

      public static function addition($num1, $num2) {

            return $num1 + $num2;
      }
}

echo '私は'.Employee::$company.'で働いています';
echo Employee::addition(1, 2);      // 3

// static method
class Employee {

      private static $company = 'abcompany';

      publict static function getCompany() {

            return Employee::company;
      }

      public static function setCompany($value) {

            self::$compnay = $value;

      }
}
echo Employee::getCompnay;
Employee::setCompnay('DEcompany');
}

// self
class Employee {

      public static $company = 'abcompany';

      public function getCompany() {

            return self::$company;    // Employee::$companyと同じ　

      }
}

// 定数
class Employee {

      const PARTTIME = 0x01;    // アルバイト
      const REGULAR  = 0x02;    // 正社員
      const CONTRACT = 0x03;    // 契約社員

}

// 正社員にアクセス
Employee::REGULAR;

// construct
class Employee {

      const PARTTIME = 0x01;
      const REGULAR = 0x02;
      const CONTRACT = 0x03;

      private $name;
      private $type;

      public function __construct($name, $type) {

            $this->name = $name;
            $this-?type = $type;
      }
}

$yamada = new Employee('yamada', Employee::REGULAR);

// class basic
class People {

      public $name = '';
      public $age = ''
      public $gender = '';

      public function walk($distance) {

            echo $distance.'m歩きました';

      }

      public function hello() {

            echo 'こんにちは私の名前は'.$this->name.'です。'.$this->age.'歳の'.$this->gender.'です';
      }
}

$a_san = new People();
$b_kun = new People();

$a_san->name = 'jelly';
$a_san->age = 20;
$a_san->gender = '女性';
$a_san->hello();

$b_kun->name = 'steve';
$b_kun->age = 39;
$b_kun->gender = '男性';
$b_kun->hello();

// construct pravate
class People {

      private $name = '';
      private $age = '';
      private $gender = '';

      public function __construct($name, $age, $gender) {

            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
      }

      // 名前を取得 getter
      public function getName() {

            return $this->name;
      }

      public function hello() {

            echo 'こんにちは私の名前は'.$this->name.'です。'.$this->age.'歳の'.$this->gender.'です';
      }
}

$people_a = new People('nancy', 30, '女性');
$people_a->age = 50;    // エラー
$people_a->hello();     // こんにちは私の名前はnancyです。30歳の女性です。

// 継承　
class Runner extends People {

      public function run($distance) {

            echo "${distance}m走りました";

      }
}
$people = new People('bob', 45, '男性');
$runner = new Runner('bob', 45, '男性');

echo $runner->name.'さんは'.$runner->run(100);
