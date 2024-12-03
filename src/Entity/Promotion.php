<?php

namespace App\Entity;

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

}