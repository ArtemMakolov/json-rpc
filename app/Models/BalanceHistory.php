<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BalanceHistoryResource
 *
 * @property int $id
 * @property float $value
 * @property float $balance
 * @property int $user_id
 * @property mixed $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceHistory whereValue($value)
 * @mixin \Eloquent
 */
class BalanceHistory extends Model
{
    public const UPDATED_AT = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'balance',
        'user_id',
        'created_at',
    ];
}