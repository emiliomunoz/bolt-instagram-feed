<?php

namespace Bolt\Extension\emiliomunoz\InstagramFeed;

use Bolt\Extension\SimpleExtension;
use Vinkla\Instagram\Instagram;
use Doctrine\Common\Cache\ApcuCache;

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
        $data = "";
        if($this->getConfig()["cache_enabled"]) {
            $cacheDriver = new ApcuCache();
            $data = $cacheDriver->fetch("instagramMedia");

            if (empty($data)) {
                $data = $this->getInstagramData($params);
                $cacheDriver->save("instagramMedia", $data, $this->getConfig()["cache_ttl"]);
            }
        }
        else {
            $data = $this->getInstagramData($params);
        };

        return $data;
    }

    private function getInstagramData($params){
        $accessToken = $this->getConfig()["access_token"];
        $instagram = new Instagram($accessToken);
        return $instagram->media($params);
    }
}
