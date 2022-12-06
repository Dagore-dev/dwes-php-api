<?php

abstract class Controller
{
    protected Service $service;
    abstract public function __construct (Service $service);
    abstract public function processRequest (string $method, ?string $id): void;
    abstract protected function processResourceRequest (string $method, string $id): void;
    abstract protected function processCollectionRequest(string $method): void;
    abstract protected function getValidationErrors (array $data, bool $is_new = true): array;
}