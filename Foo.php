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
        for ($i = 0; $i < $this->qux; $i++) {
            $this->doSomeShit($i * $this->bar, $this->baz);
        }
        $this->doSomeShit($this->baz, 13);
        $this->doSomeShit($this->bar, $this->baz);
        return true;
    }

    /**
     * @param $arg1
     * @param $arg2
     */
    private function doSomeShit($arg1, $arg2)
    {
    }
}
