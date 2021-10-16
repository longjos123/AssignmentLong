<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Tour;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', compact('news'));
    }
    public function delete($id)
    {
        News::destroy($id);

        return redirect()->back();
    }
    public function formEdit($id)
    {
        $news = News::find($id);

        return view('admin.news.edit',compact('news'));
    }
    public function postEdit($id, Request $request)
    {
        $news = News::find($id);
        $news->fill($request->all());
        if($request->hasFile('image')){
            $news->image = $request->file('image')->storeAs('uploads/imgNews', uniqid() . '-' . $request->image->getClientOriginalName());
        }

        $news->save();

        return redirect(route('news.index'));
    }
    public function add(Request $request)
    {
        $news = new News();
        $news->fill($request->all());
        if($request->hasFile('image')){
            $news->image = $request->file('image')->storeAs('uploads/imgNews', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $news->save();

        return redirect(route('news.index'));
    }
    public function viewDetail(Request $request)
    {
        $id = $request->query('id');
        $news = News::find($id);
        return response()->json($news);
    }
}
