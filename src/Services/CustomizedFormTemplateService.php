<?php
namespace Zhengwhizz\CustomizedForm\Services;

use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as TemplateContract;

class CustomizedFormTemplateService
{
    public function save(array $attributes = [], array $options = [])
    {
        $templateClass = app(TemplateContract::class);

        return \DB::transaction(function () use ($templateClass, $attributes, $options) {
            $templateClass->update(['active' => false], $options);
            $templateClass->fill($attributes)->save();
        });
    }
}
