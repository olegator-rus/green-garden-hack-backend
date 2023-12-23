<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Services\ActivityService;
use Illuminate\Support\Facades\Log;

class ActivityLogger
{

    // Флаг активации логгирования
    private $activate = true;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) : Response | JsonResponse
    {
        return $next($request);
    }

    public function terminate(Request $request) : void
    {
        try
        {
            // Если логер выключен, прерываем скрипт
            if($this->activate == false) return;
            $activityService = app(ActivityService::class);
            $activityService->createActivity($request);
        } catch(\Exception $e)
        {
            Log::error($e->getMessage());
        }
    }
}
