<?php

namespace App\Services\Share;


class SocialShareService
{
    const PLATFORM_FACEBOOK = "facebook";
    const PLATFORM_WHATSAPP = "whatsapp";
    const PLATFORM_TELEGRAM = "telegram";
    const PLATFORM_TWITTER = "twitter";
    const PLATFORM_INSTAGRAM = "instagram";
    const PLATFORM_SNAPCHAT = "snapchat";
    const PLATFORM_TIKTOK = "tiktok";

    public static function getLink($platform , $postUrl , $content = null)
    {
        $url = $postUrl;
        $link = $postUrl;
        if($platform == self::PLATFORM_FACEBOOK){
            $link = self::shareOnFacebook($url , $content);
        }
        if($platform == self::PLATFORM_TELEGRAM){
            $link = self::shareOnTelegram($url , $content);
        }
        if($platform == self::PLATFORM_WHATSAPP){
            $link = self::shareOnWhatsapp($url , $content);
        }
        if($platform == self::PLATFORM_TWITTER){
            $link = self::shareOnTwitter($url , $content);
        }
        if($platform == self::PLATFORM_INSTAGRAM){
            $link = self::shareOnInstagram($url , $content);
        }
        if($platform == self::PLATFORM_SNAPCHAT){
            $link = self::shareOnSnapchat($url , $content);
        }
        if($platform == self::PLATFORM_TIKTOK){
            $link = self::shareOnTiktok($url , $content);
        }
        return $link;
    }

    public static  function shareOnFacebook($url , $content)
    {
        $query = http_build_query([
            "u" => $url,
            "quote" => $content
        ]);
        return "https://web.facebook.com/sharer.php?$query";
    }
    public static function shareOnTelegram($url , $content)
    {
        $query = http_build_query([
            "url" => $url,
            "text" => $content
        ]);
        return "https://telegram.me/share/?$query";
    }
    public static function shareOnWhatsapp($url , $content)
    {
        $query = http_build_query([
            "text" => $content." ".$url
        ]);
        return "https://wa.me/?$query";
    }
    public static  function shareOnTwitter($url , $content)
    {
        $query = http_build_query([
            "u" => $url,
            "quote" => $content
        ]);
        return "https://web.twitter.com/sharer.php?$query";
    }
    public static  function shareOnInstagram($url , $content)
    {
        $query = http_build_query([
            "u" => $url,
            "quote" => $content
        ]);
        return "https://instagram.com/sharer/?$query";
    }

    public static  function shareOnSnapchat($url , $content)
    {
        $query = http_build_query([
            "u" => $url,
            "quote" => $content
        ]);
        return "https://snapchat.com/sharer/?$query";
    }

    public static  function shareOnTiktok($url , $content)
    {
        $query = http_build_query([
            "u" => $url,
            "quote" => $content
        ]);
        return "https://tiktok.com/sharer/?$query";
    }
}
