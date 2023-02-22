<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quota extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'value',
        'max',
        'user_id',
    ];

    protected $casts = [
        'value' => 'integer',
        'max' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function limitQuotas() {
        $usage = ($this->value / $this->max) * 100;
        return $usage > 90;
    }

    public function limitQuotasReached() {
       return $this->value >= $this->max;
    }
}
