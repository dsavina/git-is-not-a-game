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
        $this->doJackShit($this->bar, $this->baz);
        $this->doJackShit($this->baz, $this->quux);
        $this->doJackShit($this->quux, $this->bar);
        return true;
    }

    /**
     * @param $arg1
     * @param $arg2
     */
    private function doJackShit($arg1, $arg2)
    {
        // I will not do anything, MOM!
    }
}
