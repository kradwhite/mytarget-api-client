<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий создать новый или получить массив существующих списков оффлайн конверсий
 * Class RemarketingOfflineGoals
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingOfflineGoals
 */
class RemarketingOfflineGoals extends Resource
{
    /**
     * Получение массива списков оффлайн конверсий
     * @return mixed
     */
    public function get()
    {
        return $this->request('get', 'remarketing/offline_goals');
    }

    /**
     * Создание списка оффлайн конверсий
     * @param string $file
     * @param array $data
     * @return mixed
     */
    public function post(string $file, array $data)
    {
        if (file_exists($file)) {
            $file = fopen($file, 'r');
        }
        return $this->request(
            'post',
            'remarketing/offline_goals', [
                'multipart' => [
                    ['name' => 'list_users', 'contents' => $file],
                    ['name' => 'data', 'contents' => json_encode($data)]
                ]
            ]
        );
    }
}