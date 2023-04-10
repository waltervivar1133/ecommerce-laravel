<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const DRAFT = 1;
    const PUBLISHED = 2;

    protected $guarded = ['id' , 'create_at', 'updated_at'];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    // relacion uno a muchos polimorfica
    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
