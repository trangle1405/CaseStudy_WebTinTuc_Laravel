<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\TypeOfNews;
use App\Comment;
use App\Http\Requests\NewsValidation;

class NewsController extends Controller
{
    public function list()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.news.list', compact('news'));
    }

    public function create()
    {
        $category = Category::all();
        $typeOfNews = TypeOfNews::all();
        return view('admin.news.add', compact('category', 'typeOfNews'));
    }

    public function store(NewsValidation $request)
    {
        $attribute = $request->all();
        if (!$request->hasFile('image')) {
            $request['image'] = '';
        } else {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $newFileName = rand(11111, 99999) . "_" . $fileName;
            $request->file('image')->move('upload/tintuc',$newFileName);
            $attribute['image'] = $newFileName;

        }
        $attribute['title_slug'] = str_slug($request->title);
        $typeOfNews = News::create($attribute);
        return redirect('admin/news/list')->with('message', 'Đã thêm  Tin!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $category = Category::all();
        $typeOfNews = TypeOfNews::all();
        return view('admin.news.edit', compact('news', 'typeOfNews', 'category'));
    }

    public function update(NewsValidation $request, $id)
    {   $news = News::findOrFail($id);
        $attribute = $request->all();
        if (!$request->hasFile('image')) {
            $request['image'] = '';
        } else {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $newFileName = rand(11111, 99999) . "_" . $fileName;
            $request->file('image')->move('upload/tintuc',$newFileName);
            $attribute['image'] = $newFileName;

        }
        $attribute['title_slug'] = str_slug($request->title);
        $news->update($attribute);
        return redirect('admin/news/list')->with('message', 'Đã sửa tin!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('admin/news/list')->with('message', 'Đã Xóa Tin!');
    }
}
