<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SEOMeta;
use OpenGraph;
use Twitter;
use JsonLd;
use SEO;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Websolutionstuff | Home');
        SEOMeta::setDescription('This is my page description of websolutionstuff');
        SEOMeta::setCanonical('https://websolutionstuff.com');

        OpenGraph::setDescription('This is my page description of websolutionstuff');
        OpenGraph::setTitle('Websolutionstuff | Home');
        OpenGraph::setUrl('https://websolutionstuff.com');
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Websolutionstuff | Homepage');
        Twitter::setSite('@websolutionstuff');

        JsonLd::setTitle('Websolutionstuff | Homepage');
        JsonLd::setDescription('This is my page description of websolutionstuff');
        JsonLd::addImage('https://websolutionstuff.com/frontTheme/assets/images/logo.png');

        // OR use single only SEOTools

//        SEO::setTitle('Websolutionstuff | Home');
//        SEO::setDescription('This is my page description of websolutionstuff');
//        SEO::opengraph()->setUrl('https://websolutionstuff.com/');
//        SEO::setCanonical('https://websolutionstuff.com');
//        SEO::opengraph()->addProperty('type', 'articles');
//        SEO::twitter()->setSite('@websolutionstuff');
//        SEO::jsonLd()->addImage('https://websolutionstuff.com/frontTheme/assets/images/logo.png');
        return view('index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy()
    {
        return view('pages.privacy-policy');
    }

    public function term()
    {
        return view('pages.terms-condition');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function team()
    {
        return view('pages.team');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function testimonials()
    {
        return view('pages.testimonials');
    }
}
