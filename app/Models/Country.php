<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
	
	protected $table = 'country';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
	
	/**
     * The cities that belong to the Cities.
     */
    public function cities()
    {
        return $this->hasMany(City::class,'country_id');
    }
}
