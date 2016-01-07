<?php

/*
 * This file is part of php-cache\cache-bundle package.
 *
 * (c) 2015-2015 Aaron Scherer <aequasi@gmail.com>, Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Cache\CacheBundle\Factory;

use Cache\Bridge\DoctrineCacheBridge;
use Cache\CacheBundle\Cache\FixedTaggingCachePool;
use Psr\Cache\CacheItemPoolInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class AnnotationFactory
{
    /**
     * @param CacheItemPoolInterface $pool
     * @param array                  $config
     *
     * @return DoctrineCacheBridge
     */
    public static function get(CacheItemPoolInterface $pool, $config)
    {
        if ($config['use_tagging']) {
            $pool = new FixedTaggingCachePool($pool, ['annotation']);
        }

        return new DoctrineCacheBridge($pool);
    }
}
