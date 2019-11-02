<?php
/**
 * User: Aleksandrov Artem
 * Date: 21.10.2019
 * Time: 8:17
 */

namespace kradwhite\myTarget\api\resources\advert_objects;

use kradwhite\myTarget\api\resources\Resource;

/**
 * Ресурс, позволяющий загружать креативы, которые в дальнейшем могут быть использованы в рекламных объявлениях.
 * Креативы, загруженные с помощью данного ресурса, могут быть использованы только в тех пакетах, в баннерном
 * формате которых есть секция "content"
 * Class Content
 * @package kradwhite\myTarget\api\methods\advert_objects
 * @see https://target.my.com/doc/api/ru/resource/Content
 */
class Content extends Resource
{
    /**
     * Запрос должен иметь тип multipart/form-data. Для методов static.json и video.json в структуре "data"
     * требуется обязательно указать ширину и высоту исходного креатива в параметрах ("width" и "height" соответственно).
     * Статичные изображения должны загружаться по адресу https://target.my.com/api/v2/content/static.json.
     * Видео должны загружаться по адресу https://target.my.com/api/v2/content/video.json.
     * HTML5-креативы должны загружаться по адресу https://target.my.com/api/v2/content/html5.json.
     * Для этого метода достаточно указать файл, соответствующий требованиям к HTML-5 баннерам
     * (https://sales.mail.ru/ru/russia/main/latest/technical/#a75).
     * @param string $type
     * @param string $file
     * @param array $data
     * @return mixed
     */
    public function post(string $type, string $file, array $data)
    {
        return $this->request('post', "content/$type", ['multipart' => [
            ['name' => 'file', 'contents' => $file],
            ['name' => 'data', 'contents' => json_encode($data)]
        ]]);
    }
}