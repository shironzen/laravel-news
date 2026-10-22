<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    // Связь: одна категория имеет много статей
    public function texts() { return $this->hasMany(Text::class); }
}