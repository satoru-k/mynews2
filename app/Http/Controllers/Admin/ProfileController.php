<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile; //課題15
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //課題9
    public function add()
    {
      return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      //課題15
      //Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      //フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      //データベースに保存する
      $profile->fill($form)->save();

      return redirect('admin/profile/create');
    }

    public function index(Request $request)
    {
      /* 検索ボックスを設置しない場合
      $posts = Profile::all();
      return view('admin.profile.index', ['posts' => $posts]);
      */

      $cond_name = $request->cond_name;
      if ($cond_name != '') {
        $posts = Profile::where('name', $cond_name)->get();
      } else {
        $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }

    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();

      unset($profile_form['_token']);

      $profile->fill($profile_form)->save();

      $history = new ProfileHistory;
      $history->profile_id = $profile->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/profile');
    }

    public function delete(Request $request)
    {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile');
    }
}
