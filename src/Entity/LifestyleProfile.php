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
    private $nutrition_a;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_b;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_c;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_d;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_e;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physical_activity_f;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_g;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_h;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventive_behavior_i;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_j;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_k;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $relationships_l;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_m;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_n;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stress_management_o;

    /**
     * @ManyToOne(targetEntity="App\Entity\User")
     * @JoinColumn(onDelete="RESTRICT")
     * @var User
     */
    private $user;


    /**
     * @return User
     */
    public function getUser(): ?User
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
    public function getNutritionB(): ?string
    {
        return $this->nutrition_b;
    }

    /**
     * @param string $nutrition_b
     */
    public function setNutritionB(string $nutrition_b): void
    {
        $this->nutrition_b = $nutrition_b;
    }

    /**
     * @return string
     */
    public function getNutritionC(): ?string
    {
        return $this->nutrition_c;
    }

    /**
     * @param string $nutrition_c
     */
    public function setNutritionC(string $nutrition_c): void
    {
        $this->nutrition_c = $nutrition_c;
    }

    /**
     * @return string
     */
    public function getPhysicalActivityE(): ?string
    {
        return $this->physical_activity_e;
    }

    /**
     * @param string $physical_activity_e
     */
    public function setPhysicalActivityE(string $physical_activity_e): void
    {
        $this->physical_activity_e = $physical_activity_e;
    }

    /**
     * @return string
     */
    public function getPhysicalActivityF(): ?string
    {
        return $this->physical_activity_f;
    }

    /**
     * @param string $physical_activity_f
     */
    public function setPhysicalActivityF(string $physical_activity_f): void
    {
        $this->physical_activity_f = $physical_activity_f;
    }

    /**
     * @return string
     */
    public function getPreventiveBehaviorH(): ?string
    {
        return $this->preventive_behavior_h;
    }

    /**
     * @param string $preventive_behavior_h
     */
    public function setPreventiveBehaviorH(string $preventive_behavior_h): void
    {
        $this->preventive_behavior_h = $preventive_behavior_h;
    }

    /**
     * @return string
     */
    public function getPreventiveBehaviorI(): ?string
    {
        return $this->preventive_behavior_i;
    }

    /**
     * @param string $preventive_behavior_i
     */
    public function setPreventiveBehaviorI(string $preventive_behavior_i): void
    {
        $this->preventive_behavior_i = $preventive_behavior_i;
    }

    /**
     * @return string
     */
    public function getRelationshipsK(): ?string
    {
        return $this->relationships_k;
    }

    /**
     * @param string $relationships_k
     */
    public function setRelationshipsK(string $relationships_k): void
    {
        $this->relationships_k = $relationships_k;
    }

    /**
     * @return string
     */
    public function getRelationshipsL(): ?string
    {
        return $this->relationships_l;
    }

    /**
     * @param string $relationships_l
     */
    public function setRelationshipsL(string $relationships_l): void
    {
        $this->relationships_l = $relationships_l;
    }

    /**
     * @return string
     */
    public function getStressManagementN(): ?string
    {
        return $this->stress_management_n;
    }

    /**
     * @param string $stress_management_n
     */
    public function setStressManagementN(string $stress_management_n): void
    {
        $this->stress_management_n = $stress_management_n;
    }

    /**
     * @return string
     */
    public function getStressManagementO(): ?string
    {
        return $this->stress_management_o;
    }

    /**
     * @param string $stress_management_o
     */
    public function setStressManagementO(string $stress_management_o): void
    {
        $this->stress_management_o = $stress_management_o;
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
    public function getNutritionA(): ?string
    {
        return $this->nutrition_a;
    }

    /**
     * @param string $nutrition_a
     */
    public function setNutritionA(string $nutrition_a): void
    {
        $this->nutrition_a = $nutrition_a;
    }

    /**
     * @return string
     */
    public function getPhysicalActivityD(): ?string
    {
        return $this->physical_activity_d;
    }

    /**
     * @param string $physical_activity_d
     */
    public function setPhysicalActivityD(string $physical_activity_d): void
    {
        $this->physical_activity_d = $physical_activity_d;
    }

    /**
     * @return string
     */
    public function getPreventiveBehaviorG(): ?string
    {
        return $this->preventive_behavior_g;
    }

    /**
     * @param string $preventive_behavior_g
     */
    public function setPreventiveBehaviorG(string $preventive_behavior_g): void
    {
        $this->preventive_behavior_g = $preventive_behavior_g;
    }

    /**
     * @return string
     */
    public function getRelationshipsJ(): ?string
    {
        return $this->relationships_j;
    }

    /**
     * @param string $relationships_j
     */
    public function setRelationshipsJ(string $relationships_j): void
    {
        $this->relationships_j = $relationships_j;
    }

    /**
     * @return string
     */
    public function getStressManagementM(): ?string
    {
        return $this->stress_management_m;
    }

    /**
     * @param string $stress_management_m
     */
    public function setStressManagementM(string $stress_management_m): void
    {
        $this->stress_management_m = $stress_management_m;
    }

    public function populate($data)
    {
        if (isset($data['nutrition_a'])) $this->setNutritionA($data['nutrition_a']);
        if (isset($data['nutritionA'])) $this->setNutritionA($data['nutritionA']);

        if (isset($data['nutrition_b'])) $this->setNutritionB($data['nutrition_b']);
        if (isset($data['nutritionB'])) $this->setNutritionB($data['nutritionB']);

        if (isset($data['nutrition_c'])) $this->setNutritionC($data['nutrition_c']);
        if (isset($data['nutritionC'])) $this->setNutritionC($data['nutritionC']);

        if (isset($data['physical_activity_d'])) $this->setPhysicalActivityD($data['physical_activity_d']);
        if (isset($data['physical_activityD'])) $this->setPhysicalActivityD($data['physical_activityD']);

        if (isset($data['physical_activity_e'])) $this->setPhysicalActivityE($data['physical_activity_e']);
        if (isset($data['physical_activityE'])) $this->setPhysicalActivityE($data['physical_activityE']);

        if (isset($data['physical_activity_f'])) $this->setPhysicalActivityF($data['physical_activity_f']);
        if (isset($data['physical_activityF'])) $this->setPhysicalActivityF($data['physical_activityF']);

        if (isset($data['preventive_behavior_g'])) $this->setPreventiveBehaviorG($data['preventive_behavior_g']);
        if (isset($data['preventive_behaviorG'])) $this->setPreventiveBehaviorG($data['preventive_behaviorG']);
        
        if (isset($data['preventive_behavior_h'])) $this->setPreventiveBehaviorH($data['preventive_behavior_h']);
        if (isset($data['preventive_behaviorH'])) $this->setPreventiveBehaviorH($data['preventive_behaviorH']);
        
        if (isset($data['preventive_behavior_i'])) $this->setPreventiveBehaviorI($data['preventive_behavior_i']);
        if (isset($data['preventive_behaviorI'])) $this->setPreventiveBehaviorI($data['preventive_behaviorI']);
        
        if (isset($data['relationships_j'])) $this->setRelationshipsJ($data['relationships_j']);
        if (isset($data['relationshipsJ'])) $this->setRelationshipsJ($data['relationshipsJ']);

        if (isset($data['relationships_k'])) $this->setRelationshipsK($data['relationships_k']);
        if (isset($data['relationshipsK'])) $this->setRelationshipsK($data['relationshipsK']);

        if (isset($data['relationships_l'])) $this->setRelationshipsL($data['relationships_l']);
        if (isset($data['relationshipsL'])) $this->setRelationshipsL($data['relationshipsL']);

        if (isset($data['stress_management_m'])) $this->setStressManagementM($data['stress_management_m']);
        if (isset($data['stress_managementM'])) $this->setStressManagementM($data['stress_managementM']);

        if (isset($data['stress_management_n'])) $this->setStressManagementN($data['stress_management_n']);
        if (isset($data['stress_managementN'])) $this->setStressManagementN($data['stress_managementN']);

        if (isset($data['stress_management_o'])) $this->setStressManagementO($data['stress_management_o']);
        if (isset($data['stress_managementO'])) $this->setStressManagementO($data['stress_managementO']);

    }
}
