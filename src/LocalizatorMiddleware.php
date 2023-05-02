<?php

namespace Idsb2b\Localization;

class LocalizatorMiddleware
{
    public function handle($request, \Closure $next)
    {
        Config::getInstance()->build(
            config('app.localizator.product_id'),
            config('app.localizator.redis_host'),
            config('app.localizator.redis_port'),
            5,
            config('app.localizator.url'),
            $request->header('locale'),
        );

        return $next($request);
    }
}