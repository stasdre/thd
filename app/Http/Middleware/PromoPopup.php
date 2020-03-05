<?php

namespace Thd\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Thd\User;

class PromoPopup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $coockVal = $request->cookie('dw-promo-count');
        $userId = Auth::id();
        $dataUser = '';
        $promo = [];

        if ($userId) {
            $dataUser = User::find($userId);
            if (isset($dataUser->id)) {
                $promo = $dataUser->whereHas('promos', function ($query) {
                    $query->where('id', 3);
                })->get();
            }
        }

        if (!count($promo)) {
            if (!$coockVal) {
                $response->cookie('dw-promo-count', 2,  0, '/');
            } else {
                $response->cookie('dw-promo-count', $coockVal + 1,  0, '/');
            }
        } else {
            $response->cookie('dw-promo-count', null,  -1, '/');
        }

        return $response;
    }
}
