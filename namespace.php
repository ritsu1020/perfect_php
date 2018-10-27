<?php
// 名前空間
// Cake.php

namespace Food\Sweets;

class Cake {

}
// 上記のCake.phpファイルからCakeクラスを呼び出してみる
// program.php

require_once 'Cake.php';

$c = new Food\Sweets\Cake();

/*
・名前空間の区切りにはバックスラッシュを用いる
・名前空間を定義した場合グローバルな関数やクラスは先頭にバックスラッシュをつけて参照する
・名前空間の宣言よりまえにコメント以外の出力が存在してはならない
namespace 名前空間;
namaspace 名前空間\サブ名前空間;
名前空間の影響を受けるのは
・クラス
・関数
・定数(constによって定義されるものに限る)
*/
namespace Project\Module;

class Directory{}    // Project\Module\Directory クラス
function file() {}   // Project\Module\file 関数
const E_ALL = 0x01;  // Project\Module\E_ALL 定数
$var = 0x01;         // 変数に名前空間は定義されない

// Project\Module\Directory.php
namespace Project\Module;

$dir = new Directory();    // 同じ名前空間の中では名前空間を省力できる
$dir = new \Project\Module\Directory();  //グローバルな絶対指定も可能

// 別の名前空間から参照する場合は常に完全修飾名の指定を行う
namespace Other;

require_once 'Project/Module/Directory.php';

$dir_a = new \Project\Module\Directory();    // Project\Module\Directory クラス
$dir_b = new \Directory();

// 1つのファイルに複数の名前空間を定義することもできる
namespace Project\Module {

      // ここはProject\Module　名前空間の中
      class Directory {}    // Project\Module\Directory クラス
}

namespace Project\Module2 {

      // ここはProject\Module2　名前空間の中　
      class Directory[]    // Project\Module2\Directory クラス
}
// インポートルール
/*
use\クラス名;
use 名前空間;
use 名前空間 as 別名;
use 名前空間 \クラス名;
*/
namespace Project\Module;
use Project\Module2 as AnotherModule;

$obj = new AnotherModule\someClass();    // new Project\Module2\someClass();と同じ


namespace Project\Module;
// 下記ファイルにクラスが定義されているものとする

require_once 'Foo/Bar/Baz.php';   // Foo\Bar\Bazクラス
require_once 'Hoge/Fuga.php';     // Hoge\Fugaクラス
require_once 'Module/Klass/Some.php';    // Module\Klass\Someクラス

use Foo\Bar as BBB;
use Hoge\Fuga;

class Piyo{}

  $obj1 = new \Directory();    // グロ-バルのDirectoryクラス
  $obj2 = new BBB\Baz();
  $obj3 = new Fuga();
  $obj4 = new Klass\some();
  $obj5 = new Piyo();

  some_func();    // 実行時にProject\Module\some_func()関数を探し無ければグローバル関数を実行

  BBB\SOME_CONST;    // 実行時にFoo\Bar\SOME_CONST定数に変換される
  SOME_CONST;    // 実行時にProject\Module\SOME_CONSTがなければグローバルのSOME_CONST定数を評価

?>
