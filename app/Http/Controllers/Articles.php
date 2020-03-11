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


    public function displayData(){

        $multiplesArticles = count($this->getCategories()) === 1 ?  true : false;

        $articles = DB::table('articles')->get();

        $this->setArticles($articles);

        return view('index', [
            'articles' => $this->getArticles(),
            'categories' => $this->getCategories(),
            'multiplesArticles' => $multiplesArticles,
            'title' => $this->getTitle()
        ]);
    }
}
