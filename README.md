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
