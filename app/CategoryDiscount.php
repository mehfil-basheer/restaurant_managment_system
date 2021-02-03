<?php

namespace InstWa;

use Illuminate\Database\Eloquent\Model;

class CategoryDiscount extends Model
{
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPercentageAttribute($value)
    {
        return $value . '%';
    }
}
