<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий управлять lookalike-аудиториями, созданными на основе источника данных: списке пользователей
 * любого типа или счетчике Top@Mail.ru. Такие аудиториипозволяют настроить таргетинг на пользователей, по многим
 * параметрам похожих на уже существующих в исходной аудитории
 * Class LookalikeAudiences
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/LookalikeAudiences
 */
class LookalikeAudiences extends Resource
{
    /**
     * Запрос возвращает список всех lookalike-аудиторий, добавленных пользователем в источники данных
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/lookalike_audiences');
    }

    /**
     * Запрос создает lookalike-аудиторию на основе указанного источника данных. После создания lookalike будет
     * в статусе "pending". Расчет lookalike, как правило, занимает несколько часов, по его окончании аудитория
     * примет статус "loaded"
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'remarketing/lookalike_audiences', ['json' => $params]);
    }
}