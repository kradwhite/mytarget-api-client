<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять приложением в соцсети Мой Мир, которое пользователь добавил в доступные
 * для использования в целевых аудиториях источники данных. Приложения можно использовать для настройки
 * таргетинга на их пользователей.
 * Class RemarketingMmApp
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingMmApp
 */
class RemarketingMmApp extends Resource
{
    /**
     * Запрос удаляет указанное приложение из доступных источников данных. Удаление возможно только
     * если приложение не используется ни в одной аудитории.
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "remarketing/mm_apps/$id");
    }
}