<?php


namespace AmazonAdsApi;

use AmazonAdsApi\Url;
use \GuzzleHttp\Client;

class Auth
{
    public function getAuthUrl($country_code, $client_id, $redirect_uri, $state = 'State', $permission_scope = 'advertising::campaign_management')
    {
        $param = [
            'scope' => $permission_scope,
            'response_type' => 'code',
            'client_id' => $client_id,
            'state' => $state,
            'redirect_uri' => $redirect_uri,
        ];
        return Url::getUrl($country_code, 'auth_grant_url') . '?' . http_build_query($param);
    }

    public function getAccessTokenByCode($country_code, $client_id, $client_secret, $code, $redirect_uri)
    {
        $param = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirect_uri,
        ];
        $url = Url::getUrl($country_code, 'token_url');
        return (new Client())->request('POST', $url, ['form_params' => $param])->getBody()->getContents();
    }

    public function getAccessTokenByRefreshToken($country_code, $client_id, $client_secret, $refresh_token)
    {
        $param = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
        ];
        $url = Url::getUrl($country_code, 'token_url');
        return (new Client())->request('POST', $url, ['form_params' => $param])->getBody()->getContents();
    }
}