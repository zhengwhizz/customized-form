<?php
namespace Zhengwhizz\CustomizedForm\Services;

use Zhengwhizz\CustomizedForm\Contracts\CustomizedForm as FormContract;

class CustomizedFormService
{
    public function show(FormContract $form)
    {
        return $form;
    }

}
