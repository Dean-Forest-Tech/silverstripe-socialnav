Silverstripe Socialnav Module
=============================

Silverstripe module that adds a social navigation field to the CMS and
uses that to generate a HTML list from a template (loading in relevent
icons).

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
