<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance',
    ];

    /**
     * Get the user that owns the wallet.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Increment the balance of the given wallet
     *
     * @param integer $balance
     * @return void
     */
    public function increaseBalance(int $newBalance): void
    {
        $currentBalance = $this->balance;

        $this->balance = $currentBalance + $newBalance;

        $this->save();
    }
}
