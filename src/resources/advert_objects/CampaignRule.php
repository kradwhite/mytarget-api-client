<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:13
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Правила, определяющие возможность использовать таргетинги и их значения. Работает примерно как условный
 * оператор: если в поле if есть совпадения для данных создаваемой или обновляемой кампании, то проверяется,
 * что кампания соответствует условиям из поля then.
 * Class CampaignRule
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/CampaignRule
 */
class CampaignRule extends Resource
{
    /**
     * Получение правил
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'campaign_rules');
    }
}