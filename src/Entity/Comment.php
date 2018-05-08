<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $CreationDate_Comment;


    /**
     * @ORM\Column(type="text")
     */
    private $Comment_text;


    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->Comment_text;
    }

    /**
     * @param mixed $Comment_text
     */
    public function setCommentText($Comment_text)
    {
        $this->Comment_text = $Comment_text;
    }


    /**
     * @return mixed
     */
    public function getCreationDateComment()
    {
        if(!is_null($this->CreationDate_Comment))
            return $this->CreationDate_Comment->format('Y-m-d');
        else
            return $this->CreationDate_Comment;
    }

    /**
     * @param mixed $CreationDate_Tache
     */
    public function setCreationDateComment($CreationDate_Comment)
    {
        $this->CreationDate_Comment = $CreationDate_Comment;
    }



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tache",inversedBy="comments",cascade={"remove"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tache;

    public function getTache():Tache
    {
        return $this->tache;
    }

    public function setTache(Tache $tache)
    {
        $this->tache=$tache;
    }


}
