<?php

namespace App\Http\Controllers\Admin;
use App\Models\Sponsorship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        return view("admin.sponsorships.index", compact("sponsorships"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsorships.create', ["sponsorship" => new Sponsorship()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'price' => 'required',
            'duration' => 'required',
            'specifics' => 'required',
        ]);

        $newSponsorhip = new Sponsorship();
        $newSponsorhip->fill($data);
        $newSponsorhip->save();

        return redirect()->route('admin.sponsorships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsorship = Sponsorship::findOrFail($id);
        return view('admin.sponsorships.show', compact('sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsorship $sponsorship )
    {
        return view('admin.sponsorships.edit', ['sponsorship' => $sponsorship ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        $data = $request->validate([
            'price' => 'required',
            'duration' => 'required',
            'specifics' => 'required', 
        ]);
        $sponsorship->update($data);
        return redirect()->route('admin.sponsorships.index', $sponsorship->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        $sponsorship->delete();
        return redirect()->route('admin.sponsorships.index')->with('message', "$sponsorship->id è stato cancellato con successo")->with('alert-type', 'danger');
    }
}
