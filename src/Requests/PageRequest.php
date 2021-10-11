<?php

namespace Aircms\Requests;

use Aircms\RequestInterface;

class PageRequest implements RequestInterface
{
    public function __construct(string $pageName)
    {
        $this->pageName = $pageName;
    }

    public function method(): string
    {
        return 'GET';
    }

    public function endpoint(): string
    {
        return 'pages/' . $this->pageName;
    }

    public function response($body): array
    {
        return $body;
    }
}
