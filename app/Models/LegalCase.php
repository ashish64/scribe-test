<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LegalCase extends Model
{
    use HasFactory;

    protected $table = 'legal_cases';

    protected $fillable = [
            'user_id',
            'status',
            'title',
            'description',
            'employee_id',
            'advisor_id',
            'reference_id',
            'address',
            'metadata',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
