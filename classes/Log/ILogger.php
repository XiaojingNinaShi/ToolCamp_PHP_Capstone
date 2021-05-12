<?php
/**
 * ILogger Interface
 * Defines expected behaviour for logger files...
 * they should able to write a log line.
 */

// namespace App\Lib;

interface ILogger
{

	public function write($event);

}