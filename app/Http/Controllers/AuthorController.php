<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function create(Request $request)
    {
        $r = 0;
        if ($request->has('save-author')) {
            $this->validate($request, ['name' => 'required|max:255']);
            $author = new Author();
            $author->name = $request->name;
            $r = $author->save();
        }
        return view('author.create', ['r' => $r]);
    }

}
