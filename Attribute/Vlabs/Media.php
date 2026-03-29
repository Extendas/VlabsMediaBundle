<?php

/*
 * This file is part of the VlabsMediaBundle package.
 *
 * (c) Valentin Ferriere <http://www.v-labs.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vlabs\MediaBundle\Attribute\Vlabs;

use Attribute;

/**
 * @author Valentin Ferriere <valentin.ferriere@gmail.com>
 */
#[\Attribute(Attribute::TARGET_PROPERTY)]
class Media
{
    private $identifier;
    private $uploadDir;

    public function __construct(string $identifier, string $upload_dir)
    {
        $this->identifier = $identifier;
        $this->uploadDir = $upload_dir;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getUploadDir()
    {
        return $this->uploadDir;
    }
}
