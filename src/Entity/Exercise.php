<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use App\Enum\MediaType;

/**
 * Exercise
 *
 * @Entity(repositoryClass="App\Repository\ExerciseRepository")
 * @Table(name="exercises")
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 */
class Exercise
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
    protected $title;

    /**
     * @Column(type="text", nullable=true)
     * @var string
     */
    protected $description;

    /**
     * @Column(type="integer")
     * @var int
     */
    protected $amount_executed;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $featured_image_url;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $media_url;

    /**
     * @Column(type="string", length=50)
     * @var string
     */
    protected $media_type;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $question_one;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $weight_question_one;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $question_two;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $weight_question_two;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $question_three;

    /**
     * @Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $weight_question_three;

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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getAmountExecuted()
    {
        return $this->amount_executed;
    }

    /**
     * @param int $amount_executed
     */
    public function setAmountExecuted($amount_executed)
    {
        $this->amount_executed = $amount_executed;
    }

    /**
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->media_url;
    }

    /**
     * @param string $media_url
     */
    public function setMediaUrl($media_url)
    {
        $this->media_url = $media_url;
    }

    /**
     * @param bool $as_enum
     *
     * @return string|MediaType
     */
    public function getMediaType($as_enum = false)
    {
        if ($as_enum) {
            return new MediaType($this->media_type);
        }

        return $this->media_type;
    }

    /**
     * @param |MediaType $media_type
     */
    public function setMediaType($media_type)
    {
        if ($media_type instanceof MediaType) {
            $this->media_type = $media_type->getValue();

            return;
        }

        if (!MediaType::isValid($media_type)) {
            throw new \UnexpectedValueException('Invalid media type');
        }

        $this->media_type = $media_type;
    }

    /**
     * @return string
     */
    public function getQuestionOne()
    {
        return $this->question_one;
    }

    /**
     * @param string $question_one
     */
    public function setQuestionOne(string $question_one): void
    {
        $this->question_one = $question_one;
    }

    /**
     * @return string
     */
    public function getWeightQuestionOne()
    {
        return $this->weight_question_one;
    }

    /**
     * @param string $weight_question_one
     */
    public function setWeightQuestionOne(string $weight_question_one): void
    {
        $this->weight_question_one = $weight_question_one;
    }

    /**
     * @return string
     */
    public function getQuestionTwo()
    {
        return $this->question_two;
    }

    /**
     * @param string $question_two
     */
    public function setQuestionTwo(string $question_two): void
    {
        $this->question_two = $question_two;
    }

    /**
     * @return string
     */
    public function getWeightQuestionTwo()
    {
        return $this->weight_question_two;
    }

    /**
     * @param string $weight_question_two
     */
    public function setWeightQuestionTwo(string $weight_question_two): void
    {
        $this->weight_question_two = $weight_question_two;
    }

    /**
     * @return string
     */
    public function getQuestionThree()
    {
        return $this->question_three;
    }

    /**
     * @param string $question_three
     */
    public function setQuestionThree(string $question_three): void
    {
        $this->question_three = $question_three;
    }

    /**
     * @return string
     */
    public function getWeightQuestionThree()
    {
        return $this->weight_question_three;
    }

    /**
     * @param string $weight_question_three
     */
    public function setWeightQuestionThree(string $weight_question_three): void
    {
        $this->weight_question_three = $weight_question_three;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFeaturedImageUrl(): string
    {
        return $this->featured_image_url;
    }

    /**
     * @param string $featured_image_url
     */
    public function setFeaturedImageUrl(string $featured_image_url): void
    {
        $this->featured_image_url = $featured_image_url;
    }
}