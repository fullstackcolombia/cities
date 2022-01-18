<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
	
	protected $table = 'city';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country_id',
    ];
	
	/**
     * Get the country_id associated with the Country.
     */
    public function country_id()
    {
        return $this->hasOne(Country::class,'country_id');
    }
	
	/**
     * The jobtitles that belong to the job title.
     */
    public function locations()
    {
        return $this->hasMany(Location::class,'city_id');
    }
}
