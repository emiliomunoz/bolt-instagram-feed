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
     * @param array $params
     * @return array
     */
    public function instagramTwigFunction(array $params = null)
    {
        $accessToken = $this->getConfig()["access_token"];
        $instagram = new Instagram($accessToken);

        $data = $instagram->media($params);
        return $data;
    }
}
