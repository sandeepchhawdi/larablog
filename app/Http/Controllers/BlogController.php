<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostProcesses;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $category = $request->get('category');
        $service = new PostProcesses($tag, $category);
        $data = $service->getResponse();
        $layout = ($tag || $category) ? 'blog.pages.category' : 'blog.pages.home';
        return view($layout, $data);
    }
    
    public function categoryDetail($slug)
    {
        $service = new PostProcesses('', $slug);
        $data = $service->getResponse();
        $layout = 'blog.pages.category';
        return view($layout, $data);
    }
    
    public function tagDetail($slug)
    {
        $service = new PostProcesses($slug, '');
        $data = $service->getResponse();
        $layout = 'blog.pages.category';
        return view($layout, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param string  $slug
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showPost(Request $request, $slug)
    {
        $user = \Auth::user();

        // Allow writers to view posts in draft mode and future dates
        if ($user && $user->level() > 2) {
            $post = Post::with(['tags', 'parentCategory.relatedPosts'])
                            ->bySlug($slug)
                            ->firstOrFail();
        } else {
            $post = Post::with(['tags', 'parentCategory.relatedPosts'])
                            ->bySlug($slug)
                            ->publishedTimePast()
                            ->isNotDraft()
                            ->firstOrFail();
        }
        
        $tag = $request->get('tag');

        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        $data = compact('post', 'tag', 'slug');
        return view('blog.pages.single_post', $data);
    }

    /**
     * Display a listing of the authors with published content.
     *
     * @return \Illuminate\Http\Response
     */
    public function authors(Request $request)
    {
        $authors = Post::activeAuthors()->get();

        if (!$authors) {
            $authors = [];
        }

        $data = [
            'authors'   => $authors,
            'image'     => config('blog.authors_page_image'),
        ];

        return view('blog.pages.authors', $data);
    }

    /**
     * Display a listing of an authors published posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function author(Request $request, $author)
    {
        $tag = $request->get('tag');
        $posts = Post::postsByAuthors($author)->get();

        $data = [
            'author'    => $author,
            'image'     => config('blog.author_page_image'),
            'posts'     => $posts,
            'tag'       => $tag,
        ];

        return view('blog.pages.author', $data);
    }
    
    /**
     * Display about us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $data = [
            'pageTitle'    => "About Us",
            'pageDesc'    => "About Us",
            'title'       => 'About Us',
            'image'     => config('blog.author_page_image')
        ];

        return view('blog.pages.about', $data);
    }

    /**
     * Get the RSS feed.
     *
     * @param RssFeed $feed
     *
     * @return \Illuminate\Http\Response
     */
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)->header('Content-type', 'application/rss+xml');
    }
}
