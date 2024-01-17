<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    protected $breadcrumbs = [];

    public function __construct()
    {
      $this->breadcrumbs = [
        ['title' => 'Dashboard', 'uri' => route('dashboard')]
      ];
    }
    
    public function index()
    {
      $this->breadcrumbs[] = ['title' => 'Master Data User', 'uri' => route('user.index')];
    
      return Inertia::render('User/index', [
          'title'  => 'Master Data User',
          'breadcrumbs ' => $this->breadcrumbs 
      ]);

    }

    public function create(): Response
    {
        return Inertia::render('Profile/Edit', []);
    }

    public function store(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function table(Request $request)
    {
        return response()->json(User::orderBy('created_at', 'DESC')->filter($request->all())->paginateFilter());
    }

    public function validationRules($banner = null)
    {
        return [
            'page_name' => 'required',
            'title' => 'required',
            'banner_image' => 'required',
            'description' => 'nullable',
            'sub_description' => 'nullable',
            'button_title' => 'nullable',
            'link_redirect' => 'nullable',
        ];
    }
}
