<?php

namespace DFT\SilverStripe\SocialNav\Model;

use SilverStripe\Core\Convert;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Core\Injector\Injector;
use DFT\SilverStripe\SocialNav\SocialNav;
use SilverStripe\Core\Manifest\ModuleResourceLoader;

class SocialNavLink extends DataObject
{

    private static $table_name = 'SocialNavLink';

    private static $db = array(
        "Service" => "Varchar",
        "URL" => "Varchar(255)",
        "ExtraClasses" => "Varchar"
    );

    private static $has_one = array(
        "Parent" => SiteConfig::class
    );

    private static $casting = array(
        "Title" => "Varchar",
        "ConvertedService" => "Varchar",
        "ServiceIcon" => "Varchar"
    );

    private static $summary_fields = array(
        "Service",
        "Title",
        "URL"
    );

    public function getTitle()
    {
        $helper = $this->getSocialNavHelper();
        $service = $this->Service;

        return $helper->getTranslatedTitle((string) $service);
    }

    public function getConvertedService()
    {
        return Convert::raw2url($this->Service);
    }

    public function getServiceIcon(): string
    {
        $helper = $this->getSocialNavHelper();
        $service = $this->Service;

        return $helper->getIconClass((string) $service);
    }

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $service_names = SocialNav::config()->service_names;

            $fields->removeByName("ParentID");

            $service_field = DropdownField::create("Service")
                ->setSource($service_names)
                ->setEmptyString(_t("SocialNav.SelectService", "Select social media service"));

            $fields->replaceField(
                "Service",
                $service_field
            );

            $fields->insertAfter(
                'Service',
                ReadonlyField::create('Title')
            );

            $url_field = $fields->dataFieldByName('URL');
            $classes_field = $fields->dataFieldByName('ExtraClasses');

            if (!empty($url_field)) {
                $url_field->setAttribute(
                    'placeholder',
                    'EG: https://facebook.com/myaccountname'
                );
            }

            if (!empty($classes_field)) {
                $classes_field->setDescription(
                    'By default, these are added to the icon\'s \'i\' element'
                );
            }
        });

        return parent::getCMSFields();
    }

    public function getCMSValidator()
    {
        return new RequiredFields(array(
            "Service",
            "URL"
        ));
    }

    protected function getSocialNavHelper(): SocialNav
    {
        return Injector::inst()->get(
            SocialNav::class,
            true
        );
    }
}
