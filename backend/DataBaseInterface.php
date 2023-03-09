<?php
interface DatabaseInterface
{
    public function connect();
    public function disconnect();
    public function query(string $sql, array $params = []);
}