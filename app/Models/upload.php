<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    protected $fillable = [
        'name',
        'size',
        'path'
    ];
    protected $guarded = 'id';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
}
