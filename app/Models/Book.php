<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'published_year'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
