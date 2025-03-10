<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "user")]
class User
{
    #[ORM\Id] // Clé primaire dans la table posts
    #[ORM\Column(name: "id_user", type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "nom_user", type: "string", length: 100)]
    private string $nom;

    #[ORM\Column(name: "prenom_user", type: "string", length: 100)]
    private string $prenom;

    #[ORM\Column(name: "email_user", type: "string", length: 100)]
    private string $email;

    #[ORM\Column(name: "password_user", type: "text")]
    private string $password;

    #[ORM\OneToMany(
        targetEntity: Sanction::class,
        mappedBy: "createurSanction",
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
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
            if ($sanction->getCreateurSanction() === $this) {
                $sanction->setCreateurSanction(null);
            }
        }

        return $this;
    }


}