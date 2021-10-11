<?php

namespace Aircms\Requests;

use Aircms\RequestInterface;

class PageFieldsRequest implements RequestInterface
{
    public function __construct(string $pageName, array $params = [])
    {
        $this->pageName = $pageName;
        $this->params = $params;
    }

    public function params()
    {
        return $this->params;
    }

    public function method(): string
    {
        return 'GET';
    }

    public function endpoint(): string
    {
        return 'pages/' . $this->pageName . '/fields';
    }

    public function response($body): array
    {
        return $body;
    }
}
