<?php
/**
 * User: Aleksandrov Artem
 * Date: 26.10.2019
 * Time: 15:06
 */

namespace kradwhite\myTarget\api\resources\push_notifications;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Этот инструмент позволяет пользователям API узнавать об изменении ресурсов API, используя push- вместо pull-модели
 * Class Subscriptions
 * @package kradwhite\myTarget\api\methods\push_notifications
 * @see https://target.my.com/adv/api-marketing/doc/push
 */
class Subscriptions extends Resource
{
    /**
     * Подписаться на уведомления об изменении ресурса
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'subscriptions', ['json' => $params]);
    }

    /**
     * Посмотреть все подписки пользователя
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'subscriptions');
    }

    /**
     * Удалить подписку
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->request('delete', "subscriptions/$id");
    }
}