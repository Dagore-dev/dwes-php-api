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

    public function get (string $id): array|false
    {
        $sql = 'SELECT * FROM tienda WHERE cod = :id';
        $query = $this->connection->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}