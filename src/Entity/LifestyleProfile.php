<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;


/**
 * LifestyleProfile
 *
 * @Entity(repositoryClass="App\Repository\LifestyleProfileRepository")
 * @Table(name="lifestyle_profile")
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 */
class LifestyleProfile
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned": true})
     * @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_0;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_1;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_2;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_3;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_0;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_1;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_2;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_3;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_0;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_1;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_2;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_3;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_0;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_1;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_2;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_3;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_0;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_1;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_2;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_3;

    /**
     * @ManyToOne(targetEntity="App\Entity\User")
     * @JoinColumn(onDelete="RESTRICT")
     * @var User
     */
    private $user;


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
     * @return string
     */
    public function getNutrition1(): string
    {
        return $this->nutrition_1;
    }

    /**
     * @param string $nutrition_1
     */
    public function setNutrition1(string $nutrition_1): void
    {
        $this->nutrition_1 = $nutrition_1;
    }

    /**
     * @return string
     */
    public function getNutrition2(): string
    {
        return $this->nutrition_2;
    }

    /**
     * @param string $nutrition_2
     */
    public function setNutrition2(string $nutrition_2): void
    {
        $this->nutrition_2 = $nutrition_2;
    }

    /**
     * @return string
     */
    public function getNutrition3(): string
    {
        return $this->nutrition_3;
    }

    /**
     * @param string $nutrition_3
     */
    public function setNutrition3(string $nutrition_3): void
    {
        $this->nutrition_3 = $nutrition_3;
    }

    /**
     * @return string
     */
    public function getPhysicalActivity1(): string
    {
        return $this->physical_activity_1;
    }

    /**
     * @param string $physical_activity_1
     */
    public function setPhysicalActivity1(string $physical_activity_1): void
    {
        $this->physical_activity_1 = $physical_activity_1;
    }

    /**
     * @return string
     */
    public function getPhysicalActivity2(): string
    {
        return $this->physical_activity_2;
    }

    /**
     * @param string $physical_activity_2
     */
    public function setPhysicalActivity2(string $physical_activity_2): void
    {
        $this->physical_activity_2 = $physical_activity_2;
    }

    /**
     * @return string
     */
    public function getPhysicalActivity3(): string
    {
        return $this->physical_activity_3;
    }

    /**
     * @param string $physical_activity_3
     */
    public function setPhysicalActivity3(string $physical_activity_3): void
    {
        $this->physical_activity_3 = $physical_activity_3;
    }

    /**
     * @return string
     */
    public function getPreventiveBehavior1(): string
    {
        return $this->preventive_behavior_1;
    }

    /**
     * @param string $preventive_behavior_1
     */
    public function setPreventiveBehavior1(string $preventive_behavior_1): void
    {
        $this->preventive_behavior_1 = $preventive_behavior_1;
    }

    /**
     * @return string
     */
    public function getPreventiveBehavior2(): string
    {
        return $this->preventive_behavior_2;
    }

    /**
     * @param string $preventive_behavior_2
     */
    public function setPreventiveBehavior2(string $preventive_behavior_2): void
    {
        $this->preventive_behavior_2 = $preventive_behavior_2;
    }

    /**
     * @return string
     */
    public function getPreventiveBehavior3(): string
    {
        return $this->preventive_behavior_3;
    }

    /**
     * @param string $preventive_behavior_3
     */
    public function setPreventiveBehavior3(string $preventive_behavior_3): void
    {
        $this->preventive_behavior_3 = $preventive_behavior_3;
    }

    /**
     * @return string
     */
    public function getRelationships1(): string
    {
        return $this->relationships_1;
    }

    /**
     * @param string $relationships_1
     */
    public function setRelationships1(string $relationships_1): void
    {
        $this->relationships_1 = $relationships_1;
    }

    /**
     * @return string
     */
    public function getRelationships2(): string
    {
        return $this->relationships_2;
    }

    /**
     * @param string $relationships_2
     */
    public function setRelationships2(string $relationships_2): void
    {
        $this->relationships_2 = $relationships_2;
    }

    /**
     * @return string
     */
    public function getRelationships3(): string
    {
        return $this->relationships_3;
    }

    /**
     * @param string $relationships_3
     */
    public function setRelationships3(string $relationships_3): void
    {
        $this->relationships_3 = $relationships_3;
    }

    /**
     * @return string
     */
    public function getStressManagement1(): string
    {
        return $this->stress_management_1;
    }

    /**
     * @param string $stress_management_1
     */
    public function setStressManagement1(string $stress_management_1): void
    {
        $this->stress_management_1 = $stress_management_1;
    }

    /**
     * @return string
     */
    public function getStressManagement2(): string
    {
        return $this->stress_management_2;
    }

    /**
     * @param string $stress_management_2
     */
    public function setStressManagement2(string $stress_management_2): void
    {
        $this->stress_management_2 = $stress_management_2;
    }

    /**
     * @return string
     */
    public function getStressManagement3(): string
    {
        return $this->stress_management_3;
    }

    /**
     * @param string $stress_management_3
     */
    public function setStressManagement3(string $stress_management_3): void
    {
        $this->stress_management_3 = $stress_management_3;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNutrition0(): string
    {
        return $this->nutrition_0;
    }

    /**
     * @param string $nutrition_0
     */
    public function setNutrition0(string $nutrition_0): void
    {
        $this->nutrition_0 = $nutrition_0;
    }

    /**
     * @return string
     */
    public function getPhysicalActivity0(): string
    {
        return $this->physical_activity_0;
    }

    /**
     * @param string $physical_activity_0
     */
    public function setPhysicalActivity0(string $physical_activity_0): void
    {
        $this->physical_activity_0 = $physical_activity_0;
    }

    /**
     * @return string
     */
    public function getPreventiveBehavior0(): string
    {
        return $this->preventive_behavior_0;
    }

    /**
     * @param string $preventive_behavior_0
     */
    public function setPreventiveBehavior0(string $preventive_behavior_0): void
    {
        $this->preventive_behavior_0 = $preventive_behavior_0;
    }

    /**
     * @return string
     */
    public function getRelationships0(): string
    {
        return $this->relationships_0;
    }

    /**
     * @param string $relationships_0
     */
    public function setRelationships0(string $relationships_0): void
    {
        $this->relationships_0 = $relationships_0;
    }

    /**
     * @return string
     */
    public function getStressManagement0(): string
    {
        return $this->stress_management_0;
    }

    /**
     * @param string $stress_management_0
     */
    public function setStressManagement0(string $stress_management_0): void
    {
        $this->stress_management_0 = $stress_management_0;
    }

    public function populate($data)
    {
        $this->setNutrition0($data['nutrition_0']);
        $this->setNutrition1($data['nutrition_1']);
        $this->setNutrition2($data['nutrition_2']);
        $this->setNutrition3($data['nutrition_3']);
        $this->setPhysicalActivity0($data['physical_activity_0']);
        $this->setPhysicalActivity1($data['physical_activity_1']);
        $this->setPhysicalActivity2($data['physical_activity_2']);
        $this->setPhysicalActivity3($data['physical_activity_3']);
        $this->setPreventiveBehavior0($data['preventive_behavior_0']);
        $this->setPreventiveBehavior1($data['preventive_behavior_1']);
        $this->setPreventiveBehavior2($data['preventive_behavior_2']);
        $this->setPreventiveBehavior3($data['preventive_behavior_3']);
        $this->setRelationships0($data['relationships_0']);
        $this->setRelationships1($data['relationships_1']);
        $this->setRelationships2($data['relationships_2']);
        $this->setRelationships3($data['relationships_3']);
        $this->setStressManagement0($data['stress_management_0']);
        $this->setStressManagement1($data['stress_management_1']);
        $this->setStressManagement2($data['stress_management_2']);
        $this->setStressManagement3($data['stress_management_3']);
    }
}