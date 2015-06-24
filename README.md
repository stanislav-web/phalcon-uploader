# Phalcon File Uploader

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/stanislav-web/phalcon-uploader/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/stanislav-web/phalcon-uploader/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/stanislav-web/phalcon-uploader/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/stanislav-web/phalcon-uploader/?branch=master) [![Total Downloads](https://poser.pugx.org/stanislav-web/phalcon-uploader/downloads.svg)](https://packagist.org/packages/stanislav-web/phalcon-uploader) [![Latest Unstable Version](https://poser.pugx.org/stanislav-web/phalcon-uploader/v/unstable.svg)](https://packagist.org/packages/stanislav-web/phalcon-uploader)

## Description
Handling and downloading files for Phalcon projects. Allowed multiple files, filters etc.... _(Currently under TDD)_

## Change Log 

#### [v 1.4-beta] 2015-05-28
    - ability to download files to a dynamically created directory (by [Mahdi-Mohammadi](https://github.com/Mahdi-Mohammadi))
    
#### [v 1.3-beta] 2015-05-07
    - it support Phalcon 2.0
    
#### [v 1.2-beta] 2015-05-07
    - ability to use closure (anonimous function) for generate uploaded file name
    
#### [v 1.1-beta] 2015-02-23
    - ability to delete files after downloading ($uploader->truncate())
    
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
    "stanislav-web/phalcon-uploader": "1.*",
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
 <?php
 
 if($this->request->hasFiles() !== false) {
    
    // get uploader service
    $uploader = $this->di->get('uploader');
    
    // setting up uloader rules
    $uploader->setRules([
        'directory' =>  '/files',
        //or 'dynamic'   =>  '/files/'.$part.'/'.$userId, // added v1.4-beta
    ]);
    
    // or use constructor if you don't use service
    $uploader = new \Uploader\Uploader(([
        'directory' =>  '/files',
        //or 'dynamic'   =>  '/files/'.$part.'/'.$userId, // added v1.4-beta
    ]);

 }
```

#### Filters

```php
 <?php
 
 if($this->request->hasFiles() !== false) {
    
    // get uploader service or \Uploader\Uploader
    $uploader = $this->di->get('uploader');
    
    // setting up uloader rules
    $uploader->setRules([
        'directory' =>  '/files',
        //or 'dynamic'   =>  '/files/'.$part.'/'.$userId, // added v1.4-beta
        'minsize'   =>  1000,   // bytes
        'maxsize'   =>  1000000,// bytes
        'mimes'     =>  [       // any allowed mime types
            'image/gif',
            'image/jpeg',
            'image/png',
        ],
        'extensions'     =>  [  // any allowed extensions
            'gif',
            'jpeg',
            'jpg',
            'png',
        ],  
          
        'sanitize' => true  // escape file & translate to latin  
        'hash'     => 'md5'  // save file as hash (default md5) you can use ANY function to handle filename
    ]);
 }
```

#### Full Handle

```php
 <?php
 
 if($this->request->hasFiles() !== false) {
    
    // get uploader service or \Uploader\Uploader
    $uploader = $this->di->get('uploader');
    
    // setting up uloader rules
    $uploader->setRules([
        'directory' =>  '/files',
        //or 'dynamic'   =>  '/files/'.$part.'/'.$userId, // added v1.4-beta
        'minsize'   =>  1000,   // bytes
        'maxsize'   =>  1000000,// bytes
        'mimes'     =>  [       // any allowed mime types
            'image/gif',
            'image/jpeg',
            'image/png',
        ],
        'extensions'     =>  [  // any allowed extensions
            'gif',
            'jpeg',
            'jpg',
            'png',
        ],  
          
        'sanitize' => true
        'hash'     => 'md5'
    ]);
    
    if($uploader->isValid() === true) {
    
        $uploader->move(); // upload files array result
        
        $uploader->getInfo() // var dump to see upload files
    
    }
    else {
        $uploader->getErrors(); // var_dump errors
    }
 }
 
 // you always can remove all files uploaded by one iteration 
 $uploader->truncate(); // added 1.1
```

## Unit Test
Also available in /phpunit directory. Run command to start
```php
php build/phpunit.phar --configuration phpunit.xml.dist --coverage-text
```

Read logs from phpunit/log

##[Change Log](https://github.com/stanislav-web/phalcon-uploader/blob/master/CHANGELOG.md "Change Log")

##[Issues](https://github.com/stanislav-web/phalcon-uploader/issues "Issues")

[![MIT License](https://poser.pugx.org/stanislav-web/phalcon-uploader/license.svg)](https://packagist.org/packages/stanislav-web/phalcon-searcher)
