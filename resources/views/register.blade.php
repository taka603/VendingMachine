@extends("layouts.layout")

@section("content")
    <div class="content">
        <h2>会員情報入力</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="email">メールアドレス</label>
            <input type="text" class="authArea" id="email" name="email" placeholder="emailを入力してください">
            <label for="password">パスワード</label>
            <input type="password" class="authArea" id="password" name="password" placeholder="PASSWORDを入力してください">
            <input type="submit" value="登録" class="authSubmit">
        </form>
    </div>
@endsection

