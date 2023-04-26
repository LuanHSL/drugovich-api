<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
	use HasFactory;

	public $timestamps = false;

	protected $fillable = ['name', 'email', 'password', 'level'];

	protected $hidden = ['password'];
}
