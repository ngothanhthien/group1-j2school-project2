<?php 
namespace App\Http\Traits;
trait Searchable {
    public function scopeSearchByKeyword($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }
}