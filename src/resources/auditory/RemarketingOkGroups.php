<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять группами и тематиками в соцсети Одноклассники, которые пользователь в доступные
 * для использования в целевых аудиториях источники данных. Группы и тематики можно использовать для настройки
 * таргетинга на пользователей, состоящих в них
 * Class RemarketingOkGroups
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingOkGroups
 */
class RemarketingOkGroups extends Resource
{
    /**
     * Запрос возвращает список всех групп или тематик групп соцсети Одноклассники,
     * добавленных пользователем в источники данных
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/ok_groups');
    }

    /**
     * Запрос добавляет группу или тематику соцсети Одноклассники в список доступных источников данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/ok_groups', ['json' => $params]);
    }
}