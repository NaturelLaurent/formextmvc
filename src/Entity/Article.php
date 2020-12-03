<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ApiResource(
 *      itemOperations={
 *                      "GET"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *                              "normalization_context"={
 *                                      "groups"={
 *                                                  "article:read"
 *                                               }
 *                               }
 *                             },
 *                      "PUT"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY') and object.getAuthor() == user or is_granted('ROLE_ADMIN')" ,
 *                              "denormalization_context"={
 *                                      "groups"={
 *                                                  "article:mod"
 *                                               }
 *                               }
 *                             },
 *                      "DELETE"={
 *                               "access_control" = "is_granted('IS_AUTHENTICATED_FULLY') and object.getAuthor() == user or is_granted('ROLE_ADMIN')",
 *                               "denormalization_context"={
 *                                      "groups"={
 *                                                  "article:del"
 *                                               }
 *                               }
 *                              }
 *                      },
 *      collectionOperations={
 *                      "GET"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *                              "normalization_context"={
 *                                      "groups"={
 *                                                  "article:read"
 *                                               }
 *                               }
 *                              },
 *                      "POST"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY')" ,
 *                              "denormalization_context"={
 *                                      "groups"={
 *                                                  "article:create"
 *                                               }
 *                               }
 *                             }
 *                          }
 * )
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read","article:read","article:del"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"article:read", "user:read", "article:del", "article:mod", "article:create"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"article:read", "article:del", "article:mod", "article:create"})
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"article:read", "article:del", "article:mod", "article:create"})
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"article:read","article:del", "article:create"})
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
        $this->createdAt = new DateTime();

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
