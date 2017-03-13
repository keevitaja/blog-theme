<?php

namespace Blog\Http\Controllers;

use Blog\Route;

class RouteController extends Controller
{
    /**
     * Route request to its handler
     *
     * @param string $uri
     * @param \Blog\Route $route
     *
     * @return Illuminate\Http\Response
     */
    public function __invoke($uri, Route $route)
    {
        $route = $route->where('uri', $uri)->first();

        if (is_null($route)) abort(404);

        return app($route->type)->handle($route->routable_id);
    }
}
