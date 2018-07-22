<?php
/**
 * Created by PhpStorm.
 * User: Gerard
 * Date: 18/06/2018
 * Time: 18:51
 */

namespace App\Services\Utils\Search;


use App\Color;
use App\DTO\Search\SearchCriteria;
use App\Patent;
use App\Pattern;
use App\Vehicle;

class BuildSearchCriteria
{
    //Buscamos todos los valores de BD
    const ALL_VALUES = '0';
    const MAX_VEHICLES_SHOW = 6;

    const DEFAULT_MIN_POWER = 60;
    const DEFAULT_MAX_POWER = 800;
    const DEFAULT_MIN_PRICE = 0;
    const DEFAULT_MAX_PRICE = 90000;

    public function buildDefault()
    {
        $searchCriteria = new SearchCriteria();
        //Listado necesario para el buscador y el menú superior de marcas.
        $searchCriteria->setPatentList(Patent::where('active', 1)->get());
        $searchCriteria->setPatternList(Pattern::where('active', 1)->get());
        $searchCriteria->setColorList(Color::where('active', 1)->get());

        $minPower = Vehicle::min('power') ??  self::DEFAULT_MIN_POWER;
        $searchCriteria->setMinCV($minPower);

        $maxPower = Vehicle::max('power') ??  self::DEFAULT_MAX_POWER;
        $searchCriteria->setMaxCV($maxPower);

        if ($minPower == $maxPower) {
            $searchCriteria->setMinCV(self::DEFAULT_MIN_POWER);
        }

        $minPrice = Vehicle::min('price') ??  self::DEFAULT_MIN_PRICE;
        $searchCriteria->setMinPrice($minPrice);

        $maxPrice = Vehicle::max('price') ??  self::DEFAULT_MAX_PRICE;
        $searchCriteria->setMaxPrice($maxPrice);

        if ($minPrice == $maxPrice) {
            $searchCriteria->setMinPrice(self::DEFAULT_MIN_PRICE);
        }

        $vehicleList = Vehicle::where('active', 1);

        $searchCriteria->setVehicleListPaginated($vehicleList->paginate(self::MAX_VEHICLES_SHOW));

        return $searchCriteria;
    }

    public function buildByValidatedSearchCriteriaRequest(array $validatedSearchCriteriaRequest)
    {
        $searchCriteria = new SearchCriteria();
        //Listado necesario para el buscador y el menú superior de marcas.
        $searchCriteria->setPatentList(Patent::where('active', 1)->get());
        $searchCriteria->setPatternList(Pattern::where('active', 1)->get());
        $searchCriteria->setColorList(Color::where('active', 1)->get());

        $vehicleList = Vehicle::where('active', 1);

        $patentList = collect();
        $patternList = collect();
        $colorList = collect();

        //Control if we search every record in DB.
        $patentAll = false;
        $patternAll = false;
        $colorAll = false;

        foreach ($validatedSearchCriteriaRequest as $param => $value) {
            if ($param == 'price-min') {
                $searchCriteria->setMinPrice($value);
            } else if ($param == 'price-max') {
                $searchCriteria->setMaxPrice($value);
            } else if ($param == 'power-min') {
                $searchCriteria->setMinCV($value);
            } else if ($param == 'power-max') {
                $searchCriteria->setMaxCV($value);
            } else {
                if ($param == 'patent') {
                    foreach ($value as $patentId) {
                        if (!$patentAll && $patentId != self::ALL_VALUES) {
                            $patentList->push($patentId);
                        } else {
                            $patentAll = true;
                        }
                    }
                } else if ($param == 'pattern') {
                    foreach ($value as $patternId) {
                        if (!$patternAll && $patternId != self::ALL_VALUES) {
                            $patternList->push($patternId);
                        } else {
                            $patternAll = true;
                        }
                    }
                } else if ($param == 'color') {
                    foreach ($value as $colorId) {
                        if (!$colorAll && $colorId != self::ALL_VALUES) {
                            $colorList->push($colorId);
                        } else {
                            $colorAll = true;
                        }
                    }
                }
            }
        }

        if ($patentList->isNotEmpty()) {
            $vehicleList->whereIn('patent_id', $patentList);
        }
//        if ($patternList->isNotEmpty()) {
//            $vehicleList->whereIn('pattern_id', $patternList);
//        }
        if ($colorList->isNotEmpty()) {
            $vehicleList->whereIn('color_id', $colorList);
        }

//        $searchCriteria->setVehicleList($vehicleList->get());
        $searchCriteria->setVehicleListPaginated($vehicleList->paginate(self::MAX_VEHICLES_SHOW));

        return $searchCriteria;
    }

}