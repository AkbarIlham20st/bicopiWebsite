<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Portfolio;
use App\Models\Promo;
use App\Models\Special;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'asc')->get();
        $about = About::first();
        $portfolios = Portfolio::orderBy('created_at', 'asc')->get();
        $contact = Contact::first();
        $promosi = Promo::orderBy('created_at', 'asc')->get();
        $specials = Special::orderBy('created_at', 'asc')->get();
        $menus = Menu::orderBy('created_at', 'asc')->get();


        return view('home.index', compact(
            'sliders',
            'about',
            'portfolios',
            'promosi',
            'contact',
            'specials',
            'menus',
        ));
    }

    public function about()
    {
        $about = About::first();
        $contact = Contact::first();

        return view('home.about', compact(
            'about',
            'contact',
            'services',
        ));
    }

    public function specials()
    {
        $contact = Contact::first();
        $specials = Special::all();

        return view('home.specials', compact(
            'specials',
            'contact',
            'services',
        ));
    }

    public function menu()
    {
        $contact = Contact::first();
        $menus = Menu::all();

        return view('home.menu', compact(
            'menu',
            'contact',
            'services',
        ));
    }

    public function promosi()
    {
        $contact = Contact::first();
        $promosi = Promo::all();

        return view('home.promosi', compact(
            'promosi',
            'contact',
            'services',
        ));
    }

    public function portfolio()
    {
        $portfolio = Portfolio::all();
        $contact = Contact::first();


        return view('home.portfolio', compact(
            'portfolio',
            'contact',
            'services',
        ));
    }

    public function contact()
    {
        $contact = Contact::first();


        return view('home.contact', compact(
            'contact',


        ));
    }



    public function product()
    {

        $contact = Contact::first();

        return view('home.product', compact(

            'services',
            'contact',
        ));
    }
}
