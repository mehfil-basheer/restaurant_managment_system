<?php

namespace InstWa;

use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    protected $guarded = [''];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getPercentageAttribute($value)
    {
        return $value . '%';
    }
}
