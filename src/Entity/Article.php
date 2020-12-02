<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
  * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 *      itemOperations={"GET", "PUT", "DELETE"},
 *      collectionOperations={"GET", "POST"},
 *      normalizationContext={
 *          "groups"={
 *              "article:read"
 *          }
 *      }
 * 
 * )
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read", "user:ap","article:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("article:read")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups("article:read")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("article:read")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("article:read")
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
