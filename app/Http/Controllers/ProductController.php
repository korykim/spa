<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Redis\RedisManager;
use Illuminate\Support\Facades\Redis;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            [
                'auth:sanctum',
                'scopes:*'
            ])->except(
            [
                'index', 'show'
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index(Request $request)
    {

        $Product = Product::all();

        $myuser=$request->user();
        $mytokens=$myuser->tokens;

        //$Authorization=$request->headers->get('Authorization');
        //[$id, $token] = explode('|',str_replace("Bearer ","",$Authorization), 2);
        //$mytoken=PersonalAccessToken::findtoken($token);

        //Auth 门面访问当前用户
//        Auth::guard('api')->user(); // 登录用户实例
//        Auth::guard('api')->check(); // 用户是否登录
//        Auth::guard('api')->id(); // 登录用户ID

        //$result=Redis::set('name','phpstorm');

        return response()->json(['success' => $Product,'user'=>$myuser], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
