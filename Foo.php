<?php

/**
 * Class Foo
 */
class Foo
{
    private $bar;
    private $baz;
    private $qux;

    /**
     * Foo constructor.
     * @param $bar
     * @param $baz
     * @param $qux
     */
    function __construct($bar, $baz, $qux)
    {
        $this->bar = $bar;
        $this->baz = $baz;
        $this->qux = $qux;
    }
}
