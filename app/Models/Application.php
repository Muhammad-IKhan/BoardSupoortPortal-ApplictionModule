<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 
        'receipt_id', 
        'primary_details', 
        'secondary_details',
        'additional_notes', 
        'additional_notes_2',
        ];

    protected $casts = [
        'primary_details' => 'array',
        'secondary_details' => 'array',
        'additional_notes' => 'array',
        'additional_notes_2' => 'array'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }

    public function BasicInfoBreakdown(): belongsTo {
        
        return $this->belongsTo(BasicInfoBreakdown::class);
    }
    
}

