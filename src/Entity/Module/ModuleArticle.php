<?php

namespace App\Entity\Module;

use App\Repository\Module\ModuleArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Article;

/**
 * @ORM\Entity(repositoryClass=ModuleArticleRepository::class)
 * @Vich\Uploadable
 */
class ModuleArticle extends Module
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class)
     */
    private $articles;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default"=3})
     */
    private $articleNbr = 3;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->articles->removeElement($article);

        return $this;
    }

    public function getType()
    {
        return 'MODULE_ARTICLE';
    }

    public function getArticleNbr(): ?int
    {
        return $this->articleNbr;
    }

    public function setArticleNbr(?int $articleNbr): self
    {
        $this->articleNbr = $articleNbr;

        return $this;
    }
}
