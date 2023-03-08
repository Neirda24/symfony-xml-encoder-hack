<?php

declare(strict_types=1);

namespace Symfony\Component\Serializer\Encoder;

class OverridePregMatch
{
    public static bool $enabled = false;
}

function preg_match(string $pattern, string $subject, array &$matches = null, int $flags = 0, int $offset = 0): int|false
{
    if (
        true === OverridePregMatch::$enabled
        && '/[<>&]/' === $pattern
    ) {
        return false;
    }

    return \preg_match($pattern, $subject, $matches, $flags, $offset);
}
