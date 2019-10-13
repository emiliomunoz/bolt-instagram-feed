<?php

namespace Bolt\Extension\emiliomunoz\InstagramFeed;

use Bolt\Extension\SimpleExtension;
use Vinkla\Instagram\Instagram;

/**
 * InstagramFeed extension class.
 *
 * @author Emilio Muñoz Monge <emiliomunozonge@gmail.com>
 */
class InstagramFeedExtension extends SimpleExtension
{
    /**
     * @return array
     */
    protected function registerTwigFunctions()
    {
        return [
            'instagram_feed' => 'instagramTwigFunction'
        ];
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return array
     */
    public function instagramTwigFunction(string $accessToken, array $params = null)
    {
        // Create a new instagram instance.
        $instagram = new Instagram($accessToken);
//
//        // Fetch the media feed.
        $data = $instagram->media($params);
        return $data;
    }
}
