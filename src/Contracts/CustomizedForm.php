<?php

namespace Zhengwhizz\CustomizedForm\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface CustomizedForm
{

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template(): BelongsTo;

}
