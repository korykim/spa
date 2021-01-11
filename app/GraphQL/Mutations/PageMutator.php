<?php

namespace App\GraphQL\Mutations;
use App\Models\Page;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;


class PageMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue
     * @param  mixed[]  $args
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context
     * @return mixed
     */
    public function create($rootValue, array $args, GraphQLContext $context)
    {
        $page = new Page($args);
        $context->user()->pages()->save($page);

        return $page;
    }

}
