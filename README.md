# Assetic Extension

[![Build Status](https://travis-ci.org/kohkimakimoto/assetic-extension.png?branch=master)](https://travis-ci.org/kohkimakimoto/assetic-extension)

My Assetic extension filters.

## List of Filters

 * `CoffeeScriptPHPFilter`: compiles CoffeeScript into Javascript using [coffeescript-php](https://github.com/alxlit/coffeescript-php)

## Usage

``` php
<?php

use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Filter\CoffeeScriptPhpFilter;

$assetCollection = new AssetCollection();
$assetCollection->add(new FileAsset("foo.coffee));
$assetCollection->ensureFilter(new CoffeeScriptPhpFilter());

echo $assetCollection->dump();
```