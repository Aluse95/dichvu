<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Services\ContentService;
use App\Consts;
use App\Models\Page;

class RssXmlController extends Controller
{
    public function index()
    {
        $pages = Page::where('status', "!=", Consts::STATUS_DELETE)
            ->orderByRaw('status ASC, iorder ASC, id DESC')
            ->get();

        $params['status'] = Consts::TAXONOMY_STATUS['active'];
        $taxonomys =  ContentService::getCmsTaxonomy($params)->get();

        $paramPost['status'] = Consts::POST_STATUS['active'];
        $posts = ContentService::getCmsPost($paramPost)->where('is_type','post')->take(15)->get();

        return response()->view('frontend.rss.detail', [
            'pages' => $pages,
            'taxonomys' => $taxonomys,
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }

    public function home()
    {
        return view('frontend.rss.index');
    }
}