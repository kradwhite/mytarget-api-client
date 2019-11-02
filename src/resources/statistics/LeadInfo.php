<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:47
 */

namespace kradwhite\myTarget\api\resources\statistics;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий получить информацию по лидам, полученным с помощью рекламных объявлений.
 * Список доступных форм можно получить, запросив этот ресурс.
 * Class LeadInfo
 * @package kradwhite\myTarget\api\methods\statistics
 * @see https://target.my.com/doc/api/ru/resource/LeadInfo
 */
class LeadInfo extends Resource
{
    /**
     * @param string $form_id
     * @param array $filters
     * @return mixed
     */
    public function get(string $form_id, array $filters = [])
    {
        return $this->request('get', "ok/lead_ads/$form_id", ['query' => $filters]);
    }
}