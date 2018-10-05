<?php

// クラス基本構文
class Employee {

      public $name;
      public $state;

      public function work() {

            echo '書類を整理しています';
      }
}

// selfはクラスコンテキストの内部ではそのクラス自身を指すキーワード
class Employee {

      public static $company = '技評技術社';

      public function getCompany() {

            return self::$company;

      }
}

// staticメソッド
class Employee {

      private static $company = '技評技術社';

      public static function getCompany() {

            return self::$company;
      }

      public static function setCompany($value) {

            self::$company = $value;
      }
}

echo Employee::getCompany();    // 社名の出力
Employee::setCompany('技評評論社');    // 社名が変わったとき

// コンストラクタとデストラクタ
class Employee {

      const PARTTIME = 0x01;    // アルバイト
      const REGULAR  = 0x02;    // 正社員
      const CONTRACT = 0x03;    // 契約社員

      private $name;    // 名前を保存するプロパティ
      private $type;    // 雇用形態を保存するプロパティ

      public function __construct($name, $type) {

            $this->name;
            $this->type;
      }
}

// コンストラクタの引数を指定してインスタンス化する
$yamada = new Employee('山田', Employee::REGULAR);

// クラスの継承
/*
class クラス名 extends 親クラス名 {

}
*/
class Programmer extends Employee {

      // オーバーライド(上書き)
      public function work() {

            echo 'プログラムを書いています';
      }
}

// オーバーライドしたメソッドは親クラスで定義されたメソッドと引数が違ってはいけない
// 但し、デフォルト値を持つ引数追加で定義することは可能
class Programmer extends Employee {

      public function work($how = 'コンピューターで') {

        echo $how.'プログラムを書いています';
      }
}

// インスタンス化する
$yamada = new Programmer();
$yamada->name = 'マイケル';
echo $yamada->name.'さんは';
$yamada->work();

?>
