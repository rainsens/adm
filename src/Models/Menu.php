<?php

namespace Rainsens\Adm\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Models\Traits\Nestable;
use Rainsens\Adm\Models\Traits\Select2;

class Menu extends Model
{
	use Nestable, Select2;
	
    protected $guarded = ['id'];
    
    public function scopeOrder(Builder $builder)
    {
    	return $builder->orderBy('order');
    }
    
    public function scopeNestable(Builder $builder)
    {
    	return $builder->order()->get();
    }
}
