<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять категориями приложений Android, добавленными пользователем в источники данных
 * для целевых аудиторий. Категории можно использовать для настройки таргетинга на пользователей соответствующих
 * приложений. Список всех доступных категорий и их ID можно получить из API MobileCategory
 * Class RemarketingAndroidCategories
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingAndroidCategories
 */
class RemarketingAndroidCategories extends Resource
{
    /**
     * Запрос возвращает список всех категорий приложений Android, добавленных пользователем в источники данных
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/android_categories');
    }

    /**
     * Запрос добавляет категорию приложений Android в список доступных источников данных
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/android_categories', ['json' => $params]);
    }
}