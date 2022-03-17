<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users;

class user_files extends Model
{
/*     use HasFactory; */

protected $table = 'user_files';
protected $fillable = ['file_name', 'url', 'user_id'];

public function image(){
    
    return $this->belongsTo(users::class, 'user_id');

}
}
