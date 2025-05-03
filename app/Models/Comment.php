<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'text',
        'user_id', 'group_id', 'task_id',
    ];
}
