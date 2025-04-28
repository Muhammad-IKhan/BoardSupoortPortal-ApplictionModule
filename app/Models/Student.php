<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'roll_number',
        'class',
        'session',
        'year'
    ];

    public $timestamps = true;

    public function BasicInfoBreakdown(): HasMany
    {
        return $this->hasMany(BasicInfoBreakdown::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}