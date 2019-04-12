<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected$fillable = ['nombre','divisions_id'];

	public function areas($id)
	{
		return Area::where('divisions_id', '=',$id)->get();
	}
}
