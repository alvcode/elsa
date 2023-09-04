<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property string $action
 * @property string $valid_to
 * @property bool $is_used
 */
class ConfirmationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'code', 'action', 'valid_to', 'is_used'
    ];

    protected $casts = [
        'valid_to' => 'datetime'
    ];
}
