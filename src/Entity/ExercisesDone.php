<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * ExercisesDone
 *
 * @Entity(repositoryClass="App\Repository\ExercisesDoneRepository")
 * @Table(name="exercises_done")
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 */
class ExercisesDone
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned": true})
     * @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="App\Entity\User")
     * @JoinColumn(onDelete="RESTRICT")
     * @var User
     */
    private $user;

    /**
     * @ManyToOne(targetEntity="App\Entity\Exercise")
     * @JoinColumn(onDelete="RESTRICT")
     * @var Exercise
     */
    private $exercise;

    /**
     * @Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $execute_at;

    /**
     * @Column(type="time", nullable=true)
     * @var DateTime
     */
    private $time_execute;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Exercise
     */
    public function getExercise()
    {
        return $this->exercise;
    }

    /**
     * @param Exercise $exercise
     */
    public function setExercise($exercise)
    {
        $this->exercise = $exercise;
    }

    /**
     * @return DateTime
     */
    public function getExecuteAt()
    {
        return $this->execute_at;
    }

    /**
     * @param DateTime $execute_at
     */
    public function setExecuteAt(DateTime $execute_at): void
    {
        $this->execute_at = $execute_at;
    }

    /**
     * @return DateTime
     */
    public function getTimeExecute()
    {
        return $this->time_execute;
    }

    /**
     * @param DateTime $time_execute
     */
    public function setTimeExecute(DateTime $time_execute): void
    {
        $this->time_execute = $time_execute;
    }
}
