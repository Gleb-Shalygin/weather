@extends('layout.app')
@section('body')
    <form action="/input-token" method="POST" class="verify-token">
        @csrf
        <div class="input__controlls">
            <p for="">Ваш токен</p>
            <input type="text" name="appid" placeholder="введите">
        </div>
        <button type="submit">Отправить</button>
    </form>
    <script src="../../public/js/verify-token.js"></script>

@endsection
