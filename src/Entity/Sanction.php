<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "sanction")]
class Sanction
{
    #[ORM\Id]
    #[ORM\Column(name: "id", type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Etudiant::class, inversedBy: "sanctions")]
    #[ORM\JoinColumn(name: "id_etudiant", referencedColumnName: "id_etudiant", nullable: false)]
    private Etudiant $etudiantSanctionne;

    #[ORM\Column(name: "nom_applicateur", type: "string", length: 100)]
    private string $nomApplicateur;

    #[ORM\ManyToOne(targetEntity: MotifSanction::class, inversedBy: "sanctions")]
    #[ORM\JoinColumn(name: "motif_sanction", referencedColumnName: "id", nullable: false)]
    private MotifSanction $motifSanction;

    #[ORM\Column(name: "description", type: "text", nullable: true)]
    private ?string $description;

    #[ORM\Column(name: "date_incident", type: "date")]
    private \DateTime $dateIncident;

    #[ORM\Column(name: "date_creation", type: "date")]
    private \DateTime $dateCreation;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "sanctions")]
    #[ORM\JoinColumn(name: "createur_sanction", referencedColumnName: "id_user", nullable: false)]
    private User $createurSanction;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEtudiantSanctionne(): Etudiant
    {
        return $this->etudiantSanctionne;
    }

    public function setEtudiantSanctionne(Etudiant $etudiantSanctionne): self
    {
        $this->etudiantSanctionne = $etudiantSanctionne;
        return $this;
    }

    public function getNomApplicateur(): string
    {
        return $this->nomApplicateur;
    }

    public function setNomApplicateur(string $nomApplicateur): self
    {
        $this->nomApplicateur = $nomApplicateur;
        return $this;
    }

    public function getMotifSanction(): MotifSanction
    {
        return $this->motifSanction;
    }

    public function setMotifSanction(MotifSanction $motifSanction): self
    {
        $this->motifSanction = $motifSanction;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDateIncident(): \DateTime
    {
        return $this->dateIncident;
    }

    public function setDateIncident(\DateTime $dateIncident): self
    {
        $this->dateIncident = $dateIncident;
        return $this;
    }

    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTime $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getCreateurSanction(): User
    {
        return $this->createurSanction;
    }

    public function setCreateurSanction(User $createurSanction): self
    {
        $this->createurSanction = $createurSanction;
        return $this;
    }
}
