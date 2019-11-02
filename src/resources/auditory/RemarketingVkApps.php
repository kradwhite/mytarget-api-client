<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять приложениями в соцсети ВКонтакте, которые пользователь добавил в доступные
 * для использования в целевых аудиториях источники данных. Приложения можно использовать для настройки
 * таргетинга на их пользователей
 * Class RemarketingVkApps
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingVkApps
 */
class RemarketingVkApps extends Resource
{
    /**
     * Запрос возвращает список всех приложений соцсети ВКонтакте, добавленных пользователем в источники данных
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/vk_apps');
    }

    /**
     * Запрос добавляет приложение соцсети ВКонтакте в список доступных источников данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/vk_apps', ['json' => $params]);
    }
}