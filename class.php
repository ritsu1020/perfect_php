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

?>
