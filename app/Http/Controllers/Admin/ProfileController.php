<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    //
public function add()
{
    return view('admin.profile.create');
}

public function create(Request $request)
{
    $this->validate($request, Profile::$rules);

      $news = new Profile;
      $form = $request->all();

      $news->fill($form);
      $news->save();

    return redirect('admin/profile/create');
}

public function edit(Request $request)
{
    $news = Profile::find($request->id);
    if (empty($news)) {
        abort(404);
    }
    return view('admin.profile.edit', ['news_form' => $news]);
}

public function update(Request $request)
{
    $this->validate($request, Profile::$rules);
    $news = Profile::find($request->id);
    $news_form = $request->all();
    unset($news_form['_token']);
    return redirect('admin/profile/edit');
 }
}
