<?php

namespace App\Components;


class Formatter 
{
    /**
     * Генерирует хэш
     * @param $length
     * @return string
     */
    public static function generateHash($length){
        $breakWords = [
            'fuck', 'sex', 'love', 'dick', 'slave', 'master', 'bitch', 'pay', 'war', 'whore', 'anal', 'milf',
            'boobs', 'tits', 'ass', 'cum', 'suck', 'shit', 'php', 'html'
        ];
        $chars = '12345AaBbCcDdEeFfGgHhJjKkLMmNnPpQRrSsTtUuVvWwXxYyZz6789';
        $hash = '';
        for($z = 0; $z <= 100; $z++){
            for ($i = 0; $i < $length; $i++){
                $randKey = rand(0, strlen($chars) - 1);
                $hash .= $chars[$randKey];
            }

            $existsBreak = false;
            foreach ($breakWords as $key => $val){
                if(preg_match('/' .$val .'/', strtolower($hash))){
                    $existsBreak = true;
                }
            }
            if($existsBreak){
                $hash = '';
            }else{
                break;
            }
        }

        return $hash;
    }


    /**
     * Обрезает символы + () - из номера телефона
     * @param $phone
     * @return string|string[]|null
     */
    public static function pregNumberPhone($phone){
        $numberPreg = preg_replace("/[^0-9]/iu", '', $phone);
        return $numberPreg;
    }


    public static function date2str($date){
        $month = ['', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября',
            'октября', 'ноября', 'декабря'];

        return date('d', strtotime($date)) . ' ' .$month[date('n', strtotime($date))] . ' ' .
            date('Y', strtotime($date)) . ' г.';
    }

    public static function date2strShort($date){
        $month = ['', 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен',
            'окт', 'ноя', 'дек'];

        return date('d', strtotime($date)) . ' ' .$month[date('n', strtotime($date))] . ' ' .
            date('Y', strtotime($date)) . ' г.';
    }


    /**
     * Возвращает сокращенное название дня недели
     *
     * @param integer $weekdayIdx - date('w')
     * @return string
     */
    public static function weeknameShort(int $weekdayIdx){
        $weeknames = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
        return $weeknames[$weekdayIdx];
    }

    /**
     * Возвращает название месяца
     *
     * @param [type] $monthIdx - date('n')
     * @return void
     */
    public static function getMonthStrByIdx($monthIdx){
        $month = ['', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь',
            'октябрь', 'ноябрь', 'декабрь'];
        return $month[$monthIdx];
    }


    
}