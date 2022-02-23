<?php

  //終了条件の判定
function isFinish($objects)
{
    $deathCnt = 0;
    foreach($objects as $object) {
        //一人でもHPが0を超えていたらfalseを返す
        if($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    //仲間の数が死亡数（HPが0以下の数）と同じであればtrueを返す
    if($deathCnt === count($objects)) {
        return true;
    }
}