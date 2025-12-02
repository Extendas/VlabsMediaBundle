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

/**
* Read values and store metadatas for the Media annotation
*
* @author Valentin Ferriere <valentin.ferriere@gmail.com>
*/
class MediaReader
{
    private string $attributeClass = 'Vlabs\MediaBundle\Attribute\Vlabs\Media';

    private $identifier;
    private $uploadDir;
    private $metadatas = [];

    public function handle(string $class, string $property)
    {
        $property = new \ReflectionProperty($class, $property);
        $media = $property->getAttributes($this->attributeClass);
        if (!$media)
        {
            throw new \Exception("Attribute Vlabs\Media not found on property {$property->getName()} of class $class");
        }
        if (\count($media) > 1)
        {
            throw new \Exception("Multiple Vlabs\Media attributes found on property {$property->getName()} of class $class");
        }
        $media_arguments = $media[0]->getArguments();

        $this->identifier = $media_arguments['identifier'];
        $this->uploadDir = $media_arguments['upload_dir'];

        $this->metadatas[$class][$property->getName()]['identifier'] = $this->identifier;
        $this->metadatas[$class][$property->getName()]['uploadDir'] = $this->uploadDir;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getUploadDir()
    {
        return $this->uploadDir;
    }

    public function getMetaDatas()
    {
        return $this->metadatas;
    }
}
