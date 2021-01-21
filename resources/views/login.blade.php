@extends("layouts.layout")

@section("content")
    <div id="content">
        <h2>ログイン情報入力</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="email">メールアドレス</label>
            <input type="text" class="authArea" name="email" placeholder="emailを入力してください" required>
            <label for="password">パスワード</label>
            <input type="password" class="authArea" name="password" placeholder="PASSWORDを入力してください" required>
            <input type="submit" value="ログイン" class="authSubmit">
        </form>
    </div>
@endsection
