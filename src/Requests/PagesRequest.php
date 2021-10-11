<?php

namespace Aircms\Requests;

use Aircms\RequestInterface;

class PagesRequest implements RequestInterface
{
    public function method(): string
    {
        return 'GET';
    }

    public function endpoint(array $data = []): string
    {
        return 'pages';
    }

    public function response($body): array
    {
        return $body;
    }
}
