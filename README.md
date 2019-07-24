# WooCommerce Mondial Relay Demo

WooCommerce Mondial Relay demo website.

## About

This is the source code of WooCommerce Mondial Relay demo website.

You can use this project to test the [WooCommerce Mondial Relay plugin](https://www.mondialrelay-woocommerce.com) in a "standardized" configuration.

More informations about WooCommerce Mondial Relay plugin : https://www.mondialrelay-woocommerce.com/

### Bedrock

This website uses [Bedrock](https://roots.io/bedrock/), a modern WordPress stack that helps you get started with the best development tools and project structure.

Much of the philosophy behind Bedrock is inspired by the [Twelve-Factor App](http://12factor.net/) methodology including the [WordPress specific version](https://roots.io/twelve-factor-wordpress/).

Bedrock documentation is available at [https://roots.io/bedrock/docs/](https://roots.io/bedrock/docs/).

## Index

- [Requirements](#requirements)
- [Installation](#installation)
- [Server](#server)
- [Settings](#settings)
  - [Wordpress configuration](#wordpress-configuration)
  - [Cron](#cron)
  - [WooCommerce configuration](#woocommerce-configuration)
  - [WooCommerce Mondial Relay configuration](#woocommerce-mondial-relay-configuration)
- [Deploy](#deploy)
- [Informations](#informations)
- [WooCommerce Mondial Relay theme](#woocommerce-mondial-relay-theme)

## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Installation

1. Create a new project in a new folder for your project:

    ```
    $ composer create-project cba85/woocommerce-mondialrelay-demo your-project-folder-name
    ```

    ### ⚠️ Plugin test

    If you just want to use this repository to test the WooCommerce Mondial Relay plugin, you have to remove the private repository and dependency of the plugin in the `composer.json` file to install this project.

    Because this plugin is a paid plugin and it’s not included in this project, you don't have access to it.

    [You'll have to install the WooCommerce Mondial Relay plugin later, manually using FTP, or by using Wordpress plugin installer](#settings).

    Remove the following states of the `composer.json` file to fix the installation errors:

    ```json
    ...
    "repositories": [
      ...
      {
        "type": "vcs",
        "url": "git@github.com:cba85/woocommerce-mondialrelay.git"
      }
    ],
    ...
    "require": {
      ...
      "cba85/woocommerce-mondialrelay": "dev-master"
    },
    ...
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

      * If you want to automatically generate the security keys (assuming you have wp-cli installed locally) you can use the very handy [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command):

        ```
        $ wp package install aaemnnosttv/wp-cli-dotenv-command
        $ wp dotenv salts regenerate
        ```

      * Or, you can cut and paste from the [Roots WordPress Salt Generator](https://roots.io/salts.html).

3. Set your site vhost document root to `/path/to/site/web/`

4. Access WP admin at `http://example.com/wp/wp-admin`

## Server

This project is compatible with PHP built-in server.

A composer script command is included in the project to create a webserver and quickly use the project:

```bash
$ composer run-script serve
# php -S 0.0.0.0:8080 -t web/
```

## Settings

1. Configure Wordpress. [Here are the steps for the demo website](#wordpress-configuration).

2. Create Cron to regulary delete user's informations. [Here is the script](#cron).

3. WooCommerce has to be configured. [See details here](#woocommerce-configuration).

4. Install [WooCommerce Mondial Relay plugin](https://www.mondialrelay-woocommerce.com/).

    The plugin is located in `/web/app/plugins/` after installation. You could just move the plugin files in this folder, and then activate it in Wordpress administration.

    💰 This plugin is a paid plugin and it’s not included in this project.

    When importation is done, you have to configure the WooCommerce Mondial Relay plugin. [See details here](#woocommerce-mondial-relay-configuration).

    📖  WooCommerce Mondial Relay plugin documentation *(in French only 🇫🇷 )* : https://docs.mondialrelay-woocommerce.com/

### 1. Wordpress configuration

#### Settings > Discussion

##### Discussion Settings

###### Default article settings

- ❌ Allow link notifications from other blogs (pingbacks and trackbacks) on new articles
- ❌ Allow people to post comments on new articles

##### Avatars

###### Avatar Display

- ❌ Show Avatars

#### Apparence

##### Menu

###### Menu structure

- Home
- Shop
- Get the plugin

###### Menu Settings

Display location :

- ✅ Primary Menu

### Pages

- Delete "Privacy Policy"
- Delete "Sample Page"
- Create "WooCommerce Mondial Relay Plugin Demo" *(Set as homepage)*

#### Favicon

- Add the website favicon by uploading the `/web/app/themes/woocommerce-mondialrelay/img/logo.jpg` file.

### 2. Cron

 *⏩  Skip this step if you just want to use this repository to test the WooCommerce Mondial Relay plugin.*

First, disable the internal WP Cron via the DISABLE_WP_CRON environment variable.

```
DISABLE_WP_CRON=true
```

Create the cron to empty WooCommerce order tables each month at 2 am, because I said I won't use user's data.

```
0 2 1 * * echo "TRUNCATE TABLE wp_woocommerce_sessions; TRUNCATE TABLE wp_woocommerce_order_itemmeta; TRUNCATE TABLE wp_woocommerce_order_items;" | mysql -u'root' -p'' -D'DATABASE_NAME'
 >/dev/null 2>&1
```

Replace `root` and `DATABASE_NAME` by the actual user and database name.

### 3. WooCommerce configuration

#### General

- Units: g
- Charging tax: 20%

#### Payment method

- Cash on delivery

#### Shipping methods

Region | Method | Name | Price
|:--- |:---- |:---- |:----
France 🇫🇷 | Flat rate | Mondial Relay | 3 €
France 🇫🇷 | Flat rate | Other shipping | 2 €
Europe 🇪🇺 | Flat rate | Mondial Relay | 5 €
Europe 🇪🇺 | Flat rate | Other shipping | 4 €

#### Products

Product | Price | Weight
|:--- |:---- |:----
Test product | 10 € | 300g

- Add logo for product image

### 4. WooCommerce Mondial Relay configuration

#### Vendor

- **Expéditeur** : Vendeur
- **Rue** : 1 Rue du vendeur
- **Code postal** : 75001
- **Ville** : Paris
- **Pays** : France
- **Téléphone** : 0123456789

#### Settings

Shipping method activated for Mondial Relay:

- Mondial Relay France
- Mondial Relay Europe

#### Google Maps API

You have to enter your Google Api Key on the `Settings` page of WooCommerce Mondial Relay plugin in Wordpress administration if you want to use Google Maps to display the map in the widget on the checkout page.

You can create an Google API Key on https://developers.google.com/maps/documentation/javascript/get-api-key.

## Informations

### Themes installed

* [Storefront](https://woocommerce.com/storefront/)
* WooCommerce Mondial Relay (a simple Storefront child)

### Plugins installed

- [Gutenberg](https://wordpress.org/gutenberg/)
- [WooCommerce](https://woocommerce.com)
- [PHP Compatibility Checker](https://wordpress.org/plugins/php-compatibility-checker/)
- [WP Crontrol](https://wordpress.org/plugins/wp-crontrol/)
- [Wordfence](https://wordpress.org/plugins/wordfence/)

### Versions

Version of plugins and themes are defined in `composer.json` file.

## WooCommerce Mondial Relay theme

A child theme for Storefront is included in the project. This theme is designed to be used as the theme for the WooCommerce Mondial Relay demo.

The theme itself has no functionality.

### Google Analytics

~~The functions.php contains a function to integrate Google Analytics. Change the ID if needed.~~

In fact, I don't really care about the traffic of this website, I barely look at that stuff and I don't want to annoy the visitors with a cookie from Google. 👋   Goodbye Google Analytics.