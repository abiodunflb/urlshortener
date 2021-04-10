<?php

namespace App\Http\Controllers;

use App\Models\UrlShortener;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);
        if ($request->url) {
            $new_url = UrlShortener::create([
                'original_url' => $request->url,
            ]);

            if ($new_url) {
                $short_url = base_convert($new_url->id, 10, 36);
                $new_url->update([
                    'short_url' => $short_url,
                ]);

                // dd(url($short_url));

                return redirect()->back()->with('success', 'Your new link: ' . '<span class="text-white">' . '<a target="_blank" href="' . url($short_url) . '">' . url($short_url) . '</a>'  . '</span>' . '<span class="text-info"> copy now</span>');
            }

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UrlShortener  $urlShortener
     * @return \Illuminate\Http\Response
     */
    public function show(UrlShortener $urlShortener)
    {
    }

    public function showUrl($code)
    {
        $short_url = UrlShortener::where('short_url', $code)->first();

        if ($short_url) {
            return redirect()->to(url($short_url->original_url));
        } else {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UrlShortener  $urlShortener
     * @return \Illuminate\Http\Response
     */
    public function edit(UrlShortener $urlShortener)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UrlShortener  $urlShortener
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UrlShortener $urlShortener)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UrlShortener  $urlShortener
     * @return \Illuminate\Http\Response
     */
    public function destroy(UrlShortener $urlShortener)
    {
        //
    }
}
