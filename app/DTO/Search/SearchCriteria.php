<?php
/**
 * Created by PhpStorm.
 * User: Gerard
 * Date: 18/06/2018
 * Time: 18:36
 */

namespace App\DTO\Search;


use Illuminate\Support\Collection;

class SearchCriteria
{
    public $patentList;
    public $patternList;
    public $colorList;
    public $vehicleListPaginated;
    public $maxCV;
    public $minCV;
    public $maxPrice;
    public $minPrice;

    public function __construct()
    {
        $this->patentList = collect();
        $this->patternList = collect();
        $this->colorList = collect();
        $this->vehicleListPaginated = collect();
        $this->minCV = 70;
        $this->maxCV = 800;
        $this->minPrice = 0;
        $this->minPrice = 300000;
    }

    /**
     * @return Collection
     */
    public function getPatentList(): Collection
    {
        return $this->patentList;
    }

    /**
     * @param Collection $patentList
     * @return SearchCriteria
     */
    public function setPatentList(Collection $patentList): SearchCriteria
    {
        $this->patentList = $patentList;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getPatternList(): Collection
    {
        return $this->patternList;
    }

    /**
     * @param Collection $patternList
     * @return SearchCriteria
     */
    public function setPatternList(Collection $patternList): SearchCriteria
    {
        $this->patternList = $patternList;
        return $this;
    }
    /**
     * @return Collection
     */
    public function getVehicleListPaginated()
    {
        return $this->vehicleListPaginated;
    }

    /**
     * @param $vehicleListPaginated
     * @return SearchCriteria
     */
    public function setVehicleListPaginated($vehicleListPaginated): SearchCriteria
    {
        $this->vehicleListPaginated = $vehicleListPaginated;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getColorList(): Collection
    {
        return $this->colorList;
    }

    /**
     * @param Collection $colorList
     * @return SearchCriteria
     */
    public function setColorList(Collection $colorList): SearchCriteria
    {
        $this->colorList = $colorList;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCV(): int
    {
        return $this->maxCV;
    }

    /**
     * @param int $maxCV
     * @return SearchCriteria
     */
    public function setMaxCV(int $maxCV): SearchCriteria
    {
        $this->maxCV = $maxCV;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinCV(): int
    {
        return $this->minCV;
    }

    /**
     * @param int $minCV
     * @return SearchCriteria
     */
    public function setMinCV(int $minCV): SearchCriteria
    {
        $this->minCV = $minCV;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->maxPrice;
    }

    /**
     * @param int $maxPrice
     * @return SearchCriteria
     */
    public function setMaxPrice(int $maxPrice): SearchCriteria
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinPrice(): int
    {
        return $this->minPrice;
    }

    /**
     * @param int $minPrice
     * @return SearchCriteria
     */
    public function setMinPrice(int $minPrice): SearchCriteria
    {
        $this->minPrice = $minPrice;
        return $this;
    }
}