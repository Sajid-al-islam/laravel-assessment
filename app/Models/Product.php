<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name', 'description', 'price', 'category_id', 'photo'
    // ];

    
    public function bills() {
        return $this->hasMany(Bill::class, 'customer_id','id');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class)->select(['name as text','id']);
    // }
}