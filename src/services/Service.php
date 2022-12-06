<?php

abstract class Service
{
    protected PDO $connection;
    abstract public function __construct (Database $database);
}