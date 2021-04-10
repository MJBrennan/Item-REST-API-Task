<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Log;

/**
 * Managing API Items
 */
class ItemController extends Controller
{
    /**
     * Get all items
     * @return json $respose
     */
    public function showAllItems()
    {
        $respose = (!Item::all()->isEmpty()) ? Item::all() : ['results' => 'None'];
        return response()->json($respose);
    }

    /**
     * Get individual item via ID 
     * @param  int $id
     * @return json $response
     */
    public function showIndividualItems($id)
    {
        $response = (Item::find($id) !== null) ? Item::find($id) : ['results' => 'None'];
        return response()->json($response);
    }

    /**
     * Create new item
     * @param  Request $request
     * @return json $response
     */
    public function insertItem(Request $request)
    {
        $this->validate($request, [
            'file_name' => 'required',
            'media_type' => 'required|in:jpg,png,tif,gif,mov,mp4,wmv,avi'
        ]);
        try {
            $author = Item::create($request->all());
            Log::info("New Item Inserted");
            return response()->json(["result" => "Item Added"]);
        } catch (QueryException $e) {
            Log::critical("An error occuured creating an item: " . $e);
            return response()->json(["error" => "sorry a problem has occured"]);
        }
    }

    /**
     * Update item
     * @param  int $id
     * @param  Request $request
     * @return json $response
     */
    public function updateItem($id, Request $request)
    {
        $this->validate($request, [
            'file_name' => 'required',
            'media_type' => 'required|in:jpg,png,tif,gif,mov,mp4,wmv,avi'
        ]);
        try {
            $find = Item::find($id);
            if ($find ==! null) {
                $find->update($request->all());
                $response = 'Item Updated: ' . $id;
            } else {
                $response = 'ID not found: ' . $id;
            }
            return response()->json(["result" => $response], 201);
        } catch (QueryException $e) {
            Log::critical("An error occuured updating an item: " . $e);
            return response()->json(["error" => "sorry a problem has occured"]);
        }
    }

    /**
     * Delete item
     * @param  int $id
     * @param  Request $request
     * @return json $response
     */
    public function deleteItem($id, Request $request)
    {
        try {
            $find = Item::find($id);
            if ($find ==! null) {
                $find->delete();
                $response = 'Item Deleted: ' . $id;
            } else {
                $response = 'ID not found: ' . $id;
            }
            return response()->json(["result" => $response], 200);
        } catch (QueryException $e) {
            Log::error("An error occuured deleting an item: " . $e);
            return response()->json(["error" => "sorry a problem has occured"]);
        }
    }
}