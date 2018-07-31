<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 22/07/2018
 * Time: 16:40
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ItemsController extends Controller
{
    /**
     * @param $categoryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($categoryId)
    {
        return Response::json(Item::OfCategory($categoryId)->paginate(), 200);
    }

    /**
     * @param Request $request
     * @param $categoryId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $categoryId)
    {
        $this->validate($request, [
          "name"=> "required|unique:items",
          "description"=> "required|min:2",
        ]);

        $newAddedItem=$request->auth->addItem(new Item($request->all()), $categoryId);
        if (!$newAddedItem instanceof Item) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list could not be found."
                    ]],
                400
            );
            return $response;
        }

        return Response::json(
            ["message"=> "The shopping list item has been created successfully",
            "data"=>$newAddedItem],
            201
        );
    }

    /**
     * @param Request $request
     * @param $categoryId
     * @param $itemId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $categoryId, $itemId)
    {
        $category = $request->auth->categories()->find($categoryId);
        if (!$category instanceof Category) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list could not be found."
                    ]],
                400
            );
            return $response;
        }
        $item=$category->items()->find($itemId);
        if (!$item instanceof Item) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list item could not be found."
                    ]],
                400
            );
            return $response;
        }
        return Response::json($item, 200);
    }

    /**
     * @param Request $request
     * @param $categoryId
     * @param $itemId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $categoryId, $itemId)
    {
        $ExistingCategory = $request->auth->categories()->find($categoryId);
        if (!$ExistingCategory instanceof Category) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list could not be found."
                    ]],
                404
            );
            return $response;
        }

        $ExistingItem=$ExistingCategory->items()->find($itemId);
        if (!$ExistingItem instanceof Item) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list item could be found."
                    ]],
                404
            );
            return $response;
        }

        $ExistingItem->update($request->all());

        return Response::json(["message"=>"Item updated successfully","data"=>$ExistingItem], 200);
    }

    /**
     * @param Request $request
     * @param $categoryId
     * @param $itemId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $categoryId, $itemId)
    {
        $ExistingCategory = $request->auth->categories()->find($categoryId);
        if (!$ExistingCategory instanceof Category) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list could be found."
                    ]],
                400
            );
            return $response;
        }
        $item=$ExistingCategory->items()->find($itemId);
        if (!$item instanceof Item) {
            $response = Response::json(
                [
                    "error"=>[
                        "message" => "The shopping list item could be found."
                    ]],
                400
            );
            return $response;
        }
        $item->delete();
        return Response::json(["message"=>"Item deleted successfully"], 200);
    }
}
