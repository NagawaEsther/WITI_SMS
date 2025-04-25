<?php

namespace App\Http\Controllers;

use App\Models\IdentityCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;


class IdentityCardController extends Controller
{
    public function index()
    {
        $cards = IdentityCard::all();
        return view('identity_cards.index', compact('cards'));
    }

    public function create()
    {
        return view('identity_cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'reg_number' => 'required|unique:identity_cards',
            'class' => 'required',
            'dob' => 'required|date',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        // Upload photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $card = IdentityCard::create($data);

        // Generate QR code
        $qrData = "ID: {$card->reg_number}, Name: {$card->name}";
        $qrPath = "qrcodes/card_{$card->id}.png";
        QrCode::format('png')->size(200)->generate($qrData, public_path("storage/{$qrPath}"));

        $card->qr_code = $qrPath;
        $card->save();

        return redirect()->route('identity_cards.index')->with('success', 'Identity Card Created Successfully');
    }


    

public function download($id)
{
    $card = IdentityCard::findOrFail($id);
    $pdf = Pdf::loadView('identity_cards.pdf', compact('card'));
    return $pdf->download('identity_card_'.$card->reg_number.'.pdf');
}



    

// public function generatePdf($id)
// {
//     $card = IdentityCard::findOrFail($id);

//     $pdf = PDF::loadView('identity_cards.pdf', compact('card'));

//     // Option 1: Download the PDF
//     return $pdf->download("identity_card_{$card->reg_number}.pdf");

//     // Option 2: View the PDF in browser
//     // return $pdf->stream("identity_card_{$card->reg_number}.pdf");
// }

}
