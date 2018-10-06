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

// インターフェイス
/*
・インターフェイスには実体のあるメソッドを定義できない
・アクセス修飾子はpublicのみ
・定数を持つことができるが実装先のクラスでオーバーライドすることはできない
interface インターフェイス名 {
    const 定数名 = 'ABC';
    public function メソッド名();
}
インターフェイスの実装方法
class クラス名 implements インターフェイス名, インターフェイス名

参考：
https://qiita.com/nogson/items/e6575d6617f854ed6e25
https://qiita.com/konojunya/items/492e8114e6bd55344731
*/

interface sayHi {

      public function sayHi();    // interfaceは絶対public
}
interface sayHello {

      public function sayHello();
}
// interfaceで宣言したものをクラスの中で実装していく
class User implements sayHi, sayHello {

      public function sayHi() {

            echo 'Hi!';
      }
      public function sayHello() {

            echo 'hello!';
      }
}
// あとはインスタンス化して使うだけ
$yamada = new User();
$yamada->sayHi();
$yamada->sayHello();

// 抽象クラス
/*
・抽象クラスとは他のクラスで継承していもらうことを前提としたクラス
・抽象クラスそのものをインスタンス化することはできない
・アクセス修飾子にはpublic,protectedが使える
・通常のクラス同様extendsで承継する為interfaceと異なり複数を承継することはできない
abstract 抽象クラス名 {
    abstract アクセス権 function メソッド名();
}
参考：
https://qiita.com/konojunya/items/492e8114e6bd55344731
*/
abstract class BaseUser {
    // 通常のクラス同様、プロパティ、メソッドを定義
      public $age = 39;
      public function showAge($age) {

            echo $age;
      }
      // 抽象メソッド
      abstract public function showName();
}
class User extends BaseUsser {

      function __construct() {

            $this->showName();
            $this->showAge($this->age);
      }
      public function showName() {

            echo 'SATO ';
      }
}
// インスタンス化して使用
$user = new User();    // SATO 39

// マジックメソッド
/*
・マジックメソッドとは特定の条件で自動的に呼び出されるメソッド
・PHPには__construct,__destrauctなど14のマジックメソッドがある
参考：(マジックメソッド一覧)
http://www.atmarkit.co.jp/ait/articles/1804/05/news008.html
*/
class Employee {

      public function __toString() {

            return 'This is:'.__CLASS__;
      }
}

$yamada = new Employee();
echo $yamada;    // This is:Employee;

// オーバーロード
/*
オーバーロードとは特定の処理がクラスまたはオブジェクトに施されたときのデフォルトの挙動を
上書きする機能のことをいう
*/
class SomeClass {

      private $values = array();    // privateな値を保存するコンテナ
      // pirvateなコンテナへのアクセサ(getter)
      public function __get($name) {

            echo "get: $name", PHP_EOL;
            if(!isset($this->values[$name])) {

                  throw new OutOfBoundsException($name. 'not found.');
            }

            return $this-values[$name];
      }
      // privateなコンテナへのアクセサ(setter)
      public function __set($name, $value) {

            echo "set: $name setted to $value", PHP_EOL;
            $this->values[$name] = $value;
      }
}

// ↑全く意味が分からんのでググってからまたもどってくる
/*
PHPのマジックメソッド一覧と使い方まとめ
https://qiita.com/ichi_404/items/257b2c23aacef0b3cfdc

便利だけど使いどころが難しいPHPの代表的なマジックメソッドと無名関数の使い方
http://www.atmarkit.co.jp/ait/articles/1509/03/news021.html
*/

?>
