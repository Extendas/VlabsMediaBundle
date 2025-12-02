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
class Cdn
{
    private $baseUrl;

    public function __construct(string $base_url)
    {
        $this->baseUrl = $base_url;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
}
