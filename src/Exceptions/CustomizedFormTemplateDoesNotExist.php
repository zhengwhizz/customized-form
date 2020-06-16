<?php

namespace Zhengwhizz\CustomizedForm\Exceptions;

use InvalidArgumentException;

class CustomizedFormTemplateDoesNotExist extends InvalidArgumentException
{
    public function __construct(string $message = "模板未找到")
    {
        parent::__construct($message);
    }
}
