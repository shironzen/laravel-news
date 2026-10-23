<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['heading', 'text', 'category_id', 'user_id'];
    // статья принадлежит одной категории
    public function category() { return $this->belongsTo(Category::class); }
    //статья принадлежит одному юзеру
    public function user() { return $this->belongsTo(User::class); }
}