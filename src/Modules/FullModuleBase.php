<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

abstract class FullModuleBase extends PartialModuleBase
{
    public function Create(array $input)
    {
        return Requests::Post($this->baseUrl, $this->token, $input);
    }

    public function Update($id, array $inputs)
    {
        return Requests::Put("$this->baseUrl/$id", $this->token, $inputs);
    }

    public function Delete($id)
    {
        return Requests::Delete("$this->baseUrl/$id", $this->token);
    }
}