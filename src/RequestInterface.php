<?php

namespace Aircms;

interface RequestInterface
{
    public function method(): string;

    public function endpoint(): string;

    public function response($body): array;
}
