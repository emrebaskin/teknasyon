<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @param  Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $categories = Category::query()
            ->orderByDesc('id')
            ->paginate($request->limit ?? 10);

        return Response::success($categories);

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

        try {

            $categories = Category::query()
                ->findOrFail($id);

        } catch (\Exception $e) {

            return Response::fail(
                ErrorCodes::CATEGORY_NOT_FOUND,
                ErrorCodes::CATEGORY_NOT_FOUND_MESSAGE
            );

        }

        return Response::success($categories);

    }

}
