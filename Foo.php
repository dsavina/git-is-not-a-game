<?php

/**
 * Class Foo
 */
class Foo
{
    private $bar;
    private $baz;
    private $quux;

    /**
     * Foo constructor.
     * @param $bar
     * @param $baz
     * @param $quux
     */
    function __construct($bar, $baz, $quux)
    {
        $this->bar = $bar;
        $this->baz = $baz;
        $this->quux = $quux;
    }

    /**
     * @return bool
     */
    public function doSomething()
    {
        $this->doSomeShit($this->bar, 12);
        $this->doSomeShit($this->baz, $this->quux);
        $this->doSomeShit($this->quux, $this->bar);
        return true;
    }

    /**
     * @param $arg1
     * @param $arg2
     */
    private function doSomeShit($arg1, $arg2)
    {
        // TODO: do some shit
    }
}
