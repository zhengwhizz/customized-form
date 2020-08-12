<?php

namespace Zhengwhizz\CustomizedForm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as CustomizedFormTemplateContract;
use Zhengwhizz\CustomizedForm\Exceptions\CustomizedFormTemplateDoesNotExist;

class CustomizedFormTemplate extends Model implements CustomizedFormTemplateContract
{
    protected $fillable = [
        'name',
        'content',
        'active',
    ];

    public function __construct()
    {
        $this->setTable(config('customized_form.table_names.template'));
    }

    public function forms(): HasMany
    {
        return $this->hasMany(
            config('customized_form.models.form'),
            'template_id'
        );
    }
    /**
     *
     * 查找所有类别下使用中的模板
     * @param [type] $options
     * @return Collection
     */
    public static function findAllUsing($options = []): Collection
    {
        $templateClass = app(CustomizedFormTemplateContract::class);
        $templates = $templateClass->selectRaw('distinct on (name) *')->where($options)->orderBy('name')->orderBy('id', 'desc')->get();
        return $templates;
    }

    /**
     * 按名称查找使用中的模板
     *
     * @param [type] $name
     * @param array $options
     * @return CustomizedFormTemplate
     */
    public static function findUsing($name, $options = []): CustomizedFormTemplateContract
    {
        $templateClass = app(CustomizedFormTemplateContract::class);
        $template = $templateClass->whereName($name)->where($options)->orderBy('created_at', 'desc')->first();
        if (!$template) {
            throw new CustomizedFormTemplateDoesNotExist();
        }
        return $template;
    }

}
