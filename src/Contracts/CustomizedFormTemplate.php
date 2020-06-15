<?php

namespace Zhengwhizz\CustomizedForm\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface CustomizedFormTemplate
{
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forms(): HasMany;

}
