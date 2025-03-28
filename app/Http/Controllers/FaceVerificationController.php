<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FaceVerificationController extends Controller
{
    public function show(){
        return view('auth.verify-face');
    }

    public function verify(Request $request)
    {
        // Handle ID Photo (either uploaded file or captured image)
        if ($request->hasFile('id_photo')) {
            $idPhoto = $request->file('id_photo')->store('uploads', 'public');
        } elseif ($request->id_photo_capture) {
            $idPhoto = $this->saveBase64Image($request->id_photo_capture, 'id_photo');
        } else {
            return back()->withErrors(['id_photo' => 'Please provide an ID photo.']);
        }
    
        // Handle Selfie (either uploaded file or captured image)
        if ($request->hasFile('selfie')) {
            $selfie = $request->file('selfie')->store('uploads', 'public');
        } elseif ($request->selfie_capture) {
            $selfie = $this->saveBase64Image($request->selfie_capture, 'selfie');
        } else {
            return back()->withErrors(['selfie' => 'Please provide a selfie.']);
        }
    
        // Perform Face API verification
        $verificationResult = $this->verifyFace($idPhoto, $selfie);
    
        if ($verificationResult) {
            // Retrieve pending user
            $user = User::find(session('pending_user_id'));
            
            if ($user) {
                // Log them in
                Auth::login($user);
    
                // Clear session
                session()->forget('pending_user_id');
    
                return redirect('/')->with('success', 'Verification successful!');
            }
        }
    
        return redirect()->route('face.verification')->withErrors(['face' => 'Face verification failed.']);
    }
    
    // Function to save Base64 images
    private function saveBase64Image($base64, $filename)
    {
        $image = str_replace('data:image/png;base64,', '', $base64);
        $image = str_replace(' ', '+', $image);
        $imageName = $filename . '_' . time() . '.png';

        Storage::disk('public')->put("uploads/$imageName", base64_decode($image));
    
        return "uploads/$imageName";
    }
    


    private function verifyFace($idPhoto, $selfie)
    {
        // Here, integrate Microsoft Face API verification
        // Upload both images, call Face API, and compare the results
        // Return true if matched, false otherwise
    }
}
