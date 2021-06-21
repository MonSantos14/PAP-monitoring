<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Partner;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    public function index()
    {
        $partners = Partner::get();
        return view('partners.index', [
            'partners' => $partners,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'partner_image' => 'mimes:jpg,jpeg,png|max:5048',
            'partner_number' => 'required|numeric',
            'partner_email' => 'required|email|unique:partners',
            'partner_name' => 'required|max:255',
        ]);

        $partnerImage = time() . '-' . $request->partner_name . '.' . $request->partner_image->extension();

        $request->partner_image->move(public_path('images/partners'), $partnerImage);

        $request->user()->partners()->create([
            'partner_name' => $request->partner_name,
            'partner_email' => $request->partner_email,
            'partner_number' => $request->partner_number,
            'partner_expiration' => $request->partner_expiration,
            'partner_image' => $partnerImage
        ]);

        dd('Stored');
    }
}
