<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $config_code
 * @property string $config_value
 * @property string $config_description
 * @property string $config_type
 */
class MainConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'config_code', 'config_value', 'config_description', 'config_type'
    ];
}
