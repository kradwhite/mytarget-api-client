<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:08
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, представляющий возможность редактировать и удалять списки запрещенных url адресов или мобильных
 * приложений. Эти списки могут использоваться для запрета показа объявлений на входящих в список доменах
 * или мобильных приложениях
 * Class CampaignBlackLists
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/CampaignBlackLists
 */
class CampaignBlackLists extends Resource
{
    /**
     * Получение списка всех запрещенных url адресов или мобильных приложений пользователя
     * @param string $type
     * @return mixed
     */
    public function get(string $type = "")
    {
        $query = $type ? ['type' => $type] : [];
        return $this->request('get', 'place_black_lists', ['query' => $query]);
    }

    /**
     * Создание списка запрещенных url адресов и мобильных приложений
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'place_black_lists', ['json' => $params]);
    }
}