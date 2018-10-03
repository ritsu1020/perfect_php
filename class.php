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

?>
