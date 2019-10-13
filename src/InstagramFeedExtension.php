<?php

namespace Bolt\Extension\emiliomunoz\InstagramFeed;

use Bolt\Extension\SimpleExtension;

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
     * @param $accessToken
     * @return array
     */
    public function instagramTwigFunction($accessToken)
    {
        // Create a new instagram instance.
//        $instagram = new Instagram($accessToken);
//
//        // Fetch the media feed.
//        $data = $instagram->media(array("count"=>9));
//        return $data;
        return array("a", "b", "c");
    }
}
