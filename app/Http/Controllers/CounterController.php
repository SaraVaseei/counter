<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CounterController extends Controller
{

    /**
     * Load main template using cached value on Redis
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function template()
    {

        if (!Redis::exists('value')) {

            // Set value to zero for the first time
            $counterValue = 0;
        } else {
            $counterValue = Redis::get('value');
        }

        return view('welcome', ['counterValue' => $counterValue]);
    }

    /**
     * Cache posted value on Redis
     * @param Request $request
     */
    public function cacheValue(Request $request)
    {
        $request->flash();
        $newValue = $request->counterValue;
        Redis::set('value', $newValue);
    }
}
