<?php

class Building
{
    public function __construct(
        private readonly int    $id,
        private readonly string $type,
        private readonly string $colour
    )
    {
    }

    public function __toString(): string
    {
        return "<piece class='{$this->type} {$this->colour}'>{$this->id}</piece>\n";
    }
}