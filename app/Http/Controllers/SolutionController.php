<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Services
use App\Services\ItemCountService;
use App\Services\JsonFormatterService;
use App\Services\TemplateService;

class SolutionController extends Controller
{
    protected $itemCountService;
    protected $jsonFormatterService;

    public function __construct(ItemCountService $itemCountService, JsonFormatterService $jsonFormatterService)
    {
        $this->itemCountService = $itemCountService;
        $this->jsonFormatterService = $jsonFormatterService;
    }
    
    public function secondBuyerEloquent()
    {
        $data = $this->itemCountService->enlistBuyersOnItemsEloquent();
        $data = $data->sortByDesc('total_items_taken');
        $data = $data[1];

        return view('solution', compact('data'));
    }

    public function secondBuyerNoEloquent()
    {
        $data = $this->itemCountService->enlistBuyersOnItemsNoEloquent();
        $data = $data->sortByDesc('total_items_taken');
        $data = $data[1];

        return view('solution', compact('data'));
    }

    public function purchaseListEloquent()
    {        
        $data = $this->itemCountService->enlistBuyersOnItemsEloquent();
        $data = $data->sortBy('total_items_taken');

        return view('solution', compact('data'));
    }

    public function purchaseListNoEloquent()
    {
        $data = $this->itemCountService->enlistBuyersOnItemsNoEloquent();
        $data = $data->sortBy('total_items_taken');

        return view('solution', compact('data'));
    }

    public function recordTransfer()
    {
        $insertionStatus = $this->jsonFormatterService->bulkDbInsertionJson();
        
        return view('solution', compact('insertionStatus'));
    }

    public function defineCallbackJs(TemplateService $templateService)
    {
        $data = $templateService->callbackCode();
        
        return view('solution', compact('data'));
    }

    public function sortJs(TemplateService $templateService)
    {
        $data = $templateService->sortJsCode();
        
        return view('solution', compact('data'));
    }

    public function foreachJs(TemplateService $templateService)
    {
        $data = $templateService->foreachJsCode();
        
        return view('solution', compact('data'));
    }

    public function filterJs(TemplateService $templateService)
    {
        $data = $templateService->filterJsCode();
        
        return view('solution', compact('data'));
    }

    public function mapJs(TemplateService $templateService)
    {
        $data = $templateService->mapJsCode();
        
        return view('solution', compact('data'));
    }

    public function reduceJs(TemplateService $templateService)
    {
        $data = $templateService->reduceJsCode();
        
        return view('solution', compact('data'));
    }

    public function animation()
    {
        return view('solution');
    }

    public function imFunny(TemplateService $templateService)
    {
        $data = $templateService->imFunnyAnswer();

        return view('solution', compact('data'));
    }

}
