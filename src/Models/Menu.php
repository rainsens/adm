<?php

namespace Rainsens\Adm\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Adm\Widgets\Nestable;
use Rainsens\Adm\Widgets\Traits\NestableTrait;
use Rainsens\Adm\Widgets\Traits\Select2Trait;

class Menu extends Model
{
	use NestableTrait, Select2Trait;
	
    protected $guarded = ['id'];
    
    public function scopeOrder(Builder $builder)
    {
    	return $builder->orderBy('order');
    }
    
    public function scopeNestable(Builder $builder)
    {
    	return $builder->order()->get();
    }
    
    public function orderMenus(array $data)
    {
	    $data = app(Nestable::class)->recursive($data);
	    
	    foreach ($data as $value) {
		    $this->where('id', $value['id'])
			    ->update([
				    'parent_id' => $value['parent_id'],
				    'order' => $value['order'],
			    ]);
	    }
    }
}
