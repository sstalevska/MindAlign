<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Therapist extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the therapist.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLanguageAttribute($value)
    {
        return $this->formatJsonAttribute($value);
    }

    public function getModalityAttribute($value)
    {
        return $this->formatJsonAttribute($value);
    }

    public function getOrientationAttribute($value)
    {
        return $this->formatJsonAttribute($value);
    }

    protected function formatJsonAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?? [];
    }

}
