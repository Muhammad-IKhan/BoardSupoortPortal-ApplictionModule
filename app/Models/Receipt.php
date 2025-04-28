<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'student_id',
        'head_id',
        'owed_amount',
        'apply_for',
        'basic_info_breakdowns'  // Make sure this is here

    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function head(): BelongsTo
    {
        return $this->belongsTo(Head::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}