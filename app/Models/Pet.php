<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    use HasFactory;
    protected $tabla = 'pets';
    protected $fillable = ['name','color','gender','age','type','client_id'];
    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}