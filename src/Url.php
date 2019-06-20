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

    /**
     * Check if string is external url.
     * $strict === true:    https://page.com, http://page.com, https://www.page.com, http://www.page.com
     * $strict === false:   $strict === true, www.page.com, page.com
     *
     * @param string $url
     * @param bool   $strict
     *
     * @return bool
     */
    public static function isExternal(string $url, bool $strict = true): bool
    {
        if ($strict) {
            return preg_match('/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/', $url) === 1;
        }

        return preg_match('/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/', $url) === 1;
    }
}
