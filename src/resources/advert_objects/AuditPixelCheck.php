<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 7:45
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий проверить валидность пикселя и узнать о факте использования пикселя аудита в кампаниях
 * Class AuditPixelCheck
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/AuditPixelCheck
 */
class AuditPixelCheck extends Resource
{
    /**
     * @param array $params
     * @return mixed
     */
    public function post(array $params)
    {
        return $this->request('post', 'audit_pixels', ['json' => $params]);
    }
}