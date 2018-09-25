<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
  public function index()
  {
    $path = '/srv/users/serverpilot/apps/shelton/public/sitemap.xml';
    SitemapGenerator::create('https://shelton.ru')->writeToFile($path);
  }
}
