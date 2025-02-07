<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 08.04.16
 * Time: 21:01
 */

namespace Madkom\NginxConfigurator\Config;

use Madkom\NginxConfigurator\Node\Context;
use Madkom\NginxConfigurator\Node\Param;

/**
 * Class Location
 * @package Madkom\NginxConfigurator\Config
 * @author  Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Location extends Context
{
    /**
     * Holds location match
     * @var Param
     */
    private Param $location;

    /**
     * Holds location match modifier
     * @var Param|null
     */
    private ?Param $match;

    /**
     * Location constructor.
     * @param Param      $location
     * @param Param|null $match
     * @param array      $directives
     */
    public function __construct(Param $location, Param $match = null, array $directives = [])
    {
        $this->location = $location;
        $this->match    = $match;
        parent::__construct('location', $directives);
    }

    public function __toString(): string
    {
        return sprintf(
            "{$this->name} %s %s {\n\t%s\n}\n",
            $this->match,
            $this->location,
            implode("\n\t", (array)$this->childNodes->getIterator())
        );
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return (string)$this->location;
    }

    /**
     * @return string
     */
    public function getMatch(): string
    {
        return (string)$this->match;
    }
}
