<?php

namespace App\Entity;

use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 *       itemOperations={
 *                      "GET"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *                              "normalization_context"={
 *                                      "groups"={
 *                                                  "user:read"
 *                                               }
 *                               }
 *                             },
 *                      "PUT"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY') and object == user or is_granted('ROLE_ADMIN')" ,
 *                              "denormalization_context"={
 *                                      "groups"={
 *                                                  "user:mod"
 *                                               }
 *                               }
 *                             },
 *                      "DELETE"={
 *                               "access_control" = "is_granted('IS_AUTHENTICATED_FULLY') and object == user or is_granted('ROLE_ADMIN')",
 *                               "denormalization_context"={
 *                                      "groups"={
 *                                                  "user:del"
 *                                               }
 *                               }
 *                              }
 *                      },
 *      collectionOperations={"GET"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *                              "normalization_context"={
 *                                      "groups"={
 *                                                  "user:read"
 *                                               }
 *                               }
 *                              },
 *                      "POST"={
 *                              "access_control" = "is_granted('IS_AUTHENTICATED_ANONYMOUSLY')" ,
 *                              "denormalization_context"={
 *                                      "groups"={
 *                                                  "user:create"
 *                                               }
 *                               }
 *                             }
 *                          }
 * 
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read","article:read", "user:del", "user:create"})
     */
    private $id;

    /**
     *
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read", "article:read", "user:mod", "user:del", "user:create"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"admin:input", "user:del", "user:create"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"user:del", "user:mod", "user:create"})
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="author", orphanRemoval=true)
     * @Groups({"user:read", "user:create"})
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $article->setAuthor($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getAuthor() === $this) {
                $article->setAuthor(null);
            }
        }

        return $this;
    }
}
