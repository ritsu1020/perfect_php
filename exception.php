<?php

// 例外処理 try-catch文
try {
      // エラーが発生する可能性のあるコード
} catch (Exception $e) {
     // エラー発生時の処理
}
// 実際の処理
try {

      echo (val());    // 定義していな変数を使っている
      echo ('END');    // 例外が発生するとcatchに移動するのでここは実行されない

} catch (Exception $e) {

      echo '補足したエラー:'.$e->getMessage();  // ここにエラーが発生した場合の処理を記述

}
/*
catch文では$eという例外変数にいくつかのエラーを出力させることができる
エラーメッセージ
$e->getMessage();
エラーコード
$e->getCode();
エラーが発生したファイル
$e->getFile();
エラーが発生した行
$e->getLine();
エラーの詳細情報
$e->getTrace();
*/
// throwを使って独自のタイミングでエラーを投げる
// 変数$iに0が入っていたらエラーを投げる
try {

      $i = 0;

      if ($i == 0) {

            throw new Exception('$iに0が設定されました');
      }

      echo ('END');    // 例外が発生するとcatchに移動するのでここは実行されない

} catch (Exception $e) {

      echo '補足したエラー：'.$e->getMessage();
}

// 0による除算が発生した場合に例外を投げる
function div ($v1, $v2) {

      if ($v2 === 0) {

        throw new Exception('arg #2 is zero!');

      }

      return $v1/$v2;
}
try {

      echo div(1, 2);
      echo div(1, 0);    // 例外が発生する原因となるコード
      echo div(2, 1);    // 例外が発生したのでここは処理されずにcatchへ飛ぶ

} catch (Exception $e) {

      echo 'Exception! ';
      echo $e->getMessage();    // Exception! arg #2 is zero!

}

?>
