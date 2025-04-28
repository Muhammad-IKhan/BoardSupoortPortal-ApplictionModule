<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Head extends Model
{
    use HasFactory;

    protected $table = 'heads';

    protected $fillable = [
        'h_code', 
        'h_name', 
        'h_service_fee'
    ];

    public $timestamps = false;

    public function applications(): HasMany
    {
        return $this->hasMany(application::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }
}