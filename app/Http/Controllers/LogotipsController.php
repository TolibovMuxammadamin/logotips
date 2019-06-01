<?php

namespace Logotips\Http\Controllers;

use Logotips\Logotip;
use Logotips\Category;
use Logotips\Http\Requests\Logotip\LogotipsRequest;
use Logotips\Http\Requests\Logotip\LogotipsUpdateRequest;
use Illuminate\Support\Facades\Storage;

class LogotipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if($search) {
            $logotips = Logotip::where('name', 'LIKE', "%{$search}%")->paginate(8);
        } else
        {
            $logotips = Logotip::paginate(8);
        }
        

        return view('logotips.index', [
            'logotips' => $logotips
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logotips.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogotipsRequest $request)
    {
        $image = $request->image->store('logotips');

        \auth()->user()->logotips()->create([
            'name' => $request->name,
            'image' => $image,
            'category_id' => $request->category
        ]);

        session()->flash('success', 'Логотип добавлена');

        return redirect()->route('logotips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Logotip $logotip)
    {
        return view('logotips.show', [
            'logotip' => $logotip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Logotip $logotip)
    {
        if($logotip->creator->id !== auth()->user()->id)
        {
            return redirect()->back();
        }

        return view('logotips.create', [
            'logotip' => $logotip,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogotipsUpdateRequest $request, Logotip $logotip)
    {
        $image = $request->image->store('logotips');

        Storage::delete($logotip->image);

        $logotip->update([
            'name' => $request->name,
            'image' => $image,
            'category_id' => $request->category,
        ]);

        session()->flash('success', 'Логотип Изменена');

        return redirect( route('logotips.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logotip $logotip)
    {
        Storage::delete($logotip->image);

        $logotip->delete();

        session()->flash('success', 'Логотип удалена');

        return redirect()->back();
    }
}
