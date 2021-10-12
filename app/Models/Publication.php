<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ["created_at","update_at","delete_at","published_at"];
   


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
