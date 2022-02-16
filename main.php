<?php

//echo "処理のはじまりはじまり〜!\n\n";
//ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

//インスタンス化
$tiida = new Brave("ティーダ");
$goblin = new Enemy("ゴブリン");

$turn = 1;

while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
    echo "*** $turn ターン目 ***\n\n"; //ここを追加

    //現在のHPの表示
    echo $tiida->getName() . "：" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->getName() . "：" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";

    //攻撃
    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";

    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->getName() . ":" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n";
