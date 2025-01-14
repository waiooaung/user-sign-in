<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Guest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Mail\GuestSignedIn;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'photo' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $rawPhoto = $request->input('photo');
        try {
            $imageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $rawPhoto));
            $imageName = Str::random(40) . '.png';
            Storage::disk('public')->put('photos/' . $imageName, $imageData);
            $photoPath = 'photos/' . $imageName;

            $data = new Guest();
            $data->name = $name;
            $data->photo = $photoPath;
            $data->save();

            $dateTime = $data->created_at->toDateTimeString();
            Mail::to(env('MAIL_RECEIVER', 'waiooaung.dev@gmail.com'))->send(new GuestSignedIn($data, $dateTime));

            session()->flash('message', 'You have successfully signed in!');
            session()->flash('message_type', 'success');
            return redirect()->route('index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
