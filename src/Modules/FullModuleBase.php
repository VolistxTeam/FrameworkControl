<?php

namespace Volistx\FrameworkControl\Modules;

use Volistx\FrameworkControl\Facades\Requests;

abstract class FullModuleBase extends PartialModuleBase
{
    public function Create(array $input)
    {
        $result = Requests::Post($this->baseUrl, $this->token, $input);

        if ($result->status_code == 200) {
            return $result->body;
        }

        return false;
    }

    public function Update($id, array $inputs)
    {
        $result = Requests::Put("$this->baseUrl/$id", $this->token, $inputs);

        if ($result->status_code == 200) {
            return $result->body;
        }

        return false;
    }

    public function Delete($id)
    {
        $result = Requests::Delete("$this->baseUrl/$id", $this->token);

        if ($result->status_code == 200) {
            return true;
        }

        return false;
    }
}
