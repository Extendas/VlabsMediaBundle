<?php

/*
 * This file is part of the VlabsMediaBundle package.
 *
 * (c) Valentin Ferriere <http://www.v-labs.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vlabs\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class BaseFile implements BaseFileInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    protected ?int $id = null;

    #[ORM\Column(type: 'string')]
    protected ?string $name = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    protected ?int $size = null;

    #[ORM\Column(type: 'datetime')]
    protected \DateTime $created_at;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    protected ?string $content_type;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param  string   $name
     * @return BaseFile
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set size
     *
     * @param  integer  $size
     * @return BaseFile
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setCreatedAt(\DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function setContentType(string $content_type): self
    {
        $this->content_type = $content_type;

        return $this;
    }

    public function getContentType(): ?string
    {
        return $this->content_type;
    }
}
