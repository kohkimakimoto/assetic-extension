<?php
namespace Assetic\Test\Filter;

use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;

use Assetic\Filter\CoffeeScriptPhpFilter;

class CoffeeScriptPhpFilterTest extends \PHPUnit_Framework_TestCase
{
  public function testDefault()
  {
    $asset = __DIR__."/../../resources/test.coffee";

    $assetCollection = new AssetCollection();
    $assetCollection->add(new FileAsset($asset));
    $assetCollection->ensureFilter(new CoffeeScriptPhpFilter());

    $ret = $assetCollection->dump();
    $exp = "var MyClass, myObject;";
    $this->assertRegExp("/$exp/", $ret);

    $exp = "Generated by CoffeeScript PHP";
    $this->assertRegExp("/$exp/", $ret);
  }

}
