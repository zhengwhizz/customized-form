<?php

namespace Zhengwhizz\CustomizedForm\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

interface CustomizedFormTemplate
{
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forms(): HasMany;

    /**
     * 查找所有使用中的模板
     *
     * @param array $options 额外查询参数
     * @return Collection
     */
    public static function findAllUsing($options = []): Collection;

    /**
     * 根据模板名称查找使用中的模版
     *
     * @param string $name 模版名称
     * @param array $options 额外查询参数
     * @return CustomizedFormTemplate
     */
    public static function findUsing($name, $options = []): self;

}
