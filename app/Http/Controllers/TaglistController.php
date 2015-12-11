<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Userinfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaglistController extends Controller
{
    public function index()
    {
        $taglist = Tag::all();
        return view('tag.index', compact('taglist'));
    }

    public function show($id)
    {
        $datas = Tag::find($id)->userinfos()->Paginate(env('PAGE_ROWS'));
        $tagname = Tag::find($id);
        $taglist = Tag::all();
        return view('tag.show', compact('datas', 'tagname', 'taglist'));
    }

    public function store(Request $request)
    {
        $res = Tag::where('name', $request->input('name'));
        if ($res->count() == 0) {
            Tag::create(['name' => $request->input('name')]);
        }
        return redirect('/tag/index');
    }
}
