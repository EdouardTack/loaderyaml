# LoaderYaml plugin for CakePHP

implements YAML specification using [Symfony Yaml Component](https://github.com/symfony/Yaml) to CakePHP 3 for config files

## Requirements

The 3.0 branch has the following requirements:

* CakePHP 3.0.0 or greater.

## Installation

### Composer

* Install the plugin with composer from your CakePHP Project's ROOT directory (where composer.json file is located)
```sh
php composer.phar require edouardtack/loaderyaml "dev-master"
```

OR
add this lines to your `composer.json`

```javascript
"require": {
  "edouardtack/loaderyaml": "dev-master"
}
```

And run `php composer.phar update`

### CakePHP configuration

then add this lines to your `config/bootstrap.php`

```php
Plugin::load('LoaderYaml', ['bootstrap' => false, 'routes' => false]);
```

And create a directory into **config** directory called **yaml**. You can insert your yaml's files.

## Usage

Load it

```php
use LoaderYaml\Controller\Component\LoaderComponent;
```

And use it

```php
$config = LoaderComponent::load('FILENAME.yml');
```

OR

```php
$this->loadComponent('LoaderYaml.Loader', ['file' => 'FILENAME.yml']);
$config = $this->Loader->get();
```

OR

```php
$this->loadComponent('LoaderYaml.Loader');
$config = $this->Loader->get('FILENAME.yml');
```

## LICENCE

The MIT License (MIT)

Copyright (c) 2016 Edouard

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
