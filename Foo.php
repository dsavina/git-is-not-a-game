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

    /**
     * @return bool
     */
    public function doSomething()
    {
        $this->doJackShit($this->bar, $this->baz);
        $this->doJackShit($this->baz, $this->qux);
        $this->doJackShit($this->qux, $this->bar);
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
