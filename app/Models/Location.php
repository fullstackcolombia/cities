<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
	
	protected $table = 'location';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
		'city_id',
    ];
	
	/**
     * Get the city_id associated with the City.
     */
    public function city_id()
    {
        return $this->hasOne(City::class,'city_id');
    }
}
