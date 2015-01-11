# Phalcon File Uploader

 [![Total Downloads](https://poser.pugx.org/stanislav-web/phalcon-uploader/downloads.svg)](https://packagist.org/packages/stanislav-web/phalcon-uploader) [![Latest Unstable Version](https://poser.pugx.org/stanislav-web/phalcon-uploader/v/unstable.svg)](https://packagist.org/packages/stanislav-web/phalcon-uploader)

## Description
Handling and downloading files for Phalcon projects. Allowed multiple files, filters etc.... _(Currently under TDD)_

## Change Log 

#### [v 1.0-beta] 2015-01-10
    - added validator (sizes, extensions, mime types, directory upload)
    - added filters (sanitize filename pre save, hash filename)

## Compatible
- PSR-0, PSR-1, PSR-2, PSR-4 Standards

## System requirements
- PHP 5.4.x >
- Phalcon extension 1.3.x

## Install
First update your dependencies through composer. Add to your composer.json:
```php
"require": {
    "stanislav-web/phalcon-uploader": "1.0-stable",
}
```
Then run to update dependency and autoloader 
```python
php composer.phar update
php composer.phar install
```
or just
```
php composer.phar require stanislav-web/phalcon-uploader dev-master 
```
_(Do not forget to include the composer autoloader)_

Or manual require in your loader service
```php
    $loader->registerNamespaces([
        'Uploader\Uploader' => 'path to src'
    ]);
```
You can create an injectable service
```php
    $di->set('uploader', '\Uploader\Uploader');
```
## Usage

#### Simple usage

```php

```

#### Filters

```php
    
```

## Unit Test
Unavailable

##[Change Log](https://github.com/stanislav-web/phalcon-uploader/blob/master/CHANGELOG.md "Change Log")

##[Issues](https://github.com/stanislav-web/phalcon-uploader/issues "Issues")

[![MIT License](https://poser.pugx.org/stanislav-web/phalcon-uploader/license.svg)](https://packagist.org/packages/stanislav-web/phalcon-searcher)
