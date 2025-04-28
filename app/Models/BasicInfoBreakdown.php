<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasicInfoBreakdown extends Model
{
    use HasFactory;

    protected $table = 'basic_info_breakdowns';


    protected $fillable = [
        'student_id',
        'head_id',
        'app_details1',
        'app_details2',
        'app_details3',
        'custom_amount',
        'doc_numbers',
        'paper_numbers',
        'payable',
    ];

    public $timestamps = false;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function head(): BelongsTo
    {
        return $this->belongsTo(Head::class);
    }
}