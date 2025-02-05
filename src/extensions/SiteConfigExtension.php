<?php


namespace DFT\SilverStripe\SocialNav\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\ToggleCompositeField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use DFT\SilverStripe\SocialNav\Model\SocialNavLink;

class SiteConfigExtension extends DataExtension
{
    private static $has_many = [
        'SocialNavLinks' => SocialNavLink::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // Setup compressed postage options
        $socialnav_fields = ToggleCompositeField::create(
            'SocialNavFields',
            'Social Nav',
            [
                GridField::create(
                    'SocialNavLinks',
                    '',
                    $this->owner->SocialNavLinks(),
                    GridFieldConfig_RecordEditor::create()
                )
            ]
        );

        // Add config sets
        $fields->addFieldToTab('Root.Main', $socialnav_fields);
    }
}
