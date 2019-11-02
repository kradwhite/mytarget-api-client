<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс позволяет получить список событий в мобильных приложениях, доступных для использования в целевых аудиториях.
 * События можно использовать для настройки таргетинга на пользователей, уже установивших приложение
 * и совершивших/не совершивших в нем определенных действий, которые вы можете отследить с помощью трекера мобильных
 * приложений.
 * Class RemarketingAppEvents
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingInAppEvents
 */
class RemarketingInAppEvents extends Resource
{
    /**
     * Запрос возвращает список всех событий в мобильных приложениях, доступных для добавления в сегменты аудиторий
     * @param array $params
     * @return mixed
     */
    public function get(array $params = [])
    {
        return $this->request('get', 'remarketing/inapp_events', ['query' => $params]);
    }
}