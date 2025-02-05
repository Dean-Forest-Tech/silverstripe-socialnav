<?php

namespace DFT\SilverStripe\SocialNav\Extensions;

use SilverStripe\Core\Extension;
use DFT\SilverStripe\SocialNav\SocialNav;

class ControllerExtension extends Extension
{

    public function SocialNav()
    {
        return SocialNav::create();
    }
}
