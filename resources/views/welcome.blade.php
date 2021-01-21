@extends("layouts.layout")

@section("content")
<div id="content">
    <h2>購入画面</h2>
    @if(session('empty'))
     <h1>お金が足りません</h1>
    @endif

    @if(session('bool'))
    <h1>返金完了</h1>
    @endif 
        <ul>
            <li>
                <h3>商品名</h3>
                <h3>価格</h3>
                <h3>在庫</h3>
            </li>
    <div id="depotsList">
        @foreach($merchandise as $key => $value)
            <li>
                <p>{{ $value->name }}</p>
                <p>{{ $value->price }}</p>
                <p>{{ $value->stock }}</p>

                <!-- ユーザー認証時の表示 -->
                @auth
                <form action="{{ route('delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $value->id }}">
                    <input type="submit" class="topArea" value="削除">
                </form>
                @else

                <!-- ユーザー非認証字の表示 -->
                <form action="{{ route('purchase') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $value->id }}">
                    <input type="submit" class="purchase" value="購入">
                </form>
                @endauth
            </li>
        @endforeach
    </div>
       
    </ul>
    @if($money)
    <h2 id="money">現在入金額：{{ number_format($money) }}円</h2>
    @elseif($money == null)
    <h2 id="money">現在入金額：{{ $money }}円</h2>
    @endif

    <!-- ユーザー認証時の表示 -->
    @auth
    <form action="{{ route('set_merchandise') }}" method="post">
        @csrf
        <div id="depotsManage">
            <input type="text" class="topArea" name="name" placeholder="商品の名前">
            <input type="text" class="topArea" name="price" placeholder="商品の値段">
            <input type="text" class="topArea" name="stock" placeholder="商品の在庫">
            <input type="submit" value="商品追加" class="topArea">
        </div>
    </form>
    @else

    <!-- ユーザー非認証字の表示 -->
    <form action="{{ route('deposit') }}" method="post">
            @csrf
            <input type="text" id="text" class="topArea" name="money" placeholder="入金したい額を入力して下さい。"><br>
            <input type="submit" value="入金" id="addValidate" class="topArea">
        </form>
        <form action="{{ route('refund') }}" method="post">
            @csrf
            <input type="submit" value="返金" id="refundMoney" class="topArea" onclick="refund()">
        </form>
    @endauth
</div>
@endsection
</div>


