<?php
namespace Zhengwhizz\CustomizedForm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as TemplateContract;

class CustomizedFormTemplateController extends Controller
{
    /**
     * 获取模板列表
     *
     * @param Request $request
     * @param TemplateContract $templateClass
     * @return void
     */
    public function index(Request $request, TemplateContract $templateClass)
    {
        $data = $templateClass->findAllUsing();

        if ($request->expectsJson()) {
            return JsonResource::collection($data);
        }
        return $data;
    }

    /**
     * 保存模板
     *
     * @param Request $request
     * @param TemplateContract $templateClass
     * @return void
     */
    public function store(Request $request, TemplateContract $templateClass)
    {
        $templateClass->fill($request->all())->save();
        return ['code' => true];
    }

    /**
     * 显示某一特定模板
     *
     * @param Request $request
     * @param TemplateContract $template
     * @return void
     */
    public function show(Request $request, TemplateContract $template)
    {
        dd($template, 222);
        $templateClass = app(TemplateContract::class);
        dd($templateClass);
        $templateClass->findOrFail($id);
    }

}
