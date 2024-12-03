<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "promotion")]
class Promotion
{
    #[ORM\Id] // Clé primaire dans la table posts
    #[ORM\Column(name: "id_promotion", type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "libelle_promotion", type: "string", length: 100)]
    private string $libelle;

    #[ORM\Column(name: "annee_promotion", type: "string")]
    private string $annee;

    #[ORM\OneToMany(
        targetEntity: Etudiant::class,
        mappedBy: "promotion",
        cascade: ["persist", "remove"]
    )]
    private Collection $etudiant;



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
    public function getAnnee(): string
    {
        return $this->annee;
    }

    /**
     * @param string $annee
     */
    public function setAnnee(string $annee): void
    {
        $this->annee = $annee;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiant(): Collection
    {
        return $this->etudiant;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->etudiant->contains($etudiant)) {
            $this->etudiant->add($etudiant);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiant->removeElement($etudiant)) {
            // Définir le côté propriétaire à null (sauf si déjà modifié)
            if ($etudiant->getPromotion() === $this) {
                $etudiant->setPromotion(null);
            }
        }

        return $this;
    }

}