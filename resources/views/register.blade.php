@extends("layouts.layout")

@section("content")
    <div class="content">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <input type="text" class="form-control mt-2" name="email" placeholder="emailを入力してください">
            <input type="password" class="form-control mt-2" name="password" placeholder="PASSWORDを入力してください">
            <input type="submit" value="登録" class="form-control mt-5">
        </form>
    </div>
@endsection

