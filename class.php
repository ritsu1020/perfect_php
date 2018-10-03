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

?>
