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
        $this->doJackShit($this->baz, 13);
        $this->doJackShit($this->bar, $this->baz);
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
