<?php

namespace App\Modules\Proposals;

use Illuminate\Database\Eloquent\Model;

class ProposalEloquent extends Model
{
    protected $table = 'proposals';

    protected $primaryKey = 'id';

	protected $fillable = [
		'name',
		'title',
		'description'
	];
}
