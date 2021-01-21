<?php

namespace App\Http\Controllers;

use Facades\App\Depot;
use Facades\App\Bank;
use Illuminate\Http\Request;

class VendingMachineController extends Controller
{
    public function index(Request $request){
        //Bankモデルからmoneyレコード取得
        $bank = Bank::first();

        return view('welcome')->with([
            'money' => $bank ? $bank->money : null,  //$bankに入金されているかで分岐
            'merchandise' => Depot::get(),  //depotsレコード取得
        ]);
    }

    public function insert(Request $request){
        //moneyの値を取得して入金処理
        Bank::deposit($request->only('money')['money']);

        return redirect()->route('index')->with('money');
    }

    public function refund(Request $request){
        //返金処理メソッド呼び出し
        $bool = Bank::refund();

        return redirect()->route('index')->with('bool', $bool);
    }

    //商品追加
    public function setMerchandise(Request $request){
        //formで入力した情報を渡す
        Depot::setMerchandise(
            $request->get('name'),
            $request->get('price'),
            $request->get('stock')
        );
        
        return redirect()->route('index');
    }

    public function purchase(Request $request){
        $id = $request->get('id');
        //投入金額格納
        $inputAmount = Bank::first();
        //選択商品のid格納
        $purchaseDepot = Depot::where('id', $id)->first();

        //投入金額が空or購入商品の価格より低いかチェック
        if(empty($inputAmount->money) || $inputAmount->money < $purchaseDepot->price){
            return redirect()->route('index')->with('empty', true);
        }
        //投入金額ー商品価格
        Bank::purchase($inputAmount, $purchaseDepot->price);
        //購入商品の在庫−１
        Depot::purchase($purchaseDepot);

        return redirect()->route('index');
    }

    //商品削除
    public function delete(Request $request){
        //requestで送信されたidに該当する商品を渡す
        $selectDepot = Depot::find($request->get('id'));
        $selectDepot->delete();

        return redirect()->route('index');
    }
}
