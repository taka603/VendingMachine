<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //入金処理
    public function deposit($insertMoney){
        //moneyレコードに値があるかで分岐
        if($this->first()){
            $i = $this->first();
            $i->money += $insertMoney;
            $i->save();
        } else {
            $i = new self();
            $i->money = $insertMoney;
            $i->save();
        }
    }

    //返金処理
    public function refund(){
        //Bankに入金されているかの分岐
        if($i = $this->first()){
            $i->money = 0;
            $i->save();

            return true;
        } 
        
        return false;
    }

    //購入処理
    public function purchase($ins, $price){
        $ins->money -= $price;
        $ins->save();
    }
}
