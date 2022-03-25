<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Models\Info;
use App\Mail\InfoMail;


class InfoController extends Controller
{
    public function index()
    {
        return view('info.index', [
            'title' => 'お問い合わせ',
        ]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'name'  => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'body'  => 'required|string',
        ]);

        $inputs = $request->all();
        return view('info.confirm', [
            'title'     => '確認画面',
            'inputs'    => $inputs,
        ]);

    }

    public function process(Request $request)
    {        
        $valiData = $request->validate([
            'title' => 'required',
            'name'  => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'body'  => 'required|string',
        ]);            
        
        // db登録
        $info = new Info;
        $info->title    = $valiData['title'];
        $info->name     = $valiData['name'];
        $info->email    = $valiData['email'];
        $info->phone    = $valiData['phone'];
        $info->body     = $valiData['body'];
        $info->save();
        
        // メール送信
        $input = $request->except('action');
        Mail::to($input['email'])->send(new InfoMail('mails.info', 'お問い合わせありがとうございます', $input));

        return redirect()->route('info.finish');
    }

    public function finish()
    {
        return view('info.finish', [
            'title' => '送信完了',
        ]);
    }
}
