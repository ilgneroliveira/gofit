<?php

namespace App\Entity;

use App\Enum\MediaType;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * ScheduleExercise
 *
 * @Entity(repositoryClass="App\Repository\ScheduleExerciseRepository")
 * @Table(name="schedule_exercises")
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 */
class ScheduleExercise
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned": true})
     * @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $schendule_date;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getSchenduleDate(): DateTime
    {
        return $this->schendule_date;
    }

    /**
     * @param DateTime $schendule_date
     */
    public function setSchenduleDate(DateTime $schendule_date): void
    {
        $this->schendule_date = $schendule_date;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Exercise
     */
    public function getExercise(): Exercise
    {
        return $this->exercise;
    }

    /**
     * @param Exercise $exercise
     */
    public function setExercise(Exercise $exercise): void
    {
        $this->exercise = $exercise;
    }
}