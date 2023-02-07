<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Helpers;
use App\Http\Services\ContentService;
use App\Models\CmsTaxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class CmsController extends Controller
{

    public function postCategory($alias_category, $alias = null, Request $request)
    {

        // Check if exist .html => redirect.
        $fullUrl = $request->fullUrl();
        if (Str::contains($fullUrl, '.html')) {
            $fullUrl = Str::before($fullUrl, '.html');
            return Redirect::to($fullUrl);
        }

        $params_page['alias'] = $alias_category;
        $params_page['status'] = Consts::STATUS['active'];
        $page = ContentService::getPage($params_page)->first();

        if ($page) {
            if (!$page->is_page) {
                return redirect()->route('frontend.home')->with('errorMessage', __('Page is not found!'));
            } else {
                $this->responseData['page'] = $page;
                return $this->responseView('frontend.pages.custom.index');
            }
        }

        if ($alias != '') { // Check có danh mục cha/con
            $params['alias'] = $alias;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['post'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $taxonomy->id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $taxonomy->id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

                $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                    ->where('taxonomy', Consts::TAXONOMY['tags'])
                    ->where('is_featured', 1)
                    ->get();

                return $this->responseView('frontend.pages.post.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            // Check không có danh mục con
            $params['alias'] = $alias_category;

            $params['status'] = Consts::POST_STATUS['active'];

            // Check if is taxonomy
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            
            if ($taxonomy) {
                // Check if is has parent
                if ($taxonomy->parent_id > 0) {
                    return redirect()->back()->with('errorMessage', __('not_found'));
                }

                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $taxonomy->id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $taxonomy->id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

                $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                    ->where('taxonomy', Consts::TAXONOMY['tags'])
                    ->where('is_featured', 1)
                    ->get();

                return $this->responseView('frontend.pages.post.category');
            }

            // Check when is detail post or product
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;

                $params['is_type'] = $detail->is_type;
                // Tags of this post
                if (isset($detail->json_params->tags)) {
                    $this->responseData['tags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                        ->where('taxonomy', Consts::TAXONOMY['tags'] ?? '')
                        ->whereIn('tb_cms_taxonomys.id', $detail->json_params->tags ?? [])
                        ->get();
                }
                // Related post
                $params['alias'] = null;
                if (isset($detail->json_params->related_post)) {
                    $params['order_by'] = 'id';
                    $params['related_post'] = $detail->json_params->related_post ?? null;
                    $this->responseData['relatedPosts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_RELATED_LIMIT)->get();
                }

                // Get more about taxonomy of this post
                $paramsTaxonomy['status'] = Consts::POST_STATUS['active'];
                $paramsTaxonomy['id'] = $detail->taxonomy_id;
                $this->responseData['taxonomy'] = ContentService::getCmsTaxonomy($paramsTaxonomy)->first();
                // Return to view with type post
                if (View::exists('frontend.pages.' . $detail->is_type . '.detail')) {
                    return $this->responseView('frontend.pages.' . $detail->is_type . '.detail');
                } else {
                    return redirect()->back()->with('errorMessage', 'View: frontend.pages.' . $detail->is_type . '.detail do not exists!');
                }
            }
        }

        // return $this->responseView('frontend.pages.post.default');
        return redirect()->route('frontend.home')->with('errorMessage', __('Page is not found!'));
    }

    public function detail($alias_category = null, $alias = null, Request $request)
    {
        if ($alias != '') {
            $params['alias'] = $alias;
            $params['status'] = Consts::POST_STATUS['active'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;

                $params['is_type'] = $detail->is_type;
                // Tags of this post
                if (isset($detail->json_params->tags)) {
                    $this->responseData['tags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                        ->where('taxonomy', Consts::TAXONOMY['tags'] ?? '')
                        ->whereIn('tb_cms_taxonomys.id', $detail->json_params->tags ?? [])
                        ->get();
                }
                // Related post
                $params['alias'] = null;
                if (isset($detail->json_params->related_post)) {
                    $params['order_by'] = 'id';
                    $params['related_post'] = $detail->json_params->related_post ?? null;
                    $this->responseData['relatedPosts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_RELATED_LIMIT)->get();
                }

                // Return to view with type post
                if (View::exists('frontend.pages.' . $detail->is_type . '.detail')) {
                    return $this->responseView('frontend.pages.' . $detail->is_type . '.detail');
                } else {
                    return redirect()->back()->with('errorMessage', 'View: frontend.pages.' . $detail->is_type . '.detail do not exists!');
                }
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function productCategory($alias = null, Request $request)
    {
        if ($alias != '') {
            // $params['id'] = $id;
            $params['alias'] = $alias;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['product'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['taxonomy_id'] = $taxonomy->id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['product'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::PRODUCT_PAGINATE_LIMIT);

                $params['alias'] = null;
                // $params['id'] = null;
                $params['different_id'] = $taxonomy->id;
                $this->responseData['taxonomys'] = ContentService::getCmsTaxonomy($params)->get();

                return $this->responseView('frontend.pages.product.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['product'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::PRODUCT_PAGINATE_LIMIT);

            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['product'];

            $this->responseData['taxonomys'] = ContentService::getCmsTaxonomy($params)->get();
        }

        return $this->responseView('frontend.pages.product.default');
    }

    public function tags($alias = null, Request $request)
    {
        $id = Helpers::getIdFromAlias($alias)  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            // $params['taxonomy'] = Consts::TAXONOMY['tags'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;

                $paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['product'];

                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);

                $paramPost['tags'] = null;
                $paramPost['order_by'] = 'id';
                $this->responseData['latestPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

                $paramPost['order_by'] = 'count_visited';
                $this->responseData['viewPosts'] = ContentService::getCmsPost($paramPost)->limit(Consts::DEFAULT_SIDEBAR_LIMIT)->get();

                $this->responseData['featuredTags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                    ->where('taxonomy', Consts::TAXONOMY['tags'])
                    ->where('is_featured', 1)
                    ->get();

                return $this->responseView('frontend.pages.post.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }
}
