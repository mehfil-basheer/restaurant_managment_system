<?php

namespace InstWa;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function discount()
    {
        return $this->belongsTo(CategoryDiscount::all());
    }
}
