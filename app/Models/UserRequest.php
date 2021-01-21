<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $table = 'requests';

    protected $primaryKey = 'id';
	
	protected $fillable = [
		'name',
		'title',
		'description'
	];
}
