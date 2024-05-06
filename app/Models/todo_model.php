<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo_model extends Model
{
    use HasFactory;

    protected $table = 'todos';
    protected $fillable = ['user_id','heading','description','image','start_date','end_date'];

}
