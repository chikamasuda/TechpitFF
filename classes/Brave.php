<?php

class Brave extends Human
{
    const MAX_HITPOINT = 120;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;
    private static $instance;

    private function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    //シングルトンで常にインスタンスは一つしか生成しない
    public static function getInstance($name)
    {
        if(empty(self::$instance)) {
            self::$instance = new Brave($name);
        }
        
        return self::$instance;
    }

    public function doAttack($enemies)
    {
        //自身のHPが0以上かどうか、敵のHPが0以上かなどをチェックするメソッドを用意。
        if(!$this->isEnableAttack($enemies)) {
            return false;
        }
        //ターゲットの決定
        $enemy = $this->selectTarget($enemies);

        if (rand(1, 3) === 1) {
            //スキルの発動
            echo "『" . $this->getName() . "』のスキルが発動した!\n";
            echo "『ぜんりょくぎり』!!\n";
            echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ!\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }
}
