<?php
/*
 * This file is part of Instagram.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);
namespace Vinkla\Instagram;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
/**
 * This is the instagram class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Instagram
{
    /**
     * The access token.
     *
     * @var string
     */
    protected $accessToken;
    /**
     * The guzzle http client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * Create a new instagram instance.
     *
     * @param \GuzzleHttp\ClientInterface $client
     *
     * @return void
     */
    public function __construct(string $accessToken, ClientInterface $client = null)
    {
        $this->accessToken = $accessToken;
        $this->client = $client ?: new Client();
    }

    /**
     * Fetch the media items.
     *
     * @param string $user
     *
     * @throws \Vinkla\Instagram\InstagramException
     *
     * @return array
     */
    public function media($params = null): array
    {
        $url = sprintf('https://api.instagram.com/v1/users/self/media/recent/?access_token=%s', $this->accessToken);

        $response = $this->client->get($url);
        $body = json_decode((string) $response->getBody());
        if (isset($body->error_message)) {
            throw new InstagramException($body->error_message);
        }
        if (isset($body->meta->error_message)) {
            throw new InstagramException($body->meta->error_message);
        }
        if ($response->getStatusCode() !== 200) {
            throw new InstagramException($response->getReasonPhrase());
        }
        return $body;
    }
}