<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestModel1 extends Model
{
    public $table = 'clients';
	public $timestamps = false;
	public $fillable = ['id', 'name', 'password', 'status'];
}
