<?php

class Database
{
    public function __construct (
        private string $host,
        private string $dbname,
        private string $user,
        private string $passwd
    ) {}

    public function getConnection (): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";

        return new PDO($dsn, $this->user, $this->passwd, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }
}