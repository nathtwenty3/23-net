<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'content',
        'facebook',
        'telegram',
        'youtube',
        'logo',
    ];
    
    // public function User(){
    //     return $this->belongsTo(User::class,'updated_by','id','user_id');
    //     return $this->belongsTo(User::class,'created_by','id','user_id');
    // }
}


