<?php

class Building
{
    public function __construct(
        private readonly string $type,
        private readonly string $colour
    )
    {
    }

    public function __toString(): string
    {
        return "<piece class='{$this->type}'></piece>\n";
    }
}