<?php

/*
 * This file is part of the VlabsMediaBundle package.
 *
 * (c) Valentin Ferriere <http://www.v-labs.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vlabs\MediaBundle\Attribute;

use Vlabs\MediaBundle\Entity\BaseFileInterface;
use Vlabs\MediaBundle\Adapter\AdapterInterface;

/**
* Read values for the Cdn annotation
*
* @author Valentin Ferriere <valentin.ferriere@gmail.com>
*/
class CdnReader
{
    private string $attributeClass = 'Vlabs\MediaBundle\Attribute\Vlabs\Cdn';

    private $baseUrl;
    private $adapter;
    private $config = [];

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function handle(BaseFileInterface $file)
    {
        $class = $this->adapter->getClass($file);
        $property = new \ReflectionProperty($class, 'path');
        $cdn = $property->getAttributes($this->attributeClass);
        if (!$cdn)
        {
            throw new \Exception("Attribute Vlabs\Cdn not found on property {$property->getName()} of class $class");
        }
        if (\count($cdn) > 1)
        {
            throw new \Exception("Multiple Vlabs\Cdn attributes found on property {$property->getName()} of class $class");
        }
        $media_arguments = $cdn[0]->getArguments();

        $base_url = $media_arguments['base_url'];

        if(array_key_exists($base_url, $this->config)) {
            $this->baseUrl = $this->config[$base_url];
        } else {
            $this->baseUrl = $this->config['default'] ?? null;
        }
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
    
    public function setConfig($config = array())
    {
        $this->config = $config;
    }
}
