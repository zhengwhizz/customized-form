<?php

namespace Zhengwhizz\CustomizedForm;

use Illuminate\Support\Collection;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedForm;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate;

class CustomizedFormRegistrar
{

    /** @var string */
    protected $templateClass;

    /** @var string */
    protected $roleClass;

    /** @var \Illuminate\Support\Collection */
    protected $templates;

    public function __construct()
    {
        $this->templateClass = config('customized_form.models.template');
        $this->formClass = config('customized_form.models.role');

    }

    public function getTemplates(array $params = []): Collection
    {
        if ($this->templates === null) {
            $this->templates = $this->cache->remember(self::$cacheKey, self::$cacheExpirationTime, function () {
                return $this->gettemplateClass()
                    ->with('roles')
                    ->get();
            });
        }

        $templates = clone $this->templates;

        foreach ($params as $attr => $value) {
            $templates = $templates->where($attr, $value);
        }

        return $templates;
    }

    public function getTemplateClass(): CustomizedFormTemplate
    {
        return app($this->templateClass);
    }

    public function setTemplateClass($templateClass)
    {
        $this->templateClass = $templateClass;

        return $this;
    }

    public function getFormClass(): CustomizedForm
    {
        return app($this->formClass);
    }

}
