<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use App\Enum\MediaType;

/**
 * Exercise
 *
 * @Entity(repositoryClass="App\Repository\ExerciseRecommedationRepository")
 * @Table(name="exercises_recommedation")
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 */
class ExerciseRecommedation
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
     * @Column(type="float", length=50)
     * @var float
     */
    protected $distance;

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
