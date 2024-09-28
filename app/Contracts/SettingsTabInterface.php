<?php

namespace App\Contracts;

interface SettingsTabInterface
{
    public static function tabName(): string;
    public static function tabSchema(): array;
    public static function tabOrder(): int;
}
