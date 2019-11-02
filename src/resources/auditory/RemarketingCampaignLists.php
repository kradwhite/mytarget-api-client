<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять списками рекламных кампаний. Такие списки используются для настройки таргетинга
 * на пользователей, которые видели или кликали по баннерам кампаний из списка
 * Class RemarketingCampaignLists
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingCampaignLists
 */
class RemarketingCampaignLists extends Resource
{
    /**
     * Запрос возвращает все списки рекламных кампаний пользователя
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/campaign_lists');
    }

    /**
     * Запрос добавляет указанный список рекламных кампаний в доступные источники данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/campaign_lists', ['json' => $params]);
    }
}