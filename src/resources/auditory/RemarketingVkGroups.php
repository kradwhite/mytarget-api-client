<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять группами в соцсети ВКонтакте, которую пользователь добавил в доступные
 * для использования в целевых аудиториях источники данных. Группы можно использовать для настройки
 * таргетинга на их участников.
 * Class RemarketingVkGroups
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingVkGroups
 */
class RemarketingVkGroups extends Resource
{
    /**
     * Запрос возвращает список всех групп соцсети ВКонтакте, добавленных пользователем в источники данных
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/vk_groups');
    }

    /**
     * Запрос добавляет группу соцсети ВКонтакте в список доступных источников данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/vk_groups', ['json' => $params]);
    }
}