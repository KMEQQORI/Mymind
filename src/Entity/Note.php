<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;


    /**
     * @ORM\Column(type="integer")
     */
    private $conf;


    /**
     * @ORM\Column(type="integer")
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Observation",mappedBy="note",cascade={"remove"}, fetch="EAGER")
     */
    private $observations;

    public function __construct()
    {
        $this->observations=new ArrayCollection();
    }

    /**
     * @return Collection|Observation[]
     */
    public function getObservations()
    {
        return $this->observations;
    }


    public function getConf()
    {
        return $this->conf;
    }

    public function setConf($conf)
    {
        $this->conf=$conf;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page=$page;
    }

    public function getId()
    {
        return $this->id;    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }
}
