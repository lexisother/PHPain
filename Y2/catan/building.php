<?php

class Building
{
    public function __construct(
        private int             $id,
        private readonly string $type,
        private readonly string $colour
    )
    {
    }

    public function __toString(): string
    {
        if ($this->colour == "" || ($this->type == "village")) {
            if ($this->type !== "X") {
                return "<piece class='{$this->type} {$this->colour}' onclick='document.location.href = `?{$this->type}={$this->id}`'>{$this->id}</piece>\n";
            }
        }
        return "<piece class='{$this->type} {$this->colour}'>{$this->id}</piece>\n";
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getColour(): string
    {
        return $this->colour;
    }
}