<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'description',
        'expiration_date',
        'status',
    ];

    public function increaseQuantity(int $amount): bool
    {
        if ($amount < 1) {
            return false;
        }

        $updated = self::whereKey($this->id)
            ->increment('quantity', $amount);

        if ($updated > 0) {
            $this->refresh();
        }

        return $updated > 0;
    }

    public function decreaseQuantity(int $amount): bool
    {
        if ($amount < 1) {
            return false;
        }

        $updated = self::whereKey($this->id)
            ->where('quantity', '>=', $amount)
            ->decrement('quantity', $amount);

        if ($updated > 0) {
            $this->refresh();
        }

        return $updated > 0;
    }
}
