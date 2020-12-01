<?php

namespace Rainsens\Adm\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Rainsens\Adm\Widgets\Nestable;
use Rainsens\Adm\Widgets\Traits\NestableTrait;
use Rainsens\Adm\Widgets\Traits\Select2Trait;

class Menu extends Model
{
	use NestableTrait, Select2Trait;
	
    protected $guarded = ['id'];
    
    public function getUrlAttribute()
    {
    	if ($this->attributes['url']) {
		    $url = Str::start($this->attributes['url'], config('adm.route.prefix'));
		    return DIRECTORY_SEPARATOR . trim($url, DIRECTORY_SEPARATOR);
	    }
    	return null;
    }
    
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
    
    public function parent()
    {
    	return $this->belongsTo(self::class);
    }
    
    public function children()
    {
    	return $this->hasMany(self::class, 'parent_id');
    }
    
    public function hasChildren(): bool
    {
    	return $this->children->isNotEmpty();
    }
    
    public function isActive(): bool
    {
    	return request()->is(trim($this->url, DIRECTORY_SEPARATOR))
		    or $this->children->contains('url', DIRECTORY_SEPARATOR . request()->path());
    }
}
