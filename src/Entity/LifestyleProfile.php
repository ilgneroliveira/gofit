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
    private $nutritionA;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutritionB;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $nutrition_c;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physicalActivity_d;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physicalActivity_e;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $physicalActivity_f;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventiveBehavior_g;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventiveBehavior_h;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $preventiveBehavior_i;

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
    private $stressManagementM;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stressManagement_n;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $stressManagement_o;

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
        return $this->nutritionB;
    }

    /**
     * @param string $nutritionB
     */
    public function setNutritionB(string $nutritionB): void
    {
        $this->nutritionB = $nutritionB;
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
        return $this->physicalActivity_e;
    }

    /**
     * @param string $physicalActivity_e
     */
    public function setPhysicalActivityE(string $physicalActivity_e): void
    {
        $this->physicalActivity_e = $physicalActivity_e;
    }

    /**
     * @return string
     */
    public function getPhysicalActivityF(): ?string
    {
        return $this->physicalActivity_f;
    }

    /**
     * @param string $physicalActivity_f
     */
    public function setPhysicalActivityF(string $physicalActivity_f): void
    {
        $this->physicalActivity_f = $physicalActivity_f;
    }

    /**
     * @return string
     */
    public function getPreventiveBehaviorH(): ?string
    {
        return $this->preventiveBehavior_h;
    }

    /**
     * @param string $preventiveBehavior_h
     */
    public function setPreventiveBehaviorH(string $preventiveBehavior_h): void
    {
        $this->preventiveBehavior_h = $preventiveBehavior_h;
    }

    /**
     * @return string
     */
    public function getPreventiveBehaviorI(): ?string
    {
        return $this->preventiveBehavior_i;
    }

    /**
     * @param string $preventiveBehavior_i
     */
    public function setPreventiveBehaviorI(string $preventiveBehavior_i): void
    {
        $this->preventiveBehavior_i = $preventiveBehavior_i;
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
        return $this->stressManagement_n;
    }

    /**
     * @param string $stressManagement_n
     */
    public function setStressManagementN(string $stressManagement_n): void
    {
        $this->stressManagement_n = $stressManagement_n;
    }

    /**
     * @return string
     */
    public function getStressManagementO(): ?string
    {
        return $this->stressManagement_o;
    }

    /**
     * @param string $stressManagement_o
     */
    public function setStressManagementO(string $stressManagement_o): void
    {
        $this->stressManagement_o = $stressManagement_o;
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
        return $this->nutritionA;
    }

    /**
     * @param string $nutritionA
     */
    public function setNutritionA(string $nutritionA): void
    {
        $this->nutritionA = $nutritionA;
    }

    /**
     * @return string
     */
    public function getPhysicalActivityD(): ?string
    {
        return $this->physicalActivity_d;
    }

    /**
     * @param string $physicalActivity_d
     */
    public function setPhysicalActivityD(string $physicalActivity_d): void
    {
        $this->physicalActivity_d = $physicalActivity_d;
    }

    /**
     * @return string
     */
    public function getPreventiveBehaviorG(): ?string
    {
        return $this->preventiveBehavior_g;
    }

    /**
     * @param string $preventiveBehavior_g
     */
    public function setPreventiveBehaviorG(string $preventiveBehavior_g): void
    {
        $this->preventiveBehavior_g = $preventiveBehavior_g;
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
        return $this->stressManagementM;
    }

    /**
     * @param string $stressManagementM
     */
    public function setStressManagementM(string $stressManagementM): void
    {
        $this->stressManagementM = $stressManagementM;
    }

    public function populate($data)
    {
//        if (isset($data['nutritionA'])) $this->setNutritionA($data['nutritionA']);
        if (isset($data['nutritionA'])) $this->setNutritionA($data['nutritionA']);

//        if (isset($data['nutritionB'])) $this->setNutritionB($data['nutritionB']);
        if (isset($data['nutritionB'])) $this->setNutritionB($data['nutritionB']);

//        if (isset($data['nutrition_c'])) $this->setNutritionC($data['nutrition_c']);
        if (isset($data['nutritionC'])) $this->setNutritionC($data['nutritionC']);

//        if (isset($data['physicalActivity_d'])) $this->setPhysicalActivityD($data['physicalActivity_d']);
        if (isset($data['physicalActivityD'])) $this->setPhysicalActivityD($data['physicalActivityD']);

//        if (isset($data['physicalActivity_e'])) $this->setPhysicalActivityE($data['physicalActivity_e']);
        if (isset($data['physicalActivityE'])) $this->setPhysicalActivityE($data['physicalActivityE']);

//        if (isset($data['physicalActivity_f'])) $this->setPhysicalActivityF($data['physicalActivity_f']);
        if (isset($data['physicalActivityF'])) $this->setPhysicalActivityF($data['physicalActivityF']);

//        if (isset($data['preventiveBehavior_g'])) $this->setPreventiveBehaviorG($data['preventiveBehavior_g']);
        if (isset($data['preventiveBehaviorG'])) $this->setPreventiveBehaviorG($data['preventiveBehaviorG']);
        
//        if (isset($data['preventiveBehavior_h'])) $this->setPreventiveBehaviorH($data['preventiveBehavior_h']);
        if (isset($data['preventiveBehaviorH'])) $this->setPreventiveBehaviorH($data['preventiveBehaviorH']);
        
//        if (isset($data['preventiveBehavior_i'])) $this->setPreventiveBehaviorI($data['preventiveBehavior_i']);
        if (isset($data['preventiveBehaviorI'])) $this->setPreventiveBehaviorI($data['preventiveBehaviorI']);
        
//        if (isset($data['relationships_j'])) $this->setRelationshipsJ($data['relationships_j']);
        if (isset($data['relationshipsJ'])) $this->setRelationshipsJ($data['relationshipsJ']);

//        if (isset($data['relationships_k'])) $this->setRelationshipsK($data['relationships_k']);
        if (isset($data['relationshipsK'])) $this->setRelationshipsK($data['relationshipsK']);

//        if (isset($data['relationships_l'])) $this->setRelationshipsL($data['relationships_l']);
        if (isset($data['relationshipsL'])) $this->setRelationshipsL($data['relationshipsL']);

//        if (isset($data['stressManagementM'])) $this->setStressManagementM($data['stressManagementM']);
        if (isset($data['stressManagementM'])) $this->setStressManagementM($data['stressManagementM']);

//        if (isset($data['stressManagement_n'])) $this->setStressManagementN($data['stressManagement_n']);
        if (isset($data['stressManagementN'])) $this->setStressManagementN($data['stressManagementN']);

//        if (isset($data['stressManagement_o'])) $this->setStressManagementO($data['stressManagement_o']);
        if (isset($data['stressManagementO'])) $this->setStressManagementO($data['stressManagementO']);

    }
}
