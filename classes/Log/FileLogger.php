<?php

class FileLogger implements ILogger{
    protected $fh;
    protected $event;

    public function __construct($fh)
    {
        $this->fh = $fh;
    }

    public function write($event)
    {
        fputs($this->fh, $event);
        fclose($this->fh);
    }
}