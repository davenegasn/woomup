<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Girl;
use App\Role;
use App\Company;
use Illuminate\Http\Request;

class GirlsController extends Controller
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
            $girls = Girl::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $girls = Girl::latest()->paginate($perPage);
        }

        return view('girls.index', compact('girls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all(['id', 'title']);
        $companies = Company::all(['id', 'name']);
        return view('girls.create', compact('roles', 'companies'));
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
        
        Girl::create($requestData);

        return redirect('girls')->with('flash_message', 'Girl added!');
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
        $girl = Girl::findOrFail($id);

        return view('girls.show', compact('girl'));
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
        $girl = Girl::findOrFail($id);
        $roles = Role::all(['id', 'title']);
        $companies = Company::all(['id', 'name']);

        return view('girls.edit', compact('girl', 'roles', 'companies'));
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
        
        $girl = Girl::findOrFail($id);
        $girl->update($requestData);

        return redirect('girls')->with('flash_message', 'Girl updated!');
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
        Girl::destroy($id);

        return redirect('girls')->with('flash_message', 'Girl deleted!');
    }
    
}
