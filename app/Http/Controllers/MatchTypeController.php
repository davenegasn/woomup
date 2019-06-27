<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MatchType;
use Illuminate\Http\Request;

class MatchTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $matchtype = MatchType::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $matchtype = MatchType::latest()->paginate($perPage);
        }

        return view('match-type.index', compact('matchtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('match-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        MatchType::create($requestData);

        return redirect('match-type')->with('flash_message', 'MatchType added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $matchtype = MatchType::findOrFail($id);

        return view('match-type.show', compact('matchtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $matchtype = MatchType::findOrFail($id);

        return view('match-type.edit', compact('matchtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $matchtype = MatchType::findOrFail($id);
        $matchtype->update($requestData);

        return redirect('match-type')->with('flash_message', 'MatchType updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MatchType::destroy($id);

        return redirect('match-type')->with('flash_message', 'MatchType deleted!');
    }
}
