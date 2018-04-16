<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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





}
