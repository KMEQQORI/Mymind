<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\GoalRepository")
 */
class Goal
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
    private $Titre_Goal;

    /**
     * @ORM\Column(type="text")
     */
    private $Desc_Goal;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $CreationDate_Goal;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $Id
     */
    public function setIdGoal($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitreGoal()
    {
        return $this->Titre_Goal;
    }

    /**
     * @param mixed $Titre_Goal
     */
    public function setTitreGoal($Titre_Goal)
    {
        $this->Titre_Goal = $Titre_Goal;
    }

    /**
     * @return mixed
     */
    public function getDescGoal()
    {
        return $this->Desc_Goal;
    }

    /**
     * @param mixed $Desc_Goal
     */
    public function setDescGoal($Desc_Goal)
    {
        $this->Desc_Goal = $Desc_Goal;
    }

    /**
     * @return mixed
     */
    public function getCreationDateGoal()
    {
        if(!is_null($this->CreationDate_Goal))
            return $this->CreationDate_Goal->format('Y-m-d');
        else
            return $this->CreationDate_Goal;
    }

    /**
     * @param mixed $CreationDate_Goal
     */
    public function setCreationDateGoal($CreationDate_Goal)
    {
        $this->CreationDate_Goal = $CreationDate_Goal;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tache",mappedBy="goal")
     */
    private $taches;

    public function __construct()
    {
        $this->taches=new ArrayCollection();
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie",inversedBy="goals")
     * @ORM\JoinColumn( nullable=true))
     */
    private $categorie;

    public function getCategorie():Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie)
    {
        $this->categorie=$categorie;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "Goals :".$this->getTitreGoal();
    }


    /**
     * @JMS\VirtualProperty
     * @JMS\SerializedName("Statistiques")
     */
    public function getStatistiques()
    {
        $tasks=$this->getTaches();
        $totalScore=0;
        $gainedScore=0;
        $finished=0;
        $unFinished=0;
        $totalCount=0;

        foreach ($tasks as $task){
            //commandes
            $totalScore+=$task->getValueTache();
            $gainedScore+=$task->getValueTache()*$task->getPersTache()/100;
            $finished+=($task->getPersTache()==100);
            $unFinished+=($task->getPersTache()==0);
            $totalCount++;
        }

        $statistiques=[
            "totalScore" => $totalScore,
            "gainedScore" => $gainedScore,
            "percentage" => floor (($gainedScore/$totalScore)*100),
            "finished" => $finished,
            "unFinished" => $unFinished,
            "totalCount" => $totalCount
        ];

        return $statistiques;
    }


}
