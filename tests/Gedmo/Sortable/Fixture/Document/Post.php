<?php

declare(strict_types=1);

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\Tests\Sortable\Fixture\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Types\Type as MongoDBType;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="posts")
 */
#[ODM\Document(collection: 'posts')]
class Post
{
    /**
     * @var int|null
     *
     * @Gedmo\SortablePosition
     * @ODM\Field(type="int")
     */
    #[Gedmo\SortablePosition]
    #[ODM\Field(type: MongoDBType::INT)]
    protected $position;

    /**
     * @var Category|null
     *
     * @Gedmo\SortableGroup
     * @ODM\ReferenceOne(targetDocument="Gedmo\Tests\Sortable\Fixture\Document\Category")
     */
    #[Gedmo\SortableGroup]
    #[ODM\ReferenceOne(targetDocument: Category::class)]
    protected $category;

    /**
     * @var string|null
     *
     * @ODM\Id
     */
    #[ODM\Id]
    private $id;

    /**
     * @var string|null
     *
     * @ODM\Field(type="string")
     */
    #[ODM\Field(type: MongoDBType::STRING)]
    private $title;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }
}
