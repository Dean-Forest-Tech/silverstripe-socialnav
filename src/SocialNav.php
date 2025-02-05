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
        "Amazon" => "fa-amazon",
        "Apple" => "fa-apple",
        "AppleAppStore" => "fa-app-store-ios",
        "Audible" => "fa-audible",
        "Bandcamp" => "fa-bandcamp",
        "Bluesky" => "fa-bluesky",
        "Delicious" => "fa-delicious",
        "Discord" => "fa-discord",
        "Dribble" => "fa-dribbble",
        "Ebay" => "fa-ebay",
        "Etsy" => "fa-etsy",
        "Facebook" => "fa-facebook",
        "FacebookMessenger" => "fa-facebook-messenger",
        "GitHub" => "fa-github",
        "GitLab" => "fa-gitlab",
        "GooglePlay" => "fa-google-play",
        "Instagram" => "fa-instagram",
        "Linkedin" => "fa-linkedin",
        "Mastodon" => "fa-mastodon",
        "Patreon" => "fa-patreon",
        "Pinterest" => "fa-pinterest",
        "Reddit" => "fa-reddit",
        "Shopify" => "fa-shopify",
        "SignalMessenger" => "fa-signal-messenger",
        "Skype" => "fa-skype",
        "Slack" => "fa-slack",
        "Snapchat" => "fa-snapchat",
        "Spotify" => "fa-spotify",
        "Steam" => "fa-steam",
        "Telegram" => "fa-telegram",
        "TikTok" => "fa-tiktok",
        "Trello" => "fa-trello",
        "Tumblr" => "fa-square-tumblr",
        "Twitter" => "fa-twitter",
        "Vimeo" => "fa-vimeo-v",
        "WhatsApp" => "fa-whatsapp",
        "X" => "fa-x-twitter",
        "YouTube" => "fa-youtube"
    ];

    private static $service_class_prefix = "fa-brands";

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
        $prefix = Config::inst()->get(
            self::class,
            'service_class_prefix'
        );
        $class = "";

        if (array_key_exists($service, $icons)) {
            $class = $prefix . " " . $icons[$service];
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
