<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 */
class Tache
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=100)
     */
    private $Titre_Tache;

    /**
     * @ORM\Column(type="integer")
     */
    private $Value_Tache;

    /**
     * @ORM\Column(type="integer")
     */
    private $Pers_Tache;

    /**
     * @ORM\Column(type="text")
     */
    private $Desc_Tache;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $CreationDate_Tache;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DeadLine_Tache;

    /**
     * @return mixed
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitreTache()
    {
        return $this->Titre_Tache;
    }

    /**
     * @param mixed $Titre_Tache
     */
    public function setTitreTache($Titre_Tache)
    {
        $this->Titre_Tache = $Titre_Tache;
    }

    /**
     * @return mixed
     */
    public function getCreationDateTache()
    {
        if(!is_null($this->CreationDate_Tache))
            return $this->CreationDate_Tache->format('Y-m-d');
        else
            return $this->CreationDate_Tache;
    }

    /**
     * @param mixed $CreationDate_Tache
     */
    public function setCreationDateTache($CreationDate_Tache)
    {
        $this->CreationDate_Tache = $CreationDate_Tache;
    }


    /**
     * @return mixed
     */
    public function getDeadLineTache()
    {
        if(!is_null($this->DeadLine_Tache))
             return $this->DeadLine_Tache->format('Y-m-d');
        else
            return $this->DeadLine_Tache;
    }

    /**
     * @param mixed $DeadLine_Tache
     */
    public function setDeadLineTache($DeadLine_Tache)
    {
        $this->DeadLine_Tache = $DeadLine_Tache;
    }



    /**
     * @return mixed
     */
    public function getValueTache()
    {
        return $this->Value_Tache;
    }

    /**
     * @param mixed $Value_Tache
     */
    public function setValueTache($Value_Tache)
    {
        $this->Value_Tache = $Value_Tache;
    }

    /**
     * @return mixed
     */
    public function getPersTache()
    {
        return $this->Pers_Tache;
    }

    /**
     * @param mixed $Pers_Tache
     */
    public function setPersTache($Pers_Tache)
    {
        $this->Pers_Tache = $Pers_Tache;
    }

    /**
     * @return mixed
     */
    public function getDescTache()
    {
        return $this->Desc_Tache;
    }

    /**
     * @param mixed $Desc_Tache
     */
    public function setDescTache($Desc_Tache)
    {
        $this->Desc_Tache = $Desc_Tache;
    }


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Goal",inversedBy="taches")
     * @ORM\JoinColumn(nullable=true)
     */
    private $goal;

    public function getGoal():Goal
    {
        return $this->goal;
    }

    public function setGoal(Goal $goal)
    {
        $this->goal=$goal;
    }


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment",mappedBy="tache")
     */
    private $comments;

    public function __construct()
    {
        $this->comments=new ArrayCollection();
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }





}
