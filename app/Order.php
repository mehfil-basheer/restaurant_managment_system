<?php

namespace InstWa;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function getItemAttribute($attribute)
    {
        $attribute = explode(',', $attribute);
        return ($attribute);
    }
}
