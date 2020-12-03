<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 * @ApiResource(
 *      collectionOperations={"GET"},
 *      itemOperations={"GET"},
 *       normalizationContext={
 *          "groups"={
 *              "commentaire:read"
 *          }
 *     }
 *      
 * )
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read", "article:read", "commentaire:read", "categorie:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     *  @Groups({"user:read", "article:read", "commentaire:read", "categorie:read"})
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="commentaires")
     *  @Groups({"user:read", "article:read", "commentaire:read", "categorie:read"})
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
