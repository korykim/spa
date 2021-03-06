<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;


use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AuthMutator
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
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
        $credentials = Arr::only($args, ['users', 'password']);



        $user = User::where('name', $credentials['users'])->orwhere('email', $credentials['users'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return null;
        } else {
//            $token = Str::random(60);
//            $user->api_token = $token;
//            $user->save();
//            return $token;
            return $user->createToken($user->name, ['*'])->plainTextToken;
        }

    }
}
