<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Session;

class SerialController extends Controller
{
    public function index()
    {
        $captcha = rand(1000, 9999);
        Session::put('captcha_code', $captcha);
        return view('welcome', compact('captcha'));
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function viewform()
    {
        // Generate random 4-digit code
        $captcha = rand(1000, 9999);
        Session::put('captcha_code', $captcha);

        return view('Solarform', compact('captcha'));
    }

    public function store(Request $request)
    {
        Module::create($request->all());
        return redirect()->back()->with('success', 'Module information stored successfully!');
    }

    public function viewtable()
    {
        $modules = Module::all();
        return view('table', compact('modules'));
    }

    public function searchModule(Request $request)
    {
        $request->validate([
            'country' => 'required|string',
            'serial' => 'required|string',
            'captcha_input' => 'required',
        ]);

        // Validate CAPTCHA
        if ($request->captcha_input != Session::get('captcha_code')) {
            // Generate new CAPTCHA for re-rendering the form
            $captcha = rand(1000, 9999);
            Session::put('captcha_code', $captcha);
            return redirect()->route('check.serial')->withErrors(['captcha_input' => 'Incorrect verification code'])->withInput();
        }

        // Clear CAPTCHA
        Session::forget('captcha_code');

        $module = Module::where('country', $request->country)
                        ->where('serial', $request->serial)
                        ->first();

        // Generate new CAPTCHA for re-rendering the form
        $captcha = rand(1000, 9999);
        Session::put('captcha_code', $captcha);

        if ($module) {
            return view('welcome', ['module' => $module, 'searched' => true, 'captcha' => $captcha]);
        } else {
            return view('welcome', ['notFound' => true, 'searched' => true, 'country' => $request->country, 'captcha' => $captcha]);
        }
    }
}
