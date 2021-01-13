<?php

namespace App\GraphQL\Mutations;

use Auth;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

//        $guard = Auth::guard(config('sanctum.guard', 'web'));
//        /** @var \App\Models\User|null $user */
//        $user = $guard->user();
////        $guard->logout();
////
////        if ($user->tokens()->delete() == 1) {
////            return "Bye";
////        } else {
////            return "Hello";
////        }
//
//        return $user;
    }

    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`. 通常包含从父字段返回的结果。在本例中，它始终为“null”`
     * @param mixed[] $args The arguments that were passed into the field. 传入字段的参数。
     * @param \Nuwave\Lighthouse\Support\Contracts\GraphQLContext $context Arbitrary data that is shared between all fields of a single query. 在单个查询的所有字段之间共享的任意数据。
     * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more. 有关查询本身的信息，如执行状态、字段名、从根目录到字段的路径等。
     * @return mixed
     */
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $guard = Auth::guard(config('sanctum.guard', 'web'));
        $user = $guard->user();
        $guard->logout();
        return $user;
        //$guard = Auth::guard(config('sanctum.guard', 'web'));
//        $guard =Auth::guard('api')->user();
//
//        $user = $guard->user();
//        if ($user->tokens()->delete() == 1) {
//            return "Bye";
//        } else {
//            return "Hello";
//        }
    }

}
