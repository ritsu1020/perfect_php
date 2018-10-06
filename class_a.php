<?php

// クラスとオブジェクト インスタンスの生成と使い方

/*
・まずclassキーワードを用いてクラスを宣言する
・クラス名「Employee」に続いてクラスの中身を記述
・メソッドにはアクセス修飾子「public」に続けてメソッド名を記述しメソッドの中身を記述
・クラスを使うときにはnew演算子を用いてクラスをインスタンス化する
*/

class Employee {

    public function work () {

        echo '書籍を整理しています', PHP_EOL;

    }
}

$yamada = new Employee();
$yamada -> work();    //メソッドの呼び出しにはアロー演算子を用いる

// プロパティ

/*
・プロパティはクラスの中に保持している変数でクラスの定義時に同時に定義する
・プロパティはアクセス修飾子のあとに変数名をつけて定義する
・必要があれば続けてデフォルトの値を指定することができる
*/

class Employee {

      public $name;    // 従業員の名前を表すプロパティ
      public $state = '働いている';   // 従業員の状態を表すプロパティ「デフォルト指定」

      public function work () {

        echo '書籍を整理しています', PHP_EOL;

      }
}

$yamada = new Employee();
$yamada -> name = '山田';

    echo $yamada -> state, $yamada -> name, 'さん';    //働いている山田さん

    $yamada -> work();    // 書籍を整理しています

/*
・上記の例ではプロパティはpublicで定義されているためクラスの外側からアクセス可能となる
・クラスの内側からのみアクセス可能なprivateで定義してみる
*/

class Employee {

      public $name;
      private $state = '働いている'; // privateなのでクラスの内側からのみアクセス可能

      public function work() {

        echo '書類を整理しています', PHP_EOL;

      }
}

// よって次の例はエラーとなる

echo $yamada = new Employee();

$yamada -> name = '山田';

echo $yamada -> state, $yamada -> name, 'さん';

$yamada -> work(), PHP_EOL;

// privateを取得するメソッドとprivateを変更するメソッドを実装する

class Employee {

  public $name;
  private $state = '働いている';     // privateなのでクラスの内側からのみアクセス可能

  public function getState() {    // privateなプロパティを取得するメソッド

    return $this -> state;

  }

  public function setState($state) {    /// privateなプロパティを変更するメソッド

    $this -> state = $state;

  }

  public function work() {

    echo '書類を整理しています', PHP_EOL;

  }
}

// 上記のようにすることでprivateなプロパティにクラスの内側から$thisを用いてアクセスできる
// 具体的に変更してみる

$yamada = new Employee();
$yamada -> name = '山田';
$yamada -> setState('休憩している');
echo $yamada->name,'さんは',$yamada->getState(), PHP_EOL;   // 山田さんは休憩している

// staticプロパティ
// プロパティの宣言時にstaticをつけるとそのプロパティはクラスがインスタンス化されていなくても読み書き可能
// staticプロパティへはクラス名に::をつけてアクセスする

class Employee {

      public $name;
      public static $company = '技評技術者';

}

// staticプロパティにアクセス
echo '従業員はみんな', Employee::$company, 'に務めています', PHP_EOL;

/*
定数 クラス定数はconstキーワードを用いて定義する
class クラス名 {

        const 定数名 = 値；
        k
}
*/
class Employee {

      const PARTTIME = 0x01;    // アルバイト
      const REGULAR  = 0x02;    // 正社員
      const CONTRACT = 0x03;    // 契約社員

}

//正社員を表す定数を取得する
Employee::REGULAR;

// 全体的にクラスの基礎を復習
/*
オブジェクト指向
例）「人」オブジェクトを作成してみる
【人クラス】
  属性：プロパティ(変数的な)
  $名前
  $年齢
  $性別
　行動：メソッド(関数的な)
　歩く()
　挨拶をする()
　年を取る()
*/
// Peopleというクラスを作ってみる
class People {

      // 名前(プロパティを作成)
      public $name = '';

      // 年齢
      public $age = '';

      // 性別
      public $gender = '';

      // 歩く(メソッドを作成)
      public function walk($distance) {

        echo $distance."ｍ歩きました";

      }

      // 挨拶をする
      public function hello() {

        echo "私の名前は".$this->name."です。".$this->age."歳の".$this->gender."です。";

      }

      // 年を取る
      public function happy_birthday() {

        $age++;

      }
//クラスの定義ができたのでインスタンス化してみる
$a_san = new People();
$a_san->name = 'sam_greco';
$a_san->age = 45;
$a_san->gender = '男性';
$a_san->hello(); // 私の名前はsam_grecoです。45歳の男性です。

}

// クラスの初期化(コンストラクタ)
function __construct($name, $age, $gender) {

      $this->name = $name;
      $this->age = $age;
      $this->gender = $gender;

}

//コンストラクタを定義しておけばクラスからインスタンスを生成する際、引数を渡すことができる
$a_san = new People('sam_greco', 45, '男性');
$a_san->hello();    // 私の名前はsam_grecoです。45歳の男性です。

// クラスPeopleのコード全文(基本)
class People {

    // 名前
    public $name = '';

    // 年齢
    public $age = '';

    // 性別
    public $gender = '';

    //コンストラクタ
    function __construct($name, $age, $gender) {

          $this->name = $name;
          $this->age = $age;
          $this->gender = $gender;
    }

    // 歩く
    public function walk($distance) {

      echo $distance.'m歩きました'；

    }

    // 挨拶をする
    public function hello() {

      echo "私の名前は".$this->name."です。".$this->age."歳の".$this->gender."です。";

    }

    // 年を取る
    public function happy_birthday() {

      $age++;

    }
}

// プロパティ・メソッドのアクセス権
/*
・public(どこからでもアクセス可能)
・protected(自クラス、親クラス、継承したクラスからのみアクセス可能)
・private(自クラスからのみアクセス可能)
*/
class People {

      private $name = '';
      private $age = '';
      private $gender = '';

      function __construct($name, $age, $gender) {

            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;

      }

      // 名前を取得する privateなプロパティを取得するためのメソッド
      public function getName() {

            return $this->name;

      }

      // 挨拶をする
      public function hello() {

        echo "私の名前は".$this->name."です。".$this->age."歳の".$this->gender."です。";

      }
}

$a_san = new People('sam_greco', 45, '男性');
$a_san->hello();

// staticなプロパティとメソッド
class Calculator {

      // 円周率プロパティ
      public static $pi = 3.14;

      // 足し算メソッド
      public static function addition($num1, $num2) {

            return $num1 + $num2;
      }
}

// staticなプロパティやメソッドはインスタンス化せずに取得することができる
echo Calculator::$pi;
echo Colculator::addition(1, 2);

// クラスの継承
/*
class クラス名 extends 親クラス名 {
// 処理の内容
}
*/

// 上記のPeopleクラスを継承してRunnerクラスを作成する
class Runner extends People {

      // 走る
      public function run($distance) {

            echo $distance.'m走りました';

      }
}
// Peopleクラスのすべての機能を引き継いでいるので以下のようにインスタンスを作成できる
$c_san = new Runner('スタンザマン', 48, '男性');
$c_san->hello();    // 私の名前はスタンザマンです。48歳の男性です。
$c_san->run(100);    // 100m走りました

// とりあえずここまで↑　続きはclass_b.phpで

?>
