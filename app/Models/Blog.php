<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'categoryId',
        'userId',
        'body'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
