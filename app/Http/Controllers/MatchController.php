<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Match;
use App\Girl;
use App\MatchType;
use Illuminate\Http\Request;

class MatchController extends Controller
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

        $girls = Girl::all(['id', 'name']);
        $matches_types = MatchType::all(['id', 'name']);

        if (!empty($keyword)) {
            $match = Match::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $match = Match::latest()->paginate($perPage);
        }

        return view('match.index', compact('match', 'girls', 'matches_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $girls = Girl::all(['id', 'name']);
        $matches_types = MatchType::all(['id', 'name']);
        return view('match.create', compact('girls', 'matches_types'));
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
        
        Match::create($requestData);

        return redirect('match')->with('flash_message', 'Match added!');
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
        $match = Match::findOrFail($id);

        return view('match.show', compact('match'));
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
        $girls = Girl::all(['id', 'name']);
        $matches_types = MatchType::all(['id', 'name']);
        $match = Match::findOrFail($id);

        return view('match.edit', compact('match','girls','matches_types'));
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
        
        $match = Match::findOrFail($id);
        $match->update($requestData);

        return redirect('match')->with('flash_message', 'Match updated!');
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
        Match::destroy($id);

        return redirect('match')->with('flash_message', 'Match deleted!');
    }
}
