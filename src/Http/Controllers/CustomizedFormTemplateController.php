<?php
namespace Zhengwhizz\CustomizedForm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as TemplateContract;
use Zhengwhizz\CustomizedForm\Services\CustomizedFormTemplateService;

class CustomizedFormTemplateController extends Controller
{
    public function index(Request $request, TemplateContract $templateClass)
    {
        $keywords = $request->keywords;

        $builder = $templateClass->where('active', true)->when($keywords, function ($query) use ($keywords) {
            $query->where('name', 'like', "%${keywords}%");
        });
        if ($perPage = $request->per_page) {
            $data = $builder->paginate($perPage);
        } else {
            $data = $builder->get();
        }
        if ($request->expectsJson()) {
            return JsonResource::collection($data);
        }
        return $data;
    }

    public function store(Request $request, CustomizedFormTemplateService $service)
    {
        $service->save($request->all(), ['id' => $request->id]);
        return ['code' => true];
    }

    public function show(Request $request, TemplateContract $template)
    {
        dd($template, 222);
        $templateClass = app(TemplateContract::class);
        dd($templateClass);
        $templateClass->findOrFail($id);
    }

}
