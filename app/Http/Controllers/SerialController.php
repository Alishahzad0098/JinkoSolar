<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SerialController extends Controller
{
    public function index()
    {
        $captcha = rand(1000, 9999);
        Session::put('captcha_code', $captcha);
        return view('welcome', compact('captcha'));
    }
    public function dashboard()
    {
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

    // --- Authentication views & actions ---
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('check.serial');
    }

    public function searchModule(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'country' => 'required|string',
            'serial' => 'required|string',
            'captcha_input' => 'required|string',
        ]);

        // 2. Check CAPTCHA (compare values as same type)
        if ((string) trim($request->captcha_input) !== (string) Session::get('captcha_code')) {

            // regenerate captcha ONLY when invalid
            $captcha = rand(1000, 9999);
            Session::put('captcha_code', $captcha);

            return redirect()
                ->route('check.serial')
                ->withErrors(['captcha_input' => 'Incorrect verification code'])
                ->withInput();
        }

        // 3. CAPTCHA passed → clear it
        Session::forget('captcha_code');

        // 4. Search module
        $module = Module::where('country', $request->country)
            ->where('serial', $request->serial)
            ->first();

        // 5. Redirect to result page (FOUND / NOT FOUND)
        if ($module) {
            return view('CheckSerial', compact('module'));
        }

        return view('CheckSerial');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country' => 'required|string',
            'power' => 'nullable|string',
            'importer' => 'nullable|string',
            'production' => 'nullable|date',
            'delivery' => 'nullable|date',
            'serial' => 'required|string',
            'product' => 'nullable|string',
            'level' => 'nullable|string',
            'result' => 'nullable|string',
        ]);

        $module = Module::findOrFail($id);

        $module->update($request->only([
            'country',
            'power',
            'importer',
            'production',
            'delivery',
            'serial',
            'product',
            'level',
            'result'
        ]));

        return redirect()->route('view.table')->with('success', 'Module updated successfully.');
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('Editorm', compact('module'));
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('view.table')->with('success', 'Module deleted successfully.');
    }


}
