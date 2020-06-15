<?php
namespace Zhengwhizz\CustomizedForm\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as TemplateContract;

class CustomizedFormTemplateController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(Request $request,)
    {

    }

    public function show(Request $request, TemplateContract $template)
    {
        // $templateClass = app(TemplateContract::class);
    }

}
