<?php

namespace App\Entity;

use App\Enum\AvailableTimeType;
use App\Enum\KindType;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * User
 *
 * @Entity
 * @Table(name="user")
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 */
class User
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned": true})
     * @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $name;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $kind;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    private $birth_date;

    /**
     * @Column(type="float")
     * @var double
     */
    private $weight;

    /**
     * @Column(type="float")
     * @var double
     */
    private $height;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $available_time;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $login;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $email;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $password;


    /**
     * @var int
     */
    private $life_style_profile;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param bool $as_enum
     *
     * @return string|KindType
     */
    public function getKind($as_enum = false)
    {
        if ($as_enum) {
            return new KindType($this->kind);
        }

        return $this->kind;
    }

    /**
     * @param |KindType $media_type
     */
    public function setKind($kind_type)
    {
        if ($kind_type instanceof KindType) {
            $this->kind = $kind_type->getValue();

            return;
        }

        if (!KindType::isValid($kind_type)) {
            throw new \UnexpectedValueException('Invalid kind type');
        }

        $this->kind = $kind_type;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return DateTime
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param DateTime $birth_date
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param bool $as_enum
     *
     * @return string|KindType
     */
    public function getAvailableTime($as_enum = false)
    {
        if ($as_enum) {
            return new KindType($this->kind);
        }

        return $this->kind;
    }

    /**
     * @param AvailableTimeType $available_time
     */
    public function setAvailableTime($available_time)
    {
        if ($available_time instanceof AvailableTimeType) {
            $this->available_time = $available_time->getValue();

            return;
        }

        if (!AvailableTimeType::isValid($available_time)) {
            throw new \UnexpectedValueException('Invalid avaliable time type');
        }

        $this->available_time = $available_time;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getLifestyleprofile()
    {
        return $this->life_style_profile;
    }

    /**
     * @param LifestyleProfile $life_style_profile
     */
    public function setLifestyleprofile($life_style_profile)
    {
        $this->life_style_profile = $life_style_profile;
    }

    /**
     * @param array $data
     */
    public function populate($data)
    {
        if (isset($data['name'])) $this->setName($data['name']);
        if (isset($data['kind'])) $this->setKind($data['kind']);
        if (isset($data['image'])) $this->setImage($data['image']);
        if (isset($data['birth_date'])) $this->setBirthDate(new DateTime($data['birth_date']));
        if (isset($data['weight'])) $this->setWeight($data['weight']);
        if (isset($data['height'])) $this->setHeight($data['height']);
        if (isset($data['available_time'])) $this->setAvailableTime($data['available_time']);
        if (isset($data['login'])) $this->setLogin($data['login']);
        if (isset($data['password'])) $this->setPassword($data['password']);
        if (isset($data['life_style_profile'])) $this->setLifestyleprofile($data['life_style_profile']);
    }
}