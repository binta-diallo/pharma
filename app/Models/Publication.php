<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ["created_at","update_at","delete_at","published_at"];
    protected $fillable =["title","file","content"];


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
