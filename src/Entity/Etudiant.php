<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "etudiant")]
class Etudiant
{
    #[ORM\Id] // Clé primaire dans la table posts
    #[ORM\Column(name: "id_etudiant", type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "prenom_etudiant", type: "string", length: 50)]
    private string $prenom;

    #[ORM\Column(name: "nom_etudiant", type: "string", length: 50)]
    private string $nom;

    #[ORM\ManyToOne(targetEntity: Promotion::class)]
    #[ORM\JoinColumn(name: "id_promotion", nullable: false)]
    private Promotion $promotion;

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
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return Promotion
     */
    public function getPromotion(): Promotion
    {
        return $this->promotion;
    }

    /**
     * @param Promotion|null $id_promotion
     * @return Etudiant
     */
    public function setPromotion(?Promotion $id_promotion): self
    {
        $this->promotion = $id_promotion;
        return $this;
    }

}