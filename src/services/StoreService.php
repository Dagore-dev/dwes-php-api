<?php

class StoreService extends Service
{

    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
    }

    public function getAll (): array
    {
        $sql = 'SELECT * FROM tienda';
        $query = $this->connection->query($sql);

        $data = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $row;
        }

        return $data;
    }
}