<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property string $token
 * @property string $refresh_token
 * @property int $expired_to
 */
class UserToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'token', 'refresh_token', 'expired_to'
    ];

    protected $casts = [
        'expired_to' => 'datetime'
    ];
}
