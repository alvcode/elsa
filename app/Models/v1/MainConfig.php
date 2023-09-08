<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    private static $allConfig;

    public static function getByName(string $configName): int|string|array 
    {
        if(!self::$allConfig){
            $data = Cache::store('file')->get('main_configs');
            
            if(!$data){
                $data = self::query()->get();
                Cache::store('file')->put('main_configs', $data, 180);
            }
            foreach($data as $key => $val){
                if($val['config_type'] == 'json'){
                    $data[$key]['config_value'] = json_decode($val['config_value'], true);
                }
            }
            self::$allConfig = $data;
        }

        foreach (self::$allConfig as $key => $val){
            if($val['config_code'] == $configName){
                if($val['config_type'] == 'int'){
                    return (int)$val['config_value'];
                }elseif($val['config_type'] == 'string'){
                    return (string)$val['config_value'];
                }elseif($val['config_type'] == 'json'){
                    return $val['config_value'];
                }
            }
        }

        throw new \Exception('Запрашиваемый конфиг не найден');
    }
}
