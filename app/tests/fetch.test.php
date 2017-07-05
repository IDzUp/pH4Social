<?php

class Fetch_Test extends PHPUnit_Framework_TestCase
{

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function setup()
    {

        $this->fetch = new Fetch_Task;

    }

}
