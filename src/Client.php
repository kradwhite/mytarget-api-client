<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 14:44
 */

namespace kradwhite\myTarget\api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\TransferException;
use kradwhite\myTarget\api\exceptions\AccessTokenException;
use kradwhite\myTarget\api\exceptions\TransportException;
use kradwhite\myTarget\api\resources\advert_objects\AuditPixelCheck;
use kradwhite\myTarget\api\resources\advert_objects\Banner;
use kradwhite\myTarget\api\resources\advert_objects\BannerFormats;
use kradwhite\myTarget\api\resources\advert_objects\BannerMassAction;
use kradwhite\myTarget\api\resources\advert_objects\BannerMassReplace;
use kradwhite\myTarget\api\resources\advert_objects\Banners;
use kradwhite\myTarget\api\resources\advert_objects\Campaign;
use kradwhite\myTarget\api\resources\advert_objects\CampaignBanners;
use kradwhite\myTarget\api\resources\advert_objects\CampaignBlackList;
use kradwhite\myTarget\api\resources\advert_objects\CampaignBlackLists;
use kradwhite\myTarget\api\resources\advert_objects\CampaignMassAction;
use kradwhite\myTarget\api\resources\advert_objects\CampaignRule;
use kradwhite\myTarget\api\resources\advert_objects\Campaigns;
use kradwhite\myTarget\api\resources\advert_objects\Content;
use kradwhite\myTarget\api\resources\advert_objects\CreateUrl;
use kradwhite\myTarget\api\resources\advert_objects\Packages;
use kradwhite\myTarget\api\resources\advert_objects\PackagesPads;
use kradwhite\myTarget\api\resources\advert_objects\PadsTree;
use kradwhite\myTarget\api\resources\advert_objects\ProjectionPrediction;
use kradwhite\myTarget\api\resources\advert_objects\ReadUrl;
use kradwhite\myTarget\api\resources\advert_objects\ReadUrls;
use kradwhite\myTarget\api\resources\advert_objects\TargetingsTree;
use kradwhite\myTarget\api\resources\auditory\AudienceScoreStats;
use kradwhite\myTarget\api\resources\auditory\CounterGoal;
use kradwhite\myTarget\api\resources\auditory\CounterGoals;
use kradwhite\myTarget\api\resources\auditory\DmpProviders;
use kradwhite\myTarget\api\resources\auditory\DmpRequest;
use kradwhite\myTarget\api\resources\auditory\DmpSegment;
use kradwhite\myTarget\api\resources\auditory\GeoCoverage;
use kradwhite\myTarget\api\resources\auditory\Goals;
use kradwhite\myTarget\api\resources\auditory\LocalGeo;
use kradwhite\myTarget\api\resources\auditory\LocalGeos;
use kradwhite\myTarget\api\resources\auditory\LookalikeAudience;
use kradwhite\myTarget\api\resources\auditory\LookalikeAudiences;
use kradwhite\myTarget\api\resources\auditory\RemarketingAndroidCategories;
use kradwhite\myTarget\api\resources\auditory\RemarketingAndroidCategory;
use kradwhite\myTarget\api\resources\auditory\RemarketingCampaignList;
use kradwhite\myTarget\api\resources\auditory\RemarketingCampaignLists;
use kradwhite\myTarget\api\resources\auditory\RemarketingCounter;
use kradwhite\myTarget\api\resources\auditory\RemarketingCounters;
use kradwhite\myTarget\api\resources\auditory\RemarketingInAppEvents;
use kradwhite\myTarget\api\resources\auditory\RemarketingMmApp;
use kradwhite\myTarget\api\resources\auditory\RemarketingMmApps;
use kradwhite\myTarget\api\resources\auditory\RemarketingOfflineGoal;
use kradwhite\myTarget\api\resources\auditory\RemarketingOfflineGoals;
use kradwhite\myTarget\api\resources\auditory\RemarketingOkApp;
use kradwhite\myTarget\api\resources\auditory\RemarketingOkApps;
use kradwhite\myTarget\api\resources\auditory\RemarketingOkGroup;
use kradwhite\myTarget\api\resources\auditory\RemarketingOkGroups;
use kradwhite\myTarget\api\resources\auditory\RemarketingPriceList;
use kradwhite\myTarget\api\resources\auditory\RemarketingPriceLists;
use kradwhite\myTarget\api\resources\auditory\RemarketingUserGeo;
use kradwhite\myTarget\api\resources\auditory\RemarketingUserGeos;
use kradwhite\myTarget\api\resources\auditory\RemarketingUsersList;
use kradwhite\myTarget\api\resources\auditory\RemarketingUsersLists;
use kradwhite\myTarget\api\resources\auditory\RemarketingVkApp;
use kradwhite\myTarget\api\resources\auditory\RemarketingVkApps;
use kradwhite\myTarget\api\resources\auditory\RemarketingVkGroup;
use kradwhite\myTarget\api\resources\auditory\RemarketingVkGroups;
use kradwhite\myTarget\api\resources\auditory\Segment;
use kradwhite\myTarget\api\resources\auditory\SegmentRelation;
use kradwhite\myTarget\api\resources\auditory\SegmentRelations;
use kradwhite\myTarget\api\resources\auditory\SegmentRelationsDelete;
use kradwhite\myTarget\api\resources\auditory\Segments;
use kradwhite\myTarget\api\resources\auditory\SharingKey;
use kradwhite\myTarget\api\resources\auditory\SharingKeyUser;
use kradwhite\myTarget\api\resources\contextual_targeting\SearchPhrasesList;
use kradwhite\myTarget\api\resources\contextual_targeting\SearchPhrasesListDownloadCsv;
use kradwhite\myTarget\api\resources\contextual_targeting\SearchPhrasesListErrors;
use kradwhite\myTarget\api\resources\contextual_targeting\SearchPhrasesLists;
use kradwhite\myTarget\api\resources\finance\Transaction;
use kradwhite\myTarget\api\resources\finance\TransactionGroups;
use kradwhite\myTarget\api\resources\limits\Throttling;
use kradwhite\myTarget\api\resources\partner_platforms\BannerTopics;
use kradwhite\myTarget\api\resources\partner_platforms\GroupPad;
use kradwhite\myTarget\api\resources\partner_platforms\GroupPadPad;
use kradwhite\myTarget\api\resources\partner_platforms\GroupPadPads;
use kradwhite\myTarget\api\resources\partner_platforms\GroupPads;
use kradwhite\myTarget\api\resources\partner_platforms\Pad;
use kradwhite\myTarget\api\resources\partner_platforms\PlatformPad;
use kradwhite\myTarget\api\resources\price_lists\PricelistImportErrors;
use kradwhite\myTarget\api\resources\push_notifications\Subscriptions;
use kradwhite\myTarget\api\resources\references\AppleApp;
use kradwhite\myTarget\api\resources\references\GoogleApp;
use kradwhite\myTarget\api\resources\references\InAppEventCategories;
use kradwhite\myTarget\api\resources\references\MobileCategory;
use kradwhite\myTarget\api\resources\references\MobileOperationSystem;
use kradwhite\myTarget\api\resources\references\MobileOperator;
use kradwhite\myTarget\api\resources\references\MobileTypes;
use kradwhite\myTarget\api\resources\references\MobileVendors;
use kradwhite\myTarget\api\resources\references\Region;
use kradwhite\myTarget\api\resources\references\UserGeo;
use kradwhite\myTarget\api\resources\references\VkGroup;
use kradwhite\myTarget\api\resources\references\WindowsPhoneApp;
use kradwhite\myTarget\api\resources\statistics\LeadForm;
use kradwhite\myTarget\api\resources\statistics\LeadInfo;
use kradwhite\myTarget\api\resources\statistics\Statistics;
use kradwhite\myTarget\api\resources\statistics\StatisticsFast;
use kradwhite\myTarget\api\resources\statistics\StatisticsGoals;
use kradwhite\myTarget\api\resources\statistics\StatisticsInApp;
use kradwhite\myTarget\api\resources\statistics\StatisticsOfflineConversions;
use kradwhite\myTarget\api\resources\statistics\StatisticsUnique;
use kradwhite\myTarget\api\resources\users\AgencyClient;
use kradwhite\myTarget\api\resources\users\AgencyClients;
use kradwhite\myTarget\api\resources\users\AgencyClientsCount;
use kradwhite\myTarget\api\resources\users\AgencyManager;
use kradwhite\myTarget\api\resources\users\AgencyManagerClient;
use kradwhite\myTarget\api\resources\users\AgencyManagerClientMassAction;
use kradwhite\myTarget\api\resources\users\AgencyManagerClients;
use kradwhite\myTarget\api\resources\users\AgencyManagers;
use kradwhite\myTarget\api\resources\users\BranchClient;
use kradwhite\myTarget\api\resources\users\BranchClients;
use kradwhite\myTarget\api\resources\users\BranchClientsCount;
use kradwhite\myTarget\api\resources\users\ManagerClient;
use kradwhite\myTarget\api\resources\users\ManagerClients;
use kradwhite\myTarget\api\resources\users\ManagerClientsCount;
use kradwhite\myTarget\api\resources\users\ReservedAmounts;
use kradwhite\myTarget\api\resources\users\User;
use kradwhite\myTarget\api\transport\Transport;
use kradwhite\myTarget\api\transport\TransportInterface;

/**
 * Class api
 * @package kradwhite\myTarget\api
 * @see https://target.my.com/adv/api-marketing/
 */
final class Client
{
    /** @var TransportInterface */
    private $transport;

    /**
     * Api constructor.
     * @param string $accessToken
     * @param array $config
     * @throws AccessTokenException
     * @throws TransportException
     */
    public function __construct(string $accessToken, array $config = [])
    {
        if (!$accessToken) {
            throw new AccessTokenException("Не передан токен доступа", 401);
        }
        $this->transport = $this->buildTransport($this->buildClient($accessToken, $config), $config);
    }

    /**
     * @return int
     */
    public function getLastResponseCode(): int
    {
        return $this->transport->getLastResponseCode();
    }

    /**
     * @return array
     */
    public function getLastResponseHeaders(): array
    {
        return $this->transport->getLastResponseHeaders();
    }

    /**
     * Ресурс, позволяющий построить гистограмму типовой аудитории
     * @see https://target.my.com/doc/api/ru/resource/AudienceScoreStats
     * @return AudienceScoreStats
     */
    public function audienceScoreStats(): AudienceScoreStats
    {
        return new AudienceScoreStats($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять целями счетчика Top@Mail.ru
     * @see https://target.my.com/doc/api/ru/resource/CounterGoal
     * @return CounterGoal
     */
    public function counterGoal(): CounterGoal
    {
        return new CounterGoal($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять целями счетчика Top@Mail.ru
     * @see https://target.my.com/doc/api/ru/resource/CounterGoals
     * @return CounterGoals
     */
    public function counterGoals(): CounterGoals
    {
        return new CounterGoals($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о партнерских DMP, которые поддерживают запрос данных/доступа
     * к сегментам аудитории
     * @see https://target.my.com/doc/api/ru/resource/DmpProviders
     * @return DmpProviders
     */
    public function dmpProviders(): DmpProviders
    {
        return new DmpProviders($this->transport);
    }

    /**
     * Ресурс позволяет отправить запрос партнерскому DMP на предоставление доступа к сегменту аудитории
     * Доступно если партнерский DMP поддерживает такую возможность
     * @see https://target.my.com/doc/api/ru/resource/DmpRequest
     * @return DmpRequest
     */
    public function dmpRequest(): DmpRequest
    {
        return new DmpRequest($this->transport);
    }

    /**
     * Ресурс, позволяющий получить списки пользователей от партнерских DMP. Такие списки используются
     * для настройки таргетинга на аудиторию пользователей, полученную из внешнего источника
     * @see https://target.my.com/doc/api/ru/resource/DmpSegment
     * @return DmpSegment
     */
    public function dmpSegment(): DmpSegment
    {
        return new DmpSegment($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию об охвате пользователей в заданной географической области
     * @see https://target.my.com/doc/api/ru/resource/GeoCoverage
     * @return GeoCoverage
     */
    public function geoCoverage(): GeoCoverage
    {
        return new GeoCoverage($this->transport);
    }

    /**
     * Ресурс позволяет получить список всех целей, доступных для таргетирования или получения статистики
     * Список содержит цели счётчиков Top@Mail.ru, действий для приложений и групп социальных сетей
     * и установки мобильных приложений
     * @see https://target.my.com/doc/api/ru/resource/Goals
     * @return Goals
     */
    public function goals(): Goals
    {
        return new Goals($this->transport);
    }

    /**
     * Ресурс для управления списками локальной географии. После создания списков их можно включить в сегмент,
     * который можно включить в таргетинг кампании
     * @see https://target.my.com/doc/api/ru/resource/LocalGeo
     * @return LocalGeo
     */
    public function localGeo(): LocalGeo
    {
        return new LocalGeo($this->transport);
    }

    /**
     * Ресурс для управления списками локальной географии. После создания списков их можно включить в сегмент,
     * который можно включить в таргетинг кампании
     * @see https://target.my.com/doc/api/ru/resource/LocalGeos
     * @return LocalGeos
     */
    public function localGeos(): LocalGeos
    {
        return new LocalGeos($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять lookalike-аудиторией, созданной на основе источника данных: списке
     * пользователей любого типа или счетчике Top@Mail.ru. Такие аудитории позволяют настроить таргетинг
     * на пользователей, по многим параметрам похожих на уже существующих в исходной аудитории
     * @see https://target.my.com/doc/api/ru/resource/LookalikeAudience
     * @return LookalikeAudience
     */
    public function lookalikeAudience(): LookalikeAudience
    {
        return new LookalikeAudience($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять lookalike-аудиториями, созданными на основе источника данных: списке
     * пользователей любого типа или счетчике Top@Mail.ru. Такие аудиториипозволяют настроить таргетинг
     * на пользователей, по многим параметрам похожих на уже существующих в исходной аудитории
     * @see https://target.my.com/doc/api/ru/resource/LookalikeAudiences
     * @return LookalikeAudiences
     */
    public function lookalikeAudiences(): LookalikeAudiences
    {
        return new LookalikeAudiences($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять категориями приложений Android, добавленными пользователем в источники
     * данных для целевых аудиторий. Категории можно использовать для настройки таргетинга на пользователей
     * соответствующих приложений. Список всех доступных категорий и их ID можно получить из API MobileCategory
     * @see https://target.my.com/doc/api/ru/resource/RemarketingAndroidCategories
     * @return RemarketingAndroidCategories
     */
    public function remarketingAndroidCategories(): RemarketingAndroidCategories
    {
        return new RemarketingAndroidCategories($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять категорией приложений Android, добавленной пользователем в источники
     * данных для целевых аудиторий. Категории можно использовать для настройки таргетинга на пользователей
     * соответствующих приложений. Список всех доступных категорий и их ID можно получить из API MobileCategory
     * @see https://target.my.com/doc/api/ru/resource/RemarketingAndroidCategory
     * @return RemarketingAndroidCategory
     */
    public function remarketingAndroidCategory(): RemarketingAndroidCategory
    {
        return new RemarketingAndroidCategory($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять списком рекламных кампаний. Такие списки используются для настройки
     * таргетинга на пользователей, которые видели или кликали по баннерам кампаний из списка
     * @see https://target.my.com/doc/api/ru/resource/RemarketingCampaignList
     * @return RemarketingCampaignList
     */
    public function remarketingCampaignList(): RemarketingCampaignList
    {
        return new RemarketingCampaignList($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять списками рекламных кампаний. Такие списки используются для настройки
     * таргетинга на пользователей, которые видели или кликали по баннерам кампаний из списка
     * @see https://target.my.com/doc/api/ru/resource/RemarketingCampaignLists
     * @return RemarketingCampaignLists
     */
    public function remarketingCampaignLists(): RemarketingCampaignLists
    {
        return new RemarketingCampaignLists($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять счетчиком Top@Mail.ru. Счетчики используются для настройки таргетинга
     * на пользователей, которые посещали сайт, где он установлен
     * @see https://target.my.com/doc/api/ru/resource/RemarketingCounter
     * @return RemarketingCounter
     */
    public function remarketingCounter(): RemarketingCounter
    {
        return new RemarketingCounter($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять счетчиками Top@Mail.ru, добавленных пользователем в доступные
     * для использования в целевых аудиториях источники данных. Счетчики используются для настройки
     * таргетинга на пользователей, которые посещали сайт, где он установлен
     * @see https://target.my.com/doc/api/ru/resource/RemarketingCounters
     * @return RemarketingCounters
     */
    public function remarketingCounters(): RemarketingCounters
    {
        return new RemarketingCounters($this->transport);
    }

    /**
     * Ресурс позволяет получить список событий в мобильных приложениях, доступных для использования
     * в целевых аудиториях. События можно использовать для настройки таргетинга на пользователей,
     * уже установивших приложение и совершивших/не совершивших в нем определенных действий, которые
     * вы можете отследить с помощью трекера мобильных приложений
     * @see https://target.my.com/doc/api/ru/resource/RemarketingInAppEvents
     * @return RemarketingInAppEvents
     */
    public function remarketingInAppEvents(): RemarketingInAppEvents
    {
        return new RemarketingInAppEvents($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять приложением в соцсети Мой Мир, которое пользователь добавил в доступные
     * для использования в целевых аудиториях источники данных. Приложения можно использовать для настройки
     * таргетинга на их пользователей
     * @see https://target.my.com/doc/api/ru/resource/RemarketingMmApp
     * @return RemarketingMmApp
     */
    public function remarketingMmApp(): RemarketingMmApp
    {
        return new RemarketingMmApp($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять приложениями в соцсети Мой Мир, которые пользователь добавил в доступные
     * для использования в целевых аудиториях источники данных. Приложения можно использовать для настройки
     * таргетинга на их пользователей
     * @see https://target.my.com/doc/api/ru/resource/RemarketingMmApps
     * @return RemarketingMmApps
     */
    public function remarketingMmApps(): RemarketingMmApps
    {
        return new RemarketingMmApps($this->transport);
    }

    /**
     * Ресурс, позволяющий дозагружать и/или изменять имена списков оффлайн конверсий
     * @see https://target.my.com/doc/api/ru/resource/RemarketingOfflineGoal
     * @return RemarketingOfflineGoal
     */
    public function remarketingOfflineGoal(): RemarketingOfflineGoal
    {
        return new RemarketingOfflineGoal($this->transport);
    }

    /**
     * Ресурс, позволяющий создать новый или получить массив существующих списков оффлайн конверсий
     * @see https://target.my.com/doc/api/ru/resource/RemarketingOfflineGoals
     * @return RemarketingOfflineGoals
     */
    public function remarketingOfflineGoals(): RemarketingOfflineGoals
    {
        return new RemarketingOfflineGoals($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять приложением в соцсети Одноклассники, которое пользователь добавил
     * в доступные для использования в целевых аудиториях источники данных. Приложения можно использовать
     * для настройки таргетинга на их пользователей
     * @see https://target.my.com/doc/api/ru/resource/RemarketingOkApp
     * @return RemarketingOkApp
     */
    public function remarketingOkApp(): RemarketingOkApp
    {
        return new RemarketingOkApp($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять приложениями в соцсети Одноклассники, которые пользователь добавил
     * в доступные для использования в целевых аудиториях источники данных. Приложения можно использовать
     * для настройки таргетинга на их пользователей
     * @see https://target.my.com/doc/api/ru/resource/RemarketingOkApps
     * @return RemarketingOkApps
     */
    public function remarketingOkApps(): RemarketingOkApps
    {
        return new RemarketingOkApps($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять группой или тематикой в соцсети Одноклассники, которую пользователь
     * добавил в доступные для использования в целевых аудиториях источники данных. Группы и тематики можно
     * использовать для настройки таргетинга на пользователей, состоящих в них
     * @see https://target.my.com/doc/api/ru/resource/RemarketingOkGroup
     * @return RemarketingOkGroup
     */
    public function remarketingOkGroup(): RemarketingOkGroup
    {
        return new RemarketingOkGroup($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять группами и тематиками в соцсети Одноклассники, которые пользователь
     * в доступные для использования в целевых аудиториях источники данных. Группы и тематики можно
     * использовать для настройки таргетинга на пользователей, состоящих в них
     * @see https://target.my.com/doc/api/ru/resource/RemarketingOkGroups
     * @return RemarketingOkGroups
     */
    public function remarketingOkGroups(): RemarketingOkGroups
    {
        return new RemarketingOkGroups($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять прайс-листом динамического ремаркетинга. Такие прайс-листы позволяют
     * автоматически создавать объявления для рекламирования определенных товаров или услуг пользователям,
     * которые ранее просматривали страницы вашего сайта, посвященные этим товарам или услугам
     * @see https://target.my.com/doc/api/ru/resource/RemarketingPricelist
     * @return RemarketingPriceList
     */
    public function remarketingPriceList(): RemarketingPriceList
    {
        return new RemarketingPriceList($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять прайс-листами динамического ремаркетинга. Такие прайс-листы позволяют
     * автоматически создавать объявления для рекламирования определенных товаров или услуг пользователям,
     * которые ранее просматривали страницы вашего сайта, посвященные этим товарам или услугам
     * @see https://target.my.com/doc/api/ru/resource/RemarketingPricelists
     * @return RemarketingPriceLists
     */
    public function remarketingPriceLists(): RemarketingPriceLists
    {
        return new RemarketingPriceLists($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять списками регионов, указанных пользователями. После создания списков
     * их можно включить в аудиторию, которую можно включить в таргетинг кампании
     * @see https://target.my.com/doc/api/ru/resource/RemarketingUserGeo
     * @return RemarketingUserGeo
     */
    public function remarketingUserGeo(): RemarketingUserGeo
    {
        return new RemarketingUserGeo($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять списками регионов, указанных пользователями. После создания списков
     * их можно включить в аудиторию, которую можно включить в таргетинг кампании
     * @see https://target.my.com/doc/api/ru/resource/RemarketingUserGeos
     * @return RemarketingUserGeos
     */
    public function remarketingUserGeos(): RemarketingUserGeos
    {
        return new RemarketingUserGeos($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять списком пользователей. Такие списки используются для настройки
     * таргетинга на аудиторию, полученную из внешнего источника
     * @see https://target.my.com/doc/api/ru/resource/RemarketingUsersList
     * @return RemarketingUsersList
     */
    public function remarketingUsersList(): RemarketingUsersList
    {
        return new RemarketingUsersList($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять списками пользователей. Такие списки используются для настройки
     * таргетинга на аудиторию пользователей, полученную из внешнего источника
     * @see https://target.my.com/doc/api/ru/resource/RemarketingUsersLists
     * @return RemarketingUsersLists
     */
    public function remarketingUsersLists(): RemarketingUsersLists
    {
        return new RemarketingUsersLists($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять приложением в соцсети ВКонтакте, которое пользователь добавил в доступные
     * для использования в целевых аудиториях источники данных. Приложения можно использовать для настройки
     * таргетинга на их пользователей
     * @see https://target.my.com/doc/api/ru/resource/RemarketingVkApp
     * @return RemarketingVkApp
     */
    public function remarketingVkApp(): RemarketingVkApp
    {
        return new RemarketingVkApp($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять приложениями в соцсети ВКонтакте, которые пользователь добавил в доступные
     * для использования в целевых аудиториях источники данных. Приложения можно использовать для настройки
     * таргетинга на их пользователей
     * @see https://target.my.com/doc/api/ru/resource/RemarketingVkApps
     * @return RemarketingVkApps
     */
    public function remarketingVkApps(): RemarketingVkApps
    {
        return new RemarketingVkApps($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять группой в соцсети ВКонтакте, которую пользователь добавил в доступные
     * для использования в целевых аудиториях источники данных. Группы можно использовать для настройки
     * таргетинга на их участников
     * @see https://target.my.com/doc/api/ru/resource/RemarketingVkGroup
     * @return RemarketingVkGroup
     */
    public function remarketingVkGroup(): RemarketingVkGroup
    {
        return new RemarketingVkGroup($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять группами в соцсети ВКонтакте, которую пользователь добавил в доступные
     * для использования в целевых аудиториях источники данных. Группы можно использовать для настройки
     * таргетинга на их участников
     * @see https://target.my.com/doc/api/ru/resource/RemarketingVkGroups
     * @return RemarketingVkGroups
     */
    public function remarketingVkGroups(): RemarketingVkGroups
    {
        return new RemarketingVkGroups($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять сегментом аудитории
     * @see https://target.my.com/doc/api/ru/resource/Segment
     * @return Segment
     */
    public function segment(): Segment
    {
        return new Segment($this->transport);
    }

    /**
     * Ресурс, позволяющий изменять параметры источника данных в сегменте аудитории
     * @see https://target.my.com/doc/api/ru/resource/SegmentRelation
     * @return SegmentRelation
     */
    public function segmentRelation(): SegmentRelation
    {
        return new SegmentRelation($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять источниками данных, входящими в сегмент аудитории
     * @see https://target.my.com/doc/api/ru/resource/SegmentRelations
     * @return SegmentRelations
     */
    public function segmentRelations(): SegmentRelations
    {
        return new SegmentRelations($this->transport);
    }

    /**
     * Ресурс, позволяющий массово удалять источники данных из сегмента аудитории
     * @see https://target.my.com/doc/api/ru/resource/SegmentRelationsDelete
     * @return SegmentRelationsDelete
     */
    public function segmentRelationsDelete(): SegmentRelationsDelete
    {
        return new SegmentRelationsDelete($this->transport);
    }

    /**
     * Ресурс, позволяющий управлять сегментами аудитории
     * @see https://target.my.com/doc/api/ru/resource/Segments
     * @return Segments
     */
    public function segments(): Segments
    {
        return new Segments($this->transport);
    }

    /**
     * Ресурс, позволяющий создавать ключи доступа к источникам данных (спискам пользователей, счётчикам и т.п.)
     * @see https://target.my.com/doc/api/ru/resource/SharingKey
     * @return SharingKey
     */
    public function sharingKey(): SharingKey
    {
        return new SharingKey($this->transport);
    }

    /**
     * Ресурс, позволяющий активировать и удалять ключи доступа к сторонним источникам данных (спискам пользователей,
     * счётчикам и т.п.). При активации ключа, сегменты им предоставляемые, будут добавлены в список сегментов
     * текущего пользователя. Удалить ключ может только владелец ключа
     * @see https://target.my.com/doc/api/ru/resource/SharingKeyUser
     * @return SharingKeyUser
     */
    public function sharingKeyUser(): SharingKeyUser
    {
        return new SharingKeyUser($this->transport);
    }

    /**
     * Ресурс, предоставляющий список тематик баннеров
     * @see https://target.my.com/doc/api/ru/resource/BannerTopics
     * @return BannerTopics
     */
    public function bannerTopics(): BannerTopics
    {
        return new BannerTopics($this->transport);
    }

    /**
     * Ресурс, позволяющий читать/редактировать рекламную площадку
     * @see https://target.my.com/doc/api/ru/resource/GroupPad
     * @return GroupPad
     */
    public function groupPad(): GroupPad
    {
        return new GroupPad($this->transport);
    }

    /**
     * Ресурс, позволяющий читать/редактировать блок рекламной площадки
     * @see https://target.my.com/doc/api/ru/resource/GroupPadPad
     * @return GroupPadPad
     */
    public function groupPadPad(): GroupPadPad
    {
        return new GroupPadPad($this->transport);
    }

    /**
     * Ресурс, позволяющий создавать блок рекламной площадки
     * @see https://target.my.com/doc/api/ru/resource/GroupPadPads
     * @return GroupPadPads
     */
    public function groupPadPads(): GroupPadPads
    {
        return new GroupPadPads($this->transport);
    }

    /**
     * Ресурс, позволяющий читать/создавать рекламные площадки
     * @see https://target.my.com/doc/api/ru/resource/GroupPads
     * @return GroupPads
     */
    public function groupPads(): GroupPads
    {
        return new GroupPads($this->transport);
    }

    /**
     * Ресурс, позволяющий читать/редактировать блок рекламной площадки
     * @see https://target.my.com/doc/api/ru/resource/Pad
     * @return Pad
     */
    public function pad(): Pad
    {
        return new Pad($this->transport);
    }

    /**
     * Ресурс для чтения платформенных и форматных площадок
     * @see https://target.my.com/doc/api/ru/resource/PlatformPad
     * @return PlatformPad
     */
    public function platformPad(): PlatformPad
    {
        return new PlatformPad($this->transport);
    }

    /**
     * Ресурс позволяет управлять учетными записями клиентов агентства
     * @see https://target.my.com/doc/api/ru/resource/AgencyClient
     * @return AgencyClient
     */
    public function agencyClient(): AgencyClient
    {
        return new AgencyClient($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о существующих клиентах агентства и создать новых.
     * @see https://target.my.com/doc/api/ru/resource/AgencyClients
     * @return AgencyClients
     */
    public function agencyClients(): AgencyClients
    {
        return new AgencyClients($this->transport);
    }

    /**
     * Ресурс позволяет получить данные о количестве клиентов агентства с определенным статусом
     * @see https://target.my.com/doc/api/ru/resource/AgencyClientsCount
     * @return AgencyClientsCount
     */
    public function agencyClientsCount(): AgencyClientsCount
    {
        return new AgencyClientsCount($this->transport);
    }

    /**
     * Ресурс позволяет управлять учетными записями менеджеров агентства
     * @see https://target.my.com/doc/api/ru/resource/AgencyManager
     * @return AgencyManager
     */
    public function agencyManager(): AgencyManager
    {
        return new AgencyManager($this->transport);
    }

    /**
     * Ресурс позволяет управлять учетными записями клиентов, находящихся в ведении менеджера агентства
     * @see https://target.my.com/doc/api/ru/resource/AgencyManagerClient
     * @return AgencyManagerClient
     */
    public function agencyManagerClient(): AgencyManagerClient
    {
        return new AgencyManagerClient($this->transport);
    }

    /**
     * Ресурс позволяет массово привязать существующих клиентов агентства к менеджеру
     * @see https://target.my.com/doc/api/ru/resource/AgencyManagerClientMassAction
     * @return AgencyManagerClientMassAction
     */
    public function agencyManagerClientMassAction(): AgencyManagerClientMassAction
    {
        return new AgencyManagerClientMassAction($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о клиентах менеджера и передать существующего клиента агентства менеджеру
     * @see https://target.my.com/doc/api/ru/resource/AgencyManagerClients
     * @return AgencyManagerClients
     */
    public function agencyManagerClients(): AgencyManagerClients
    {
        return new AgencyManagerClients($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о менеджерах агентства и создать нового менеджера
     * @see https://target.my.com/doc/api/ru/resource/AgencyManagers
     * @return AgencyManagers
     */
    public function agencyManagers(): AgencyManagers
    {
        return new AgencyManagers($this->transport);
    }

    /**
     * Ресурс позволяет управлять учетными записями клиентов представительства
     * @see https://target.my.com/doc/api/ru/resource/BranchClient
     * @return BranchClient
     */
    public function branchClient(): BranchClient
    {
        return new BranchClient($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о существующих клиентах представительства и создать новых
     * @see https://target.my.com/doc/api/ru/resource/BranchClients
     * @return BranchClients
     */
    public function branchClients(): BranchClients
    {
        return new BranchClients($this->transport);
    }

    /**
     * Ресурс позволяет получить данные о количестве клиентов представительства с определенным статусом
     * @see https://target.my.com/doc/api/ru/resource/BranchClientsCount
     * @return BranchClientsCount
     */
    public function branchClientsCount(): BranchClientsCount
    {
        return new BranchClientsCount($this->transport);
    }

    /**
     * Ресурс позволяет управлять учетными записями клиентов менеджера
     * @see https://target.my.com/doc/api/ru/resource/ManagerClient
     * @return ManagerClient
     */
    public function managerClient(): ManagerClient
    {
        return new ManagerClient($this->transport);
    }

    /**
     * Ресурс для получения информации о клиентах менеджера
     * @see https://target.my.com/doc/api/ru/resource/ManagerClients
     * @return ManagerClients
     */
    public function managerClients(): ManagerClients
    {
        return new ManagerClients($this->transport);
    }

    /**
     * Ресурс позволяет получить данные о количестве клиентов менеджера с определенным статусом
     * @see https://target.my.com/doc/api/ru/resource/ManagerClientsCount
     * @return ManagerClientsCount
     */
    public function managerClientsCount(): ManagerClientsCount
    {
        return new ManagerClientsCount($this->transport);
    }

    /**
     * Ресурс для получения информации о средствах клиентов агентства
     * @see https://target.my.com/doc/api/ru/resource/ReservedAmounts
     * @return ReservedAmounts
     */
    public function reservedAmounts(): ReservedAmounts
    {
        return new ReservedAmounts($this->transport);
    }

    /**
     * Ресурс, позволяющий собрать основную информацию о пользователе
     * @see https://target.my.com/doc/api/ru/resource/User
     * @return User
     */
    public function user(): User
    {
        return new User($this->transport);
    }

    /**
     * Ресурс, позволяющий получить список ошибок импорта прайс-листов
     * @see https://target.my.com/doc/api/ru/resource/PricelistImportErrors
     * @return PricelistImportErrors
     */
    public function pricelistImportErrors(): PricelistImportErrors
    {
        return new PricelistImportErrors($this->transport);
    }

    /**
     * Ресурс, позволяющий проверить валидность пикселя и узнать о факте использования пикселя аудита в кампаниях
     * @see https://target.my.com/doc/api/ru/resource/AuditPixelCheck
     * @return AuditPixelCheck
     */
    public function auditPixelCheck(): AuditPixelCheck
    {
        return new AuditPixelCheck($this->transport);
    }

    /**
     * Ресурс, позволяющий получать, обновлять и удалять рекламные объявления. Создание баннеров осуществляется
     * с помощью ресурса CampaignBanners
     * @see https://target.my.com/doc/api/ru/resource/Banner
     * @return Banner
     */
    public function banner(): Banner
    {
        return new Banner($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о баннерных форматах. Баннерный формат это набор требований,
     * которым должен соответствовать баннер, создаваемый внутри рекламной кампании на основании пакета,
     * с указанным баннерным форматом
     * @see https://target.my.com/doc/api/ru/resource/BannerFormats
     * @return BannerFormats
     */
    public function bannerFormats(): BannerFormats
    {
        return new BannerFormats($this->transport);
    }

    /**
     * Ресурс, позволяющий массово обновлять статусы баннеров (не более 200 за раз). Обновление происходит
     * транзакционно: при возникновении ошибки обновления хотя бы одного объекта ни одно изменение не применится
     * @see https://target.my.com/doc/api/ru/resource/BannerMassAction
     * @return BannerMassAction
     */
    public function bannerMassAction(): BannerMassAction
    {
        return new BannerMassAction($this->transport);
    }

    /**
     * Ресурс для массовой регистрозависимой замены содержимого текстблоков и ссылок рекламных объявлений
     * Обрабатывает вплоть до 200 объектов за 1 запрос
     * @see https://target.my.com/doc/api/ru/resource/BannerMassReplace
     * @return BannerMassReplace
     */
    public function bannerMassReplace(): BannerMassReplace
    {
        return new BannerMassReplace($this->transport);
    }

    /**
     * Ресурс, позволяющий получить список всех рекламных объявлений пользователя. Создание баннеров
     * осуществляется с помощью ресурса CampaignBanners
     * @see https://target.my.com/doc/api/ru/resource/Banners
     * @return Banners
     */
    public function banners(): Banners
    {
        return new Banners($this->transport);
    }

    /**
     * Ресурс позволяющий получить/редактировать одну рекламную кампанию
     * @see https://target.my.com/doc/api/ru/resource/Campaign
     * @return Campaign
     */
    public function campaign(): Campaign
    {
        return new Campaign($this->transport);
    }

    /**
     * Ресурс, позволяющий создавать рекламные объявления внутри кампании
     * @see https://target.my.com/doc/api/ru/resource/CampaignBanners
     * @return CampaignBanners
     */
    public function campaignBanners(): CampaignBanners
    {
        return new CampaignBanners($this->transport);
    }

    /**
     * Ресурс, представляющий возможность редактировать и удалять списки запрещенных url адресов или мобильных
     * приложений. Эти списки могут использоваться для запрета показа объявлений на входящих в список доменах
     * или мобильных приложениях
     * @see https://target.my.com/doc/api/ru/resource/CampaignBlackList
     * @return CampaignBlackList
     */
    public function campaignBlackList(): CampaignBlackList
    {
        return new CampaignBlackList($this->transport);
    }

    /**
     * Ресурс, представляющий возможность редактировать и удалять списки запрещенных url адресов или мобильных
     * приложений. Эти списки могут использоваться для запрета показа объявлений на входящих в список доменах
     * или мобильных приложениях
     * @see https://target.my.com/doc/api/ru/resource/CampaignBlackLists
     * @return CampaignBlackLists
     */
    public function campaignBlackLists(): CampaignBlackLists
    {
        return new CampaignBlackLists($this->transport);
    }

    /**
     * Ресурс, позволяющий массово обновлять данные кампании (не более 200 кампаний за раз). Обновление происходит
     * транзакционно: при возникновении ошибки обновления хотя бы одной кампании ни одно изменение не применится
     * @see https://target.my.com/doc/api/ru/resource/CampaignMassAction
     * @return CampaignMassAction
     */
    public function campaignMassAction(): CampaignMassAction
    {
        return new CampaignMassAction($this->transport);
    }

    /**
     * Правила, определяющие возможность использовать таргетинги и их значения. Работает примерно как условный
     * оператор: если в поле if есть совпадения для данных создаваемой или обновляемой кампании, то проверяется,
     * что кампания соответствует условиям из поля then
     * @see https://target.my.com/doc/api/ru/resource/CampaignRule
     * @return CampaignRule
     */
    public function campaignRule(): CampaignRule
    {
        return new CampaignRule($this->transport);
    }

    /**
     * Ресурс, позволяющий создать новую или получить список существующих рекламных кампании
     * @see https://target.my.com/doc/api/ru/resource/Campaigns
     * @return Campaigns
     */
    public function campaigns(): Campaigns
    {
        return new Campaigns($this->transport);
    }

    /**
     * Ресурс, позволяющий загружать креативы, которые в дальнейшем могут быть использованы в рекламных объявлениях.
     * Креативы, загруженные с помощью данного ресурса, могут быть использованы только в тех пакетах, в баннерном
     * формате которых есть секция "content"
     * @see https://target.my.com/doc/api/ru/resource/Content
     * @return Content
     */
    public function content(): Content
    {
        return new Content($this->transport);
    }

    /**
     * Ресурс позволяет проверить рекламируемые ссылки перед отправкой объявления на модерацию
     * @see https://target.my.com/doc/api/ru/resource/CreateUrl
     * @return CreateUrl
     */
    public function createUrl(): CreateUrl
    {
        return new CreateUrl($this->transport);
    }

    /**
     * Ресурс, позволяющий собрать информацию о пакетах. Пакет — это набор характеристик услуг, предоставляемых
     * пользователю в рамках рекламных кампаний. Например, пакет определяет список доступных таргетингов
     * и набор площадок, на которых будут показываться объявления. Идентификатор пакета необходим
     * для создания рекламной кампании
     * @see https://target.my.com/doc/api/ru/resource/Packages
     * @return Packages
     */
    public function packages(): Packages
    {
        return new Packages($this->transport);
    }

    /**
     * Ресурс, позволяющий собрать информацию о площадках, которые используются в таргетингах пакета по умолчанию
     * @see https://target.my.com/doc/api/ru/resource/PackagesPads
     * @return PackagesPads
     */
    public function packagesPads(): PackagesPads
    {
        return new PackagesPads($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о деревьях площадок, используемых в таргетинге на места размещений
     * (pads) при создании кампаний. Дерево площадок необходимо для визуализации связи площадок, представленных
     * id в конечных узлах, и физических мест размещений, представленных во внутренних узлах дерева
     * @see https://target.my.com/doc/api/ru/resource/PadsTree
     * @return PadsTree
     */
    public function padsTree(): PadsTree
    {
        return new PadsTree($this->transport);
    }

    /**
     * Ресурс, возвращающий прогноз охвата аудитории в зависимости от стоимости события
     * @see https://target.my.com/doc/api/ru/resource/ProjectionPrediction
     * @return ProjectionPrediction
     */
    public function projectionPrediction(): ProjectionPrediction
    {
        return new ProjectionPrediction($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о рекламируемой ссылке
     * @see https://target.my.com/doc/api/ru/resource/ReadUrl
     * @return ReadUrl
     */
    public function readUrl(): ReadUrl
    {
        return new ReadUrl($this->transport);
    }

    /**
     * Ресурс позволяет получить информацию о нескольких рекламируемых ссылках
     * @see https://target.my.com/doc/api/ru/resource/ReadUrls
     * @return ReadUrls
     */
    public function readUrls(): ReadUrls
    {
        return new ReadUrls($this->transport);
    }

    /**
     * Ресурс, позволяющий собрать информацию о полном дереве интересов пользователей. Отдельные интересы
     * могут быть доступны не во всех пакетах
     * @see https://target.my.com/doc/api/ru/resource/TargetingsTree
     * @return TargetingsTree
     */
    public function targetingsTree(): TargetingsTree
    {
        return new TargetingsTree($this->transport);
    }

    /**
     * Информация доступна только по связям с кампаниями и баннерами, которые привели к успешному созданию
     * хотя бы одной лид-заявки
     * @see https://target.my.com/doc/api/ru/resource/LeadForm
     * @return LeadForm
     */
    public function leadForm(): LeadForm
    {
        return new LeadForm($this->transport);
    }

    /**
     * Ресурс, позволяющий получить информацию по лидам, полученным с помощью рекламных объявлений
     * Список доступных форм можно получить, запросив этот ресурс
     * @see https://target.my.com/doc/api/ru/resource/LeadInfo
     * @return LeadInfo
     */
    public function leadInfo(): LeadInfo
    {
        return new LeadInfo($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о мобильном приложении из App Store
     * @see https://target.my.com/doc/api/ru/resource/AppleApp
     * @return AppleApp
     */
    public function appleApp(): AppleApp
    {
        return new AppleApp($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о мобильном приложении из Google Play
     * @see https://target.my.com/doc/api/ru/resource/GoogleApp
     * @return GoogleApp
     */
    public function googleApp(): GoogleApp
    {
        return new GoogleApp($this->transport);
    }

    /**
     * Ресурс позволяющий получит информацию о категориях событий в мобильном приложении
     * @see https://target.my.com/doc/api/ru/resource/InAppEventCategories
     * @return InAppEventCategories
     */
    public function inAppEventCategories(): InAppEventCategories
    {
        return new InAppEventCategories($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о категории мобильного приложения
     * @see https://target.my.com/doc/api/ru/resource/MobileCategory
     * @return MobileCategory
     */
    public function mobileCategory(): MobileCategory
    {
        return new MobileCategory($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о мобильной операционной системе
     * @see https://target.my.com/doc/api/ru/resource/MobileOperationSystem
     * @return MobileOperationSystem
     */
    public function mobileOperationSystem(): MobileOperationSystem
    {
        return new MobileOperationSystem($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию об операторе мобильной сети
     * @see https://target.my.com/doc/api/ru/resource/MobileOperator
     * @return MobileOperator
     */
    public function mobileOperator(): MobileOperator
    {
        return new MobileOperator($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о типах мобильных устройств
     * @see https://target.my.com/doc/api/ru/resource/MobileTypes
     * @return MobileTypes
     */
    public function mobileTypes(): MobileTypes
    {
        return new MobileTypes($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о производителях мобильных устройств
     * @see https://target.my.com/doc/api/ru/resource/MobileVendors
     * @return MobileVendors
     */
    public function mobileVendors(): MobileVendors
    {
        return new MobileVendors($this->transport);
    }

    /**
     * Ресурс, позволяющий получать информацию о географических регионах
     * @see https://target.my.com/doc/api/ru/resource/Region
     * @return Region
     */
    public function region(): Region
    {
        return new Region($this->transport);
    }

    /**
     * Ресурс, позволяющий получить информацию о регионах, указанных пользователями
     * @see https://target.my.com/doc/api/ru/resource/UserGeo
     * @return UserGeo
     */
    public function userGeo(): UserGeo
    {
        return new UserGeo($this->transport);
    }

    /**
     * Ресурс, позволяющий получить информацию о VK группах. Возвращаются все группы, аудитория
     * которых не менее 1000 пользователей
     * @see https://target.my.com/doc/api/ru/resource/VkGroup
     * @return VkGroup
     */
    public function vkGroup(): VkGroup
    {
        return new VkGroup($this->transport);
    }

    /**
     * Ресурс, предоставляющий информацию о мобильном приложении из Microsoft Store
     * @see https://target.my.com/doc/api/ru/resource/WindowsPhoneApp
     * @return WindowsPhoneApp
     */
    public function windowsPhoneApp(): WindowsPhoneApp
    {
        return new WindowsPhoneApp($this->transport);
    }

    /**
     * Ресурс выполняет перевод средств между агентством и его клиентом
     * @see https://target.my.com/doc/api/ru/resource/Transaction
     * @return Transaction
     */
    public function transaction(): Transaction
    {
        return new Transaction($this->transport);
    }

    /**
     * Ресурс позволяет получить данные о группах транзакций пользователя
     * @see https://target.my.com/doc/api/ru/resource/TransactionGroups
     * @return TransactionGroups
     */
    public function transactionGroups(): TransactionGroups
    {
        return new TransactionGroups($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/context_targeting
     * @return SearchPhrasesList
     */
    public function searchPhrasesList(): SearchPhrasesList
    {
        return new SearchPhrasesList($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/context_targeting
     * @return SearchPhrasesListDownloadCsv
     */
    public function searchPhrasesListDownloadCsv(): SearchPhrasesListDownloadCsv
    {
        return new SearchPhrasesListDownloadCsv($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/context_targeting
     * @return SearchPhrasesListErrors
     */
    public function searchPhrasesListErrors(): SearchPhrasesListErrors
    {
        return new SearchPhrasesListErrors($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/context_targeting
     * @return SearchPhrasesLists
     */
    public function searchPhrasesLists(): SearchPhrasesLists
    {
        return new SearchPhrasesLists($this->transport);
    }

    /**
     * Этот инструмент позволяет пользователям API узнавать об изменении ресурсов API, используя push- вместо pull-модели
     * @see https://target.my.com/adv/api-marketing/doc/push
     * @return Subscriptions
     */
    public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/sc_remarketing
     * @return RemarketingCampaignList
     */
    public function remarketginCampaignList(): RemarketingCampaignList
    {
        return new RemarketingCampaignList($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/sc_remarketing
     * @return RemarketingCampaignLists
     */
    public function remarketginCampaignLists(): RemarketingCampaignLists
    {
        return new RemarketingCampaignLists($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/stat-v2
     * @return Statistics
     */
    public function statistics(): Statistics
    {
        return new Statistics($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/stat-v2
     * @return StatisticsFast
     */
    public function statisticsFast(): StatisticsFast
    {
        return new StatisticsFast($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/stat-v2
     * @return StatisticsGoals
     */
    public function statisticsGoals(): StatisticsGoals
    {
        return new StatisticsGoals($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/stat-v2
     * @return StatisticsInApp
     */
    public function statisticsInApp(): StatisticsInApp
    {
        return new StatisticsInApp($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/stat-v2
     * @return StatisticsOfflineConversions
     */
    public function statisticsOfflineConversions(): StatisticsOfflineConversions
    {
        return new StatisticsOfflineConversions($this->transport);
    }

    /**
     * @see https://target.my.com/adv/api-marketing/doc/stat-v2
     * @return StatisticsUnique
     */
    public function statisticsUnique(): StatisticsUnique
    {
        return new StatisticsUnique($this->transport);
    }

    /**
     * @return Throttling
     */
    public function throttling(): Throttling
    {
        return new Throttling($this->transport);
    }

    /**
     * @param string $accessToken
     * @param array $config
     * @return GuzzleClient
     */
    private function buildClient(string $accessToken, array &$config): GuzzleClient
    {
        $baseUri = @$config['sandbox'] ? 'https://target-sandbox.my.com/api/v3/' : 'https://target.my.com/api/v3/';
        if (!isset($config['assoc'])) {
            $config['assoc'] = true;
        }
        return new GuzzleClient([
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'ru-RU,ru;q=0.9,en-US;q=0.8'
            ],
            'http_errors' => false,
            'base_uri' => $baseUri,
            'debug' => @$config['debug'],
            'timeout' => (int)@$config['timeout']
        ]);
    }

    /**
     * @param GuzzleClient $client
     * @param array $config
     * @return TransportInterface
     * @throws TransportException
     */
    private function buildTransport(GuzzleClient $client, array &$config): TransportInterface
    {
        if (!isset($config['transport'])) {
            $config['transport'] = Transport::class;
        }
        if (!is_string($config['transport'])) {
            throw new TransportException("Неверное имя класса объекта передачи данных");
        }
        if (!class_exists($config['transport'])) {
            throw new TransferException("Класса '{$config['transport']}' не существует");
        }
        if (!is_a($config['transport'], TransportInterface::class, true)) {
            throw new TransferException("Класс объекта передачи данных не реализует " . TransportInterface::class);
        }
        $className = $config['transport'];
        return new $className($client, $config);
    }
}