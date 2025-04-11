<?php

namespace App\Services;

class MealService
{
    protected $baseUrl = 'https://www.themealdb.com/api/json/v1/1/';

    /**
     * Get meals by search term
     */
    public function searchMeals($term = '')
    {
        $url = $this->baseUrl . 'search.php?s=' . urlencode($term);
        return $this->makeRequest($url);
    }

    /**
     * Get meal categories
     */
    public function getCategories()
    {
        $url = $this->baseUrl . 'categories.php';
        return $this->makeRequest($url);
    }

    /**
     * Get areas (cuisines)
     */
    public function getAreas()
    {
        $url = $this->baseUrl . 'list.php?a=list';
        return $this->makeRequest($url);
    }

    /**
     * Filter meals by category
     */
    public function filterByCategory($category)
    {
        $url = $this->baseUrl . 'filter.php?c=' . urlencode(is_array($category) ? implode(',', $category) : $category);
        return $this->makeRequest($url);
    }

    /**
     * Filter meals by area
     */
    public function filterByArea($area)
    {
        $url = $this->baseUrl . 'filter.php?a=' . urlencode(is_array($area) ? implode(',', $area) : $area);
        return $this->makeRequest($url);
    }

    /**
     * Make API request
     */
    protected function makeRequest($url)
    {
        try {
            $response = file_get_contents($url);
            
            if ($response === false) {
                return ['success' => false, 'error' => 'Failed to connect to API'];
            }
            
            $data = json_decode($response, true);
            return ['success' => true, 'data' => $data];
            
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}