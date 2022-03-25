@extends('templates.default')

@section('title', $title)

@section('content')
<div class="main">
        <h1>お問い合わせ</h1>
    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach
        <form method="post" action="{{ route('info.confirm') }}">
            @csrf
            <div class="content">
                <span>※必須</span>　件名 : 
                <select name="title">
                    <option value="ご意見">ご意見</option>
                    <option value="ご感想">ご感想</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="content">
                <span>※必須</span>　お名前 : <input type="textbox" name="name" placeholder="片岡　舞菜">
            </div>
            <div class="content">
                <span>※必須</span>　e-mail : <input type="textbox" name="email" placeholder="maina@email.com">
            </div>
            <div class="content">
                <span>※必須</span>　電話番号 : <input type="textbox" name="phone" placeholder="12345678910">
            </div>
            <div class="content">
                <span>※必須</span>　お問い合わせ内容<br>
                <textarea name="body" rows="5" cols="40"></textarea>
            </div>
            <div class="button">
                <input type="submit" value="確認画面へ進む">
            </div>
        </form>
    </div>
@endsection