<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Articles extends Controller
{
    private $articles;
    private $categories = ['movies','books','music','video games','art'];
    private $multipleArticle;
    private $title = 'Home';

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getMultipleArticle()
    {
        return $this->multipleArticle;
    }

    /**
     * @param mixed $multipleArticle
     */
    public function setMultipleArticle($multipleArticle): void
    {
        $this->multipleArticle = $multipleArticle;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param mixed $articles
     */
    public function setArticles($articles): void
    {
        $this->articles = $articles;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }

    public  function fetchAuthor($name){
        $name = urldecode($name);

        $articles = DB::table('articles')->where('author', '=', $name)->get();

        $this->setArticles($articles);
        $this->setTitle('Author : '. $name);

        return view('index', [
            'articles' => $articles,
            'categories' => $this->getCategories(),
            'multiplesArticles' => false,
            'title' => $this->getTitle()
        ]);
    }

    public  function fetchArticle($id){
        $article = DB::table('articles')->where('id', '=', $id)->get();


        $this->setTitle($article[0]->title);

        return view('index', [
            'article' => $article[0],
            'categories' => $this->getCategories(),
            'multiplesArticles' => true,
            'title' => $this->getTitle()
        ]);
    }

    public function fetchCategory($code){
        $code = urldecode($code);
        $articles = DB::table('articles')->where([['category', '=', $code], ['is_published', '=', '1']])->get();

        $this->setArticles($articles);
        $this->setTitle('Category : '. $code);

        return view('index', [
            'articles' => $articles,
            'categories' => $this->getCategories(),
            'multiplesArticles' => false,
            'title' => $this->getTitle()
        ]);
    }

    public function displayData(){

        $multiplesArticles = count($this->getCategories()) === 1 ?  true : false;

        $articles = DB::table('articles')->where('is_published', '=', '1')->get();
        $this->setArticles($articles);

        return view('index', [
            'articles' => $this->getArticles(),
            'categories' => $this->getCategories(),
            'multiplesArticles' => $multiplesArticles,
            'title' => $this->getTitle()
        ]);
    }
}
