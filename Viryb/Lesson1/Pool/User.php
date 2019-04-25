<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 31.10.17
 * Time: 20:54
 */

class User
{
    /**
     * @var
     */
    protected $firstName;

    /**
     * @var
     */
    protected $lastName;

    /**
     * @var
     */
    protected $job;

    /**
     * @var
     */
    protected $gender;

    /**
     * Set first name
     * @param $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set last name
     * @param $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;

    }

    /**
     * Set job
     * @param $job
     *
     * @return $this
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Set gender
     * @param $gender
     *
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get first name
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get last name
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get job
     *
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Get gender
     *
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get information about user
     *
     * @return string
     */
    public function getInfo()
    {
        return "{$this->getFirstName()} {$this->getLastName()} 
        {$this->getJob()} {$this->getGender()}";
    }
}
