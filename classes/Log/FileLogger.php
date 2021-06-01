<?php

class FileLogger implements ILogger{
    protected $path;
    protected $event;
    protected $lines=[];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function write($event)
    {
        $fh = fopen($this->path, 'a');
        fputs($fh, $event);
        fclose($fh);
    }

    public function get($num):array
    {
        $fh = fopen($this->path, 'r');
        while($line = fgets($fh)){
            $this->lines[] = $line;
        };

        // dd($this->lines);
        // die;

        $newLines = [];
        for($i=0; $i<=$num; $i++){
            $newLines[]['event'] = array_pop($this->lines);
        }
        fclose($fh);
        return $newLines ?? [];
    }
}