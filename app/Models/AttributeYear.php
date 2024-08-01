<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeYear extends Model
{
    use HasFactory;

    public $table_name = 'attribute_years';

    public function attribute_years()
    {
        return $this->hasMany(AttributeYear::class);
    }
}
