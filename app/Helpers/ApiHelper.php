<?php
/**
 * Created by PhpStorm.
 * User: ViA
 * Date: 08.10.2017
 * Time: 21:19
 */

namespace App\Helpers;

class ApiHelper
{
    /**
     * Парсит полученный от Апи ответ - сюда добавлять новые обработчики
     * @param array $array
     * @param $currentApi
     * @return array
     */
    public static function parseJsonResponse (array $array, $currentApi)
    {
        if (isset($array[0])) {
            $array = $array[0];
        }

        $responseArray = [
            'price' => 0,
            'percent' => 0,
        ];

        switch ($currentApi) {
            case 'coinmarketcap':
                $responseArray['price'] = $array['price_usd'];
                $responseArray['percent'] = $array['percent_change_24h'];
                break;
            case 'coincap':
                $responseArray['price'] = $array['price_usd'];
                $responseArray['percent'] = $array['cap24hrChange'];
                break;
        }

        return $responseArray;
    }
}