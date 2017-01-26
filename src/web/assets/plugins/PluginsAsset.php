<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\web\assets\plugins;

use craft\web\assets\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * Asset bundle for the Plugins page
 */
class PluginsAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__.'/dist';

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'plugins.css',
        ];

        parent::init();
    }
}