<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;


class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }

    public function create()
    {
        return view('memos.create');
    }
    public function store(Request $request)
      { // インスタンスの作成
        $memo = new Memo();

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;
         // インスタンスに値を設定して保存
        $memo->save();
         // 登録したらindexに戻る
        return redirect('/memos');
    }

    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }
}
