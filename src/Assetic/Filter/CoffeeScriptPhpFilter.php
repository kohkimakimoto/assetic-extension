<?php

namespace Assetic\Filter;

use Assetic\Asset\AssetInterface;

/*
 * This file is a derivative from [dlancea/CoffeePhpBundle]
 *
 * https://github.com/dlancea/CoffeePhpBundle
 * https://github.com/dlancea/CoffeePhpBundle/blob/master/Assetic/Filter/CoffeePhpFilter.php
 */

/**
 * Compiles CoffeeScript into Javascript using coffeescript-php.
 *
 * @link http://coffeescript.org/
 * @link https://github.com/alxlit/coffeescript-php
 *
 * @author Kohki Makimtoo <kohki.makimoto@gmail.com>
 */
class CoffeeScriptPhpFilter implements FilterInterface
{
  public function filterLoad(AssetInterface $asset)
  {
  }

  public function filterDump(AssetInterface $asset)
  {
    $content = $asset->getContent();

    try {
      if (trim($content))
        $content = \CoffeeScript\Compiler::compile($content, array('filename' => $asset->getSourcePath()));
    } catch (Exception $e) {
      $content = $e->getMessage();
    }

    $asset->setContent($content);
  }

}
