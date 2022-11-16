<?php

class Building
{
    public function __construct(
        private readonly string $type,
        private readonly string $colour
    )
    {
    }
}