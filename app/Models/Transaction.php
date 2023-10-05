<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'grams_of_co2',
        'cents_charged',
        'mollie_id',
        'status',
        'order_id',
    ];

    /**
     * @return BelongsTo<Tenant,self>
     */
    public function tenant(): belongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * @return BelongsTo<User,self>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
