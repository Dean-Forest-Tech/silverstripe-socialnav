<?php

namespace DFT\SilverStripe\SocialNav;

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
     * @config
     */
    private static $service_names = [
        "Facebook" => "Facebook",
        "Twitter" => "Twitter",
        "Google Plus" => "Google Plus",
        "Linkedin" => "Linkedin",
        "YouTube" => "YouTube",
        "Pinterest" => "Pinterest",
        "Instagram" => "Instagram",
        "Tumblr" => "Tumblr",
        "Etsy" => "Etsy"
    ];

    public function getMenuItems()
    {
        $config = SiteConfig::current_site_config();
        return $config->SocialNavLinks();
    }

    public function getRendered()
    {
        return $this->renderwith(
            SocialNav::class
        );
    }
}
