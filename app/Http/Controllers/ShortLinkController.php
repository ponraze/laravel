<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShortLinkController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('short-link');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(['link' => 'required|string|url|max:2048']);

        $shortLink = ShortLink::query()
            ->where('full_link', 'like', $request->link)
            ->first();
        if ($shortLink === null) {
            $shortLink = new ShortLink();
            $shortLink->full_link = $request->link;
            $shortLink->save();
        }

        return response()->json($shortLink);
    }

    /**
     * @return JsonResponse
     */
    public function lastList(): JsonResponse
    {
        return response()->json(
            ShortLink::select('short_code')
                ->orderby('id', 'desc')
                ->take(10)->get()
        );
    }

    /**
     * @param string $shortCode
     * @return RedirectResponse
     */
    public function show(string $shortCode): RedirectResponse
    {
        $shortLink = ShortLink::query()
            ->where('short_code', 'like', $shortCode)
            ->first();

        if ($shortLink) {
            return redirect($shortLink->full_link);
        } else {
            return redirect('/');
        }
    }
}
