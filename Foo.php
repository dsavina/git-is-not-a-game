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
        $this->definitelyDoSomething($this->quux);
        $this->doSomeShit($this->baz, 13);
        $this->doSomeShit($this->bar, $this->baz);
        return true;
    }

    /**
     * @param $arg
     */
    private function definitelyDoSomething($arg)
    {
        for ($i = 0; $i < $arg; $i++) {
            $this->doSomeShit($i * $this->bar, $this->baz);
        }
    }

    /**
     * @param $arg1
     * @param $arg2
     */
    private function doSomeShit($arg1, $arg2)
    {
    }
}
