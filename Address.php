<?php

class Address
{
    private $city;
    private $street;
    private $country;
    private $nearestPoint;
    private $map;

    public function __construct($city, $street, $country, $nearestPoint = null, $map = null)
    {
        $this->city = $city;
        $this->street = $street;
        $this->country = $country;
        $this->nearestPoint = $nearestPoint;
        $this->map = $map;
    }
    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getNearestPoint()
    {
        return $this->nearestPoint;
    }

    public function getMap()
    {
        return $this->map;
    }
}
