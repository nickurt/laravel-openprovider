<?php

namespace nickurt\OpenProvider;

/**
 * @method static \nickurt\OpenProvider\Api\Customers customers()
 * @method static \nickurt\OpenProvider\Api\Domains domains()
 * @method static \nickurt\OpenProvider\Api\Emails emails()
 * @method static \nickurt\OpenProvider\Api\EmailsTemplates emailstemplates()
 * @method static \nickurt\OpenProvider\Api\Extensons extensions()
 * @method static \nickurt\OpenProvider\Api\Financials financials()
 * @method static \nickurt\OpenProvider\Api\Licenses licenses()
 * @method static \nickurt\OpenProvider\Api\NameServers nameservers()
 * @method static \nickurt\OpenProvider\Api\NameServersGroups nameserversgroups()
 * @method static \nickurt\OpenProvider\Api\Resellers resellers()
 * @method static \nickurt\OpenProvider\Api\SpamExperts spamexperts()
 * @method static \nickurt\OpenProvider\Api\Ssl ssl()
 * @method static \nickurt\OpenProvider\Api\Tags tags()
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'OpenProvider';
    }
}
