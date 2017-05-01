# GZERO vanilla-integration

Vanilla forum integration package for GZERO CMS

# Table of contents
* [Installation](#installation)
* [Configuration](#configuration)
* [Overriding configuration](#overriding-configuration)
* [How to use this integration](#how-to-use-this-integration)

## Installation

Begin by installing this package through Composer. Edit your project's composer.json file to require gzero/vanilla-integration.

```json
"require": {
    "gzero/vanilla-integration": "^2.0",
}
```
Next, update Composer from the Terminal:
```
composer update
```

## Configuration

Add the service provider to platform configuration in `app/config/app.php`

```PHP
'Gzero\Vanilla\ServiceProvider'
```

### Overriding configuration

In order to override some of the configuration options publish configuration file:

```
php artisan config:publish gzero/vanilla-integration
```

Set required credentials for given service in published package config file
 
 ```PHP
return [
    'forum_domain' => 'vanilla.dev',
    'sso'          => 'http://vanilla.dev/sso',
    'client_id'    => 'your_vanilla_client_id',
    'secret'       => 'your_vanilla_secret',
];
 ```
 
Set sso url in Vanilla Forum jsConnect settings

 ```PHP
 http://dev.gzero.pl/_hidden/vanilla-sso
 ```
 
### How to use this integration

To make sure that user is synchronized with your GZERO CMS site, you should always use `forum_url()` helper to build url to all 
forum pages. 

```PHP
URL::to(forum_url());
return Redirect::to(forum_url());
return Redirect::to(forum_url('categories'));
 ```
 
To get very tight SSO integration with Vanilla forum, you will also want to follow these steps.

####In Vanilla:
 - Change your registration method to 'Connect' to block non-SSO users from registering.
 - Set your sign-in, sign-out, and registration URLs under jsConnect's settings in your Dashboard.
 - Check "Make this connection your default signin method."
 - Set up "Sign In Url", "Register Url" and "Sign Out Url" in jsConnect integration page 
 
####In GZERO CMS:
 - Always use `forum_url` helper
