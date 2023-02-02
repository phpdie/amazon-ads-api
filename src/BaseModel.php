<?php

namespace AmazonAdsApi;

use AmazonAdsApi\AdsRequest;

class BaseModel
{
    protected AdsRequest $instance;

    public function __construct(AdsRequest $instance)
    {
        $this->instance = $instance;
    }
}