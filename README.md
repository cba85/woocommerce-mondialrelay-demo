# WooCommerce Mondial Relay Demo

WooCommerce Mondial Relay demo website.

## About

You can use it to test the [WooCommerce Mondial Relay plugin](https://www.mondialrelay-woocommerce.com) in a standardized configuration.

- More informations about WooCommerce Mondial Relay plugin : https://www.mondialrelay-woocommerce.com/
- WooCommerce Mondial Relay plugin documentation (in French only) : https://docs.mondialrelay-woocommerce.com/

### Bedrock

This website uses [Bedrock](https://roots.io/bedrock/), a modern WordPress stack that helps you get started with the best development tools and project structure.

Much of the philosophy behind Bedrock is inspired by the [Twelve-Factor App](http://12factor.net/) methodology including the [WordPress specific version](https://roots.io/twelve-factor-wordpress/).

Bedrock documentation is available at [https://roots.io/bedrock/docs/](https://roots.io/bedrock/docs/).

## Requirements

* PHP >= 5.6
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Installation

### Code

1. Create a new project in a new folder for your project:

  ```
  composer create-project cba85/woocommerce-mondialrelay-demo your-project-folder-name
  ```

2. Update environment variables in `.env`  file:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (http://example.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
  * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`

  If you want to automatically generate the security keys (assuming you have wp-cli installed locally) you can use the very handy [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command):

  ```
  wp package install aaemnnosttv/wp-cli-dotenv-command
  wp dotenv salts regenerate
  ```

  Or, you can cut and paste from the [Roots WordPress Salt Generator](https://roots.io/salts.html).

3. Add theme(s) in `web/app/themes` as you would for a normal WordPress site.

4. Set your site vhost document root to `/path/to/site/web/`

5. Access WP admin at `http://example.com/wp/wp-admin`

### Database

* Import `database.sql` in your database

### Plugin

1. WooCommerce is already configured. [See details here](#woocommerce-configuration).
2. Install [WooCommerce Mondial Relay plugin](https://www.mondialrelay-woocommerce.com/).
This plugin is a paid plugin. It’s not included in this project.
After installation, the Mondial Relay plugin is already configured. [See details here](#woocommerce-mondial-relay-configuration).
3. You have to enter your Google Api Key on the `Settings` page of WooCommerce Mondial Relay plugin in Wordpress administration if you want to display Google Map in the widget on the checkout page.
You can create an Google API Key on https://developers.google.com/maps/documentation/javascript/get-api-key

## Informations

### Themes installed

* [Storefront](https://woocommerce.com/storefront/)
* WooCommerce Mondial Relay (a simple Storefront child)

### Plugins installed

- [WooCommerce](https://woocommerce.com)

## Configuration

### Theme

A child theme for Storefront is included in the project. This theme is designed to be used as a the theme for the WooCommerce Mondial Relay demo.

The theme itself has no functionality.

#### Google Analytics

The `functions.php` contains a function to integrate Google Analytics. Change the ID if needed.

## WooCommerce configuration

### General

- Units: ``g``
- Charging tax: 20%

### Payment method

- Cash on delivery

### Shipping methods

Region | Method | Name | Price
|:--- |:---- |:---- |:----
France | Flat rate | Mondial Relay France | 3 €
France | Flat rate | Autre livraison France | 2 €
Europe | Flat rate | Mondial Relay Europe | 5 €
Europe | Flat rate | Autre livraison Europe | 4 €

### Products

Product | Price | Weight
|:--- |:---- |:----
Test product | 10 € | 300g

## WooCommerce Mondial Relay configuration

### Vendor

- **Expéditeur** : Expediteur
- **Rue** : 1 Rue Expediteur
- **Code postal** : 75000
- **Ville** : Paris
- **Pays** : France
- **Téléphone** : 0123456789

### Settings

Shipping method activated for Mondial Relay:

- Mondial Relay France
- Mondial Relay Europe