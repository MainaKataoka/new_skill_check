@extends('templates.default')

@section('title', $title)

@section('content')
    <div id="main">
        <h1>確認画面</h1>
        <p>以下の内容で送信しますか？</p>
        <div id="confirm_content">
            <dl class="wi">
                <dt>件名</dt>
                <dd>{{ $inputs['title'] }}</dd>
                <dt>氏名</dt>
                <dd>{{ $inputs['name'] }}</dd>
                <dt>e-mail</dt>
                <dd>{{ $inputs['email'] }}</dd>
                <dt>電話番号</dt>
                <dd>{{ $inputs['phone'] }}</dd>
                <dt>お問い合わせ本文</dt>
                <dd>{{ $inputs['body'] }}</dd>
            </dl>
        </div>
        <div>
            <button class="button">修正</button>
            <form method="post" action="{{ route('process') }}">
                @csrf
                <input type="hidden" name="title" value="{{ $inputs['title'] }}">
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                <input type="hidden" name="phone" value="{{ $inputs['phone'] }}">
                <input type="hidden" name="body" value="{{ $inputs['body'] }}">
                <button name="action" type="submit" class="button">送信</button>
            </form>
        </div>
    </div>

@endsection