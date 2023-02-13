<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReferToUser extends Model
{
    use HasFactory;
    protected $table = 'user_refer_to_user';
    protected $fillable = ['user_id', 'referTo_id'];
}
