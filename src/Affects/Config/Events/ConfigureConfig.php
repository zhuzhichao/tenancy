<?php

/*
 * This file is part of the tenancy/tenancy package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://laravel-tenancy.com
 * @see https://github.com/tenancy
 */

namespace Tenancy\Affects\Config\Events;

use Illuminate\Contracts\Config\Repository;
use Tenancy\Identification\Events\Switched;

class ConfigureConfig
{
    /**
     * @var Switched
     */
    public $event;
    /**
     * @var Repository
     */
    public $config;

    public function __construct(Switched $event, Repository $config)
    {
        $this->event = $event;
        $this->config = $config;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->config, $name], $arguments);
    }
}
