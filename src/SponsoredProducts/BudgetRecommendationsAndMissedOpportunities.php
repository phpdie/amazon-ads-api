<?php

namespace AmazonAdsApi\SponsoredProducts;

use AmazonAdsApi\BaseModel;

class BudgetRecommendationsAndMissedOpportunities extends BaseModel
{
    /** https://advertising.amazon.com/API/docs/en-us/sponsored-products/3-0/openapi/prod#/Budget%20recommendations%20and%20missed%20opportunities/getBudgetRecommendations
     * @param array $body
     * @return mixed
     */
    public function index(array $body)
    {
        $path = '/sp/campaigns/budgetRecommendations';
        $headers = [
            'Amazon-Advertising-API-Scope' => $this->instance->getProfileId(),
            'Content-Type' => 'application/vnd.budgetrecommendation.v3+json',
            'Accept' => 'application/vnd.budgetrecommendation.v3+json',
        ];
        return $this->instance->sendRequest($path, [], $body, 'POST', $headers);
    }
}