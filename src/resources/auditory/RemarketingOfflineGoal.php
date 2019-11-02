<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 11:21
 */

namespace kradwhite\myTarget\api\resources\auditory;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий дозагружать и/или изменять имена списков оффлайн конверсий
 * Class RemarketingOfflineGoal
 * @package kradwhite\myTarget\api\methods\auditory
 * @see https://target.my.com/doc/api/ru/resource/RemarketingOfflineGoal
 */
class RemarketingOfflineGoal extends Resource
{
    /**
     * @param string $id
     * @param string $file
     * @param array $data
     * @return mixed
     */
    public function post(string $id, string $file, array $data)
    {
        if (file_exists($file)) {
            $file = fopen($file, 'r');
        }
        return $this->request(
            'post',
            "remarketing/offline_goals/$id", [
                'multipart' => [
                    ['name' => 'list_users', 'contents' => $file],
                    ['name' => 'data', 'contents' => json_encode($data)]
                ]
            ]
        );
    }
}