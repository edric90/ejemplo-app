<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $table = ['clients'] ;
    protected $fillable = ['first_name','last_name','cell_phone','zone','address'];
    public function pets():HasMany
    {
        return $this->hasMany(Pet::class);
    }
}