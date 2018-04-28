<?php

namespace App\Entity\Perfil;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;


/**
 * LifestyleProfile
 *
 * @Entity
 * @Table(name="life_style_profile")
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
     * @Column(type="json_array", length=65535, nullable=true, options={"default":null})
     * @var array
     */
    private $nutrition;

    /**
     * @Column(type="json_array", length=65535, nullable=true, options={"default":null})
     * @var array
     */
    private $physical_activity;

    /**
     * @Column(type="json_array", length=65535, nullable=true, options={"default":null})
     * @var array
     */
    private $preventive_behavior;

    /**
     * @Column(type="json_array", length=65535, nullable=true, options={"default":null})
     * @var array
     */
    private $relationships;

    /**
     * @Column(type="json_array", length=65535, nullable=true, options={"default":null})
     * @var array
     */
    private $stress_management;

    /**
     * @param null|string $key
     * @return array
     */
    public function getNutrition($key = null)
    {
        if (!empty($key)) {
            return isset($this->nutrition[$key]) ? $this->nutrition[$key] : null;
        }

        return $this->nutrition;
    }

    /**
     * @param array $nutrition
     */
    public function setNutrition($nutrition)
    {
        $this->nutrition = $nutrition;
    }

    /**
     * @param null|string $key
     *
     * @return array
     */
    public function getPhysicalActivity($key = null)
    {
        if (!empty($key)) {
            return isset($this->physical_activity[$key]) ? $this->physical_activity[$key] : null;
        }

        return $this->physical_activity;
    }

    /**
     * @param array $physical_activity
     */
    public function setPhysicalActivity($physical_activity)
    {
        $this->physical_activity = $physical_activity;
    }

    /**
     * @param null|string $key
     *
     * @return array
     */
    public function getPreventiveBehavior($key = null)
    {
        if (!empty($key)) {
            return isset($this->preventive_behavior[$key]) ? $this->preventive_behavior[$key] : null;
        }

        return $this->preventive_behavior;
    }

    /**
     * @param array $preventive_behavior
     */
    public function setPreventiveBehavior($preventive_behavior)
    {
        $this->preventive_behavior = $preventive_behavior;
    }

    /**
     * @param null|string $key
     *
     * @return array
     */
    public function getRelationships($key = null)
    {
        if (!empty($key)) {
            return isset($this->relationships[$key]) ? $this->relationships[$key] : null;
        }

        return $this->relationships;
    }

    /**
     * @param array $relationships
     */
    public function setRelationships($relationships)
    {
        $this->relationships = $relationships;
    }

    /**
     * @param null|string $key
     *
     * @return array
     */
    public function getStressManagement($key = null)
    {
        if (!empty($key)) {
            return isset($this->stress_management[$key]) ? $this->stress_management[$key] : null;
        }

        return $this->stress_management;
    }

    /**
     * @param array $stress_management
     */
    public function setStressManagement($stress_management)
    {
        $this->stress_management = $stress_management;
    }
}