<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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

    private $Titre_Categorie;

    /**
     * @ORM\Column(type="text")
     */
    private $Desc_Categorie;

    /**
     * @return mixed
     */
    public function getId()
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
    public function getTitreCategorie()
    {
        return $this->Titre_Categorie;
    }

    /**
     * @param mixed $Titre_Categorie
     */
    public function setTitreCategorie($Titre_Categorie)
    {
        $this->Titre_Categorie = $Titre_Categorie;
    }

    /**
     * @return mixed
     */
    public function getDescCategorie()
    {
        return $this->Desc_Categorie;
    }

    /**
     * @param mixed $Desc_Categorie
     */
    public function setDescCategorie($Desc_Categorie)
    {
        $this->Desc_Categorie = $Desc_Categorie;
    }


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Goal",mappedBy="categorie", fetch="EAGER")
     */
    private $goals;
    public function __construct()
    {
        $this->goals=new ArrayCollection();
    }

    /**
     *@return Collection|Goal[]
     */
    public function getGoals()
    {
        return $this->goals;
    }


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "Categorie :".$this->getTitreCategorie();
    }



}
