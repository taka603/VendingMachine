@extends("layouts.layout")

@section("content")
<div class="content">
    @if(session('empty'))
    <h1 class="my-3">お金が足りません</h1>
    @endif

    @if(session('bool'))
    <h1 class="my-3">返金完了</h1>
    @endif
    
        <ul style="display: flex;list-style:none;">
            <li class="mr-4">
                <p>商品名</p>
                <p>価格</p>
                <p>在庫</p>
            </li>
        @foreach($merchandise as $key => $value)
            <li class="mr-3">
                <p>{{ $value->name }}</p>
                <p>{{ $value->price }}</p>
                <p>{{ $value->stock }}</p>
  
            <!-- ユーザー認証時の表示 -->
            @auth
            <form action="{{ route('purchase') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $value->id }}">
                <input type="submit" class="form-control" value="修正">
            </form>
            @else

            <!-- ユーザー非認証字の表示 -->
            <form action="{{ route('purchase') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $value->id }}">
                <input type="submit" class="form-control" value="購入">
            </form>
            @endauth
        </li>
    @endforeach
    </ul>
    @if($money)
    <h2 id="money">現在入金額：{{ number_format($money) }}円</h2>
    @endif

    <!-- ユーザー認証時の表示 -->
    @auth
    <form action="{{ route('set_merchandise') }}" method="post">
        @csrf
        <div class="content d-flex mt-5" style="align-items:center;">
            <input type="text" class="form-control mr-2" name="name" placeholder="商品の名前">
            <input type="text" class="form-control mr-2" name="price" placeholder="商品の値段">
            <input type="text" class="form-control mr-5" name="stock" placeholder="商品の在庫">
            <input type="submit" value="商品追加" class="form-control mt-2">
        </div>
    </form>
    @else

    <!-- ユーザー非認証字の表示 -->
    <form action="{{ route('deposit') }}" method="post">
            @csrf
            <input type="text" class="form-control mt-4" name="money" placeholder="入金したい額を入力して下さい。">
            <input type="submit" value="入金" class="form-control mt-2">
            @error('money')
                <h3 style="color:red">{{ $message }}</h3>
            @enderror
        </form>
        <form action="{{ route('refund') }}" method="post">
            @csrf
            <input type="submit" value="返金" class="form-control mt-2">
        </form>
        <h3><a href="/login">ログイン</a></h3>
    @endauth
</div>
@endsection
</div>


