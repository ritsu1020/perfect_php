<?php

// class_c
// basic
class Employee {

      public function work() {

            echo '書類を整理しています';

      }
}

// インスタンス化する
$yamamda = new Employee();
$yamada->work();    // 書類を整理しています

// プロパティ
class Employee {

      public $name;
      public $state = '働いている';    // デフォルト値を指定できる

      public function work() {

            echo '書類を整理しています'.PHP_EOL;

      }
}
$yamada = new Employee();
$yamada->name = '山田';
echo $yamada->state.$yamada->name.'さん';    // 働いている山田さん
$yamada->work();    // 書類を整理しています

// privateなプロパティ
class Employee {

      public $name;
      private $state = '働いている';    // privateなのでクラスの内側からしかアクセスできない

      public function work() {

            echo '書類を整理しています'.PHP_EOL;

      }
}

$yamada = new Employee();
echo $yamada->state.$yamada->name.'さん';    // ←これはエラーになる

// $this

class Employee {

      public $name;
      private $state = '働いている';

      public function getState() {

            return $this->state;    // privateなプロパティにクラスの内側からアクセスする

      }

      public function setState($state) {

            $this->state = $state;    // privateなプロパティを変更するメソッド

      }

      public function work() {

            echo '書類を整理しています'.PHP_EOL;

      }
}

$yamada = new Employee();
$yamada->name = '山田';
echo $yamada->getState().$yamada->name.'さん';    // 働いている山田さん

$yamada->setState('休憩している');
echo $yamada->getState().$yamada->name.'さん';    // 休憩している山田さん

// static インスタンス化されていなくても使える
class Employee {

      public $name;
      public static $company = '技術評論社';
}

echo '従業員はみんな'.Employee::$company.'に勤めています';

// self
class Employee {

      public static $company = '技術評論社';
      public function getState() {

            return self::$company;    // Employee::$companyと同じ

      }
}

// 定数
class Employee {

      const PARTTIME = 0x01;    // アルバイト
      const REGULAR  = 0x02;    // 正社員
      const CONTRACT = 0x04;    // 契約社員
}

// class定数は::を使ってアクセスする　
echo Employee::REGULAR;    // 0x02

// staticメソッド
class Employee {

      private static $company = '技術評論社';

      public function getCompany() {

            return self::$company;

      }
      public static setCompany($value) {

            self::$company = $value;

      }
}

echo Employee::getCompany;    // 技術評論社
Employ::setCompany('評論技術社');    // 社名が変わったとき
echo Employee::getCompany();    // 評論技術社

// コンストラクタとデストラクタ
class Employee {

      const PARTTIME = 0x01;    // アルバイト
      const REGULAR  = 0x02;    // 正社員
      const CONTRACT = 0x04;    // 契約社員

      private $name;
      private $type;

      public function __construct($name, $type) {

            $this->name = $name;
            $this->type = $type;
      }

      public function hello() {

            echo '私の名前は'.$this->name.'です。'.PHP_EOL;
            echo $this->type.'として働いてます。';
      }
}

$yamada = new Employee('山田', Employee::REGULAR);
echo $yamada->hello();    // 私の名前は山田です。正社員として働いてます。

// extends
// オーバーライド
class Programmer extends Employee {

      public function work() {

            echo 'プログラムを書いています';
      }
}

// 引数の違うオーバーライドはエラーとなる
class Programmer extends Employee {

      public function work($how) {

            // これはエラー

      }
}

// デフォルト値を持つ引数ならオーケー　
class Programmer extends Employee {

      public function work($how = 'コンピューターで') {

            echo $how.'プログラムを書いています';

      }
}

// parent 派生クラスから親クラスのコンストラクタを呼ぶ場合
class Programmer extends Employee {

      public function __construct($name, $type) {

            parent::__construct($name, $type);    // 親クラスのコンストラクタを呼び出す

      }
}

// finalキーワードをつけてメソッドを宣言すると継承された派生クラスでオーバーライドできなくなる
class Employee {

      public $salary = 20;

      // 給料を取得するメソッド
      public final function getSalary() {

            return $this->salary;

      }
}

class Programmer extends Employee {

      public function getSalary() {

            $this->salary * 2;    // オーバーライドできないのでエラーとなる

      }
}

// stdClass ググる
// 抽象クラス　共通の機能は抽象的な親クラスで定義。特有の機能は個々の子クラスで実装
/*
abstract クラス名 {
    abstract アクセス権　function メソッド名([引数,…])
}
*/
abstract class Employee {

      abstract public function work();
}

// interface
/*
interface インターフェイス名 {
    インターフェイスの定義
}
class クラス名 implements インターフェイス名[インターフェイス名,…] {
    クラスの定義
}
*/
interface Reader {

      public function read();

}

interface Writer {

      public function write($value);

}
class Configure implements Reader, Writer {

      public function write($value) {

            // 書きこみの処理

      }

      public function read() {

            // 読み込みの処理
      }
}



?>
