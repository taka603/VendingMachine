<?php

namespace App\Http\Controllers;

// use App\Http\Requests\VMRequest;
use Facades\App\Depot;
use Facades\App\Bank;
use Illuminate\Http\Request;

class VendingMachineController extends Controller
{
    public function index(Request $request){
        //投入金額格納
        $b = Bank::first();

        return view('welcome')->with([
            'money' => $b ? $b->money : null,
            'merchandise' => Depot::get(),  //depotsレコード取得
        ]);
    }
    // |"/^[1-9]0$|^[1-9][0-9]0$|^1000$/"
    public function insert(Request $request){
        //バリデーション
        $request->validate([
            'money' => 'required',
        ],[
            'money.required' => 'お金を入力してください'
        ]);

        //moneyの値だけを取得して入金処理
        Bank::deposit($request->only('money')['money']);

        return redirect()->route('index');
    }

    public function refund(Request $request){
        $bool = Bank::refund();

        // 返金金額の有無
        $request->validate([
            ''
        ]);

        return redirect()->route('index')->with('bool', $bool);
    }

    public function setMerchandise(Request $request){
        //各値を取り出す
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
}
