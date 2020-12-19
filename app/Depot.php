<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    //setter
    public function setMerchandise($name, $price, $stock){
        //インスタンスを生成して引数の値を各箇所に格納
        $depot = new self();
        $depot->name = $name;
        $depot->price = $price;
        $depot->stock = $stock;
        $depot->save();
    }

    //在庫減算処理
    public function purchase($ins){
        $ins->stock -= 1;
        $ins->save();
    }
}
