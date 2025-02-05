<?php

namespace DFT\SilverStripe\SocialNav;

use SilverStripe\Core\Config\Config;
use SilverStripe\View\ViewableData;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * Top level config holder for the social nav module
 *
 * @package Socialnav
 */
class SocialNav extends ViewableData
{
    /**
     * List of supported social media services.
     *
     * This list is used to populate the "service" dropdown and will
     * result in generating a img element in the template that looks a
     * for an image with the name listed (converted to lower case).
     *
     * NOTE: The list has to be in key/value pairs due to the way dropdown
     * fields retrieve their data
     *
     * @var array
     */
    private static $service_names = [
        "Amazon" => "Amazon",
        "Apple" => "Apple",
        "AppleAppStore" => "Apple App Store",
        "Audible" => "Audible",
        "Bandcamp" => "Bandcamp",
        "Bluesky" => "Bluesky",
        "Delicious" => "Delicious",
        "Discord" => "Discord",
        "Dribbble" => "Dribbble",
        "Ebay" => "ebay",
        "Etsy" => "Etsy",
        "Facebook" => "Facebook",
        "FacebookMessenger" => "Facebook Messenger",
        "GitHub" => "GitHub",
        "GitLab" => "GitLab",
        "GooglePlay" => "Google Play",
        "Instagram" => "Instagram",
        "Linkedin" => "Linkedin",
        "Mastodon" => "Mastodon",
        "Patreon" => "Patreon",
        "Pinterest" => "Pinterest",
        "Reddit" => "Reddit",
        "Shopify" => "Shopify",
        "SignalMessenger" => "Signal Messenger",
        "Skype" => "Skype",
        "Slack" => "Slack",
        "Snapchat" => "Snapchat",
        "Spotify" => "Spotify",
        "Steam" => "Steam",
        "Telegram" => "Telegram",
        "TikTok" => "TikTok",
        "Trello" => "Trello",
        "Tumblr" => "Tumblr",
        "Twitter" => "Twitter",
        "Vimeo" => "Vimeo",
        "WhatsApp" => "WhatsApp",
        "X" => "X.com",
        "YouTube" => "YouTube"
    ];

    /**
     * Map the above services to font awesome classnames
     * 
     * @var array
     */
    private static $service_classes = [
        "Amazon" => "fa-brands fa-amazon",
        "Apple" => "fa-brands fa-apple",
        "AppleAppStore" => "fa-brands fa-app-store-ios",
        "Audible" => "fa-brands fa-audible",
        "Bandcamp" => "fa-brands fa-bandcamp",
        "Bluesky" => "fa-brands fa-bluesky",
        "Delicious" => "fa-brands fa-delicious",
        "Discord" => "fa-brands fa-discord",
        "Dribble" => "fa-brands fa-dribbble",
        "Ebay" => "fa-brands fa-ebay",
        "Etsy" => "fa-brands fa-etsy",
        "Facebook" => "fa-brands fa-facebook",
        "FacebookMessenger" => "fa-brands fa-facebook-messenger",
        "GitHub" => "fa-brands fa-github",
        "GitLab" => "fa-brands fa-gitlab",
        "GooglePlay" => "fa-brands fa-google-play",
        "Instagram" => "fa-brands fa-instagram",
        "Linkedin" => "fa-brands fa-linkedin",
        "Mastodon" => "fa-brands fa-mastodon",
        "Patreon" => "fa-brands fa-patreon",
        "Pinterest" => "fa-brands fa-pinterest",
        "Reddit" => "fa-brands fa-reddit",
        "Shopify" => "fa-brands fa-shopify",
        "SignalMessenger" => "fa-brands fa-signal-messenger",
        "Skype" => "fa-brands fa-skype",
        "Slack" => "fa-brands fa-slack",
        "Snapchat" => "fa-brands fa-snapchat",
        "Spotify" => "fa-brands fa-spotify",
        "Steam" => "fa-brands fa-steam",
        "Telegram" => "fa-brands fa-telegram",
        "TikTok" => "fa-brands fa-tiktok",
        "Trello" => "fa-brands fa-trello",
        "Tumblr" => "fa-brands fa-square-tumblr",
        "Twitter" => "fa-brands fa-twitter",
        "Vimeo" => "fa-brands fa-vimeo-v",
        "WhatsApp" => "fa-brands fa-whatsapp",
        "X" => "fa-brands fa-x-twitter",
        "YouTube" => "fa-brands fa-youtube"
    ];

    /**
     * Include custom fontawesome CSS when rendering
     * 
     * @var bool
     */
    private static $require_css = true;

    private static $casting = [
        'Rendered' => 'HTMLText'
    ];

    public function getMenuItems()
    {
        $config = SiteConfig::current_site_config();
        return $config->SocialNavLinks();
    }

    public function getTranslatedTitle(string $service): string
    {
        $titles = Config::inst()->get(
            self::class,
            'service_names'
        );
        $title = "";

        if (array_key_exists($service, $titles)) {
            $title = _t(
                self::class . '.SocialTitle',
                'Find us on {service}',
                ['service' => $service]
            );
        }

        return $title;
    }

    public function getIconClass(string $service): string
    {
        $icons = Config::inst()->get(
            self::class,
            'service_classes'
        );
        $class = "";

        if (array_key_exists($service, $icons)) {
            $class = $icons[$service];
        }

        return $class;
    }

    public function requireExtraCSS(): bool
    {
        return Config::inst()->get(
            static::class,
            'require_css'
        );
    }

    public function getRendered(): string
    {
        return $this->renderwith(
            SocialNav::class
        );
    }
}
