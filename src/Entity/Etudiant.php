<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "etudiant")]
class Etudiant
{
    #[ORM\Id]
    #[ORM\Column(name: "id_etudiant", type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "prenom_etudiant", type: "string", length: 50)]
    private string $prenom;

    #[ORM\Column(name: "nom_etudiant", type: "string", length: 50)]
    private string $nom;

    #[ORM\ManyToOne(targetEntity: Promotion::class)]
    #[ORM\JoinColumn(name: "id_promotion", referencedColumnName: "id_promotion", nullable: false)]
    private Promotion $promotion;

    #[ORM\OneToMany(
        targetEntity: Sanction::class,
        mappedBy: "etudiantSanctionne",
        cascade: ["persist", "remove"]
    )]
    private Collection $sanctions;

    public function __construct()
    {
        $this->sanctions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPromotion(): Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $id_promotion): self
    {
        $this->promotion = $id_promotion;
        return $this;
    }

    /**
     * @return Collection<int, Sanction>
     */

    public function getSanctions(): Collection
    {
        return $this->sanctions;
    }

    public function addSanction(Sanction $sanction): self
    {
        if (!$this->sanctions->contains($sanction)) {
            $this->sanctions->add($sanction);
            //$sanction->setEtudiantSanctionne($this);
        }
        return $this;
    }

    public function removeSanction(Sanction $sanction): self
    {
        if ($this->sanctions->removeElement($sanction)) {
            if ($sanction->getEtudiantSanctionne() === $this) {
                $sanction->setEtudiantSanctionne(null);
            }
        }
        return $this;
    }
}
