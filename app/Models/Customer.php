<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['cnpj', 'name', 'foundation_date'];

    public function group()
    {
      return $this->belongsTo(Group::class);
    }
}
