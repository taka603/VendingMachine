@extends("layouts.layout")

@section("content")
    <div class="content">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="text" class="form-control mt-2" name="email" placeholder="emailを入力してください" required>
            <input type="password" class="form-control mt-2" name="password" placeholder="PASSWORDを入力してください" required>
            <input type="submit" value="ログイン" class="form-control mt-5">
        </form>
    </div>
@endsection
