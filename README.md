# Silverstripe Socialnav Module

Silverstripe module that adds a social navigation field to the CMS and uses that to generate a HTML list from a template (loading in relevent icons via Fontawesome).

The stock install includes Fontawsome 6 brand icons and is pre-configured to render them into the template and include relevent CSS and fonts.

The stock templates also support the Bootstrap v4 & v5 frameworks (if you are either) and will render as a `navbar` and `nav-items`.

## Install

Install via composer:

`composer require dft/silverstripe-socialnav`

## Usage

This module adds a `ToggleCompositeField` ("Social Nav") to `SiteConfig`. You can add links by visiting the SilverStripe admin > Settings (left hand menu) > Main Tab, then clicking "Social Nav".

You can now add links to your social nav. If you are using an icon library (such as FontAwesome), you can add custom classes to each link.

## Rendering in templates

Rendering the nav in your template is make pretty easy, you simply have to add `$SocialNav.Rendered` to your templates, where you want the nav to appear.

If you want to loop through Specific menu items (to access them individually in a template), you can call them via:

`<% loop $SocialNav.MenuItems %><% end_loop %>`

## Customising the template

If you want to customise the template, simply copy the following template into your theme: `DFT\SilverStripe\SocialNav\SocialNav.ss

## "Services"

By default, this module includes a comprehensive list of services like:

* Facebook
* Instagram
* X
* YouTube
* Pinterest
* LinkedIn
* More

This module also allows selection of other third party sites, such as:

* ebay
* Etsy
* Shopify
* Spotify

### Adding custom services

If there is a service you would like to add, this can be done via YML config by updating the service name and class maps as follows:

```YML
DFT\SilverStripe\SocialNav\SocialNav:
    service_names:
        CustomService: "My Custom Service"
    service_classes:
        CustomService: "fa-service-class"
```

### Changing the class prefix

By default, this module adds `fa-brands fa-xl` to all links generated. This can be overwritten using the following YML config:

```YML
DFT\SilverStripe\SocialNav\SocialNav:
    service_class_prefix: "my-custom-css-prefix"
```

## Disabling default CSS and Fonts

By default, this module requires custom CSS and the Fontawesome brands webfont. If you are using Fontawesome in your project already and don't require these, you can disable these items being included via YML config:

```YML
DFT\SilverStripe\SocialNav\SocialNav:
    require_css: false
```