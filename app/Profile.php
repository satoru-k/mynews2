<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
      'name' => 'required',
      'gender' => 'required|max:20',
      'hobby' =>'required|max:100',
      'introduction' => 'required|max:255',
    );

    public function histories()
    {
      return $this->hasMany('App\ProfileHistory');
    }
}
