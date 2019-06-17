<?php declare(strict_types=1);


namespace Jwebas\Utils;


class Url
{
    /**
     * Check is ssl (https) is enabled.
     *
     * @return bool
     */
    public static function httpsEnabled(): bool
    {
        return ((!empty($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== 'off') || (!empty($_SERVER['HTTP_HTTPS'])
                && $_SERVER['HTTP_HTTPS'] !== 'off') || isset($_SERVER['REQUEST_SCHEME']) === 'https' || $_SERVER['SERVER_PORT'] === 443);
    }
}
