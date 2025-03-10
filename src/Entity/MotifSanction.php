<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "motifsanction")]
class MotifSanction
{
    #[ORM\Id] // Clé primaire dans la table posts
    #[ORM\Column(name: "id", type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "libelle", type: "string", length: 100)]
    private string $libelle;

    #[ORM\Column(name: "description", type: "string", nullable: true)]
    private string $description;

    #[ORM\OneToMany(
        targetEntity: Sanction::class,
        mappedBy: "sanction",
        cascade: ["persist", "remove"]
    )]
    private Collection $sanction;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection<int, Sanction>
     */
    public function getSanction(): Collection
    {
        return $this->sanction;
    }

    public function addSanction(Sanction $sanction): self
    {
        if (!$this->sanction->contains($sanction)) {
            $this->sanction->add($sanction);
        }

        return $this;
    }

    public function removeSanction(Sanction $sanction): self
    {
        if ($this->sanction->removeElement($sanction)) {
            // Définir le côté propriétaire à null (sauf si déjà modifié)
            if ($sanction->getMotifSanction() === $this) {
                $sanction->setMotifSanction(null);
            }
        }

        return $this;
    }

}