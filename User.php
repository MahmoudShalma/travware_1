<?php

class User
{
    private $name;
    private $address;
    private $age;
    private $gender;
    private $image;

    public function __construct($name, $address, $age = null, $gender = null, $image = null)
    {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->gender = $gender;
        $this->image = $image;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getIiage()
    {
        return $this->image;
    }

    public function notify($message)
    {
        /**
         * TODO
         * we need to add channel to send notification to user but not now
         */
    }
}
