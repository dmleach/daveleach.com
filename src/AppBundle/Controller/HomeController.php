<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    protected function calcBlogPosts()
    {
        return array (
            array (
                "image" => "pic08.jpg",
                "title" => "Test blog post",
                "time" => "last week",
                 "excerpt" => "One day I sat down and I wrote a test blog post.
                     It was brilliant and the whole internet came by my site
                     to read it. Here's the way the post began.",
                "route" => "blog_post",
                "comments" => array (
                    "count" => 51632,
                    "route" => "blog_post_comments"
                )
            ),
            array (
                "image" => "pic08.jpg",
                "title" => "Test blog post",
                "time" => "last week",
                "excerpt" => "One day I sat down and I wrote a test blog post.
                    It was brilliant and the whole internet came by my site
                    to read it. Here's the way the post began.",
                "route" => "blog_post",
                "comments" => array (
                    "count" => 51632,
                    "route" => "blog_post_comments"
                )
            )
        );
    }

    protected function calcNavMenu()
    {
        return array (
            array (
                "Caption" => "Home",
                "Route" => "home"
            ),
            array (
                "Caption" => "Resume",
                "Route" => "resume"
            ),
            array (
                "Caption" => "Portfolio",
                "Route" => "portfolio"
            ),
            array (
                "Caption" => "Blog",
                "Route" => "blog"
            ),
        );
    }

    public function displayAction()
    {
        return $this->render(
            "home.html.twig",
            array (
                "blog" => array (
                    "heading" => "The Blog",
                    "posts" => $this->calcBlogPosts(),
                    "route" => "blog"
                ),
                "body" => "Hello!",
                "navMenu" => $this->calcNavMenu(),
                "portfolio" => array (
                    "heading" => "Current Projects",
                    "projects" => $this->calcProjects(),
                    "route" => "portfolio"
                ),
                "subtitle" => "Delphi and PHP programmer in Atlanta, Georgia",
                "title" => "Dave Leach"
            )
        );
    }

    protected function calcProjects()
    {
        return array (
            array (
                "name" => "daveleach.work",
                "description" => "A website for my professional projects and
                    blog, as well as a sandbox to learn new technologies. You're
                    probably looking at it at this very moment!",
                //"image" => "daveleachwork.jpg",
                "route" => "project_daveleach"
            ),
            array (
                "name" => "Soundscape",
                "description" => "Website, hosting, and feed for Soundscape, a
                    progressive rock podcast",
                //"image" => "daveleachwork.jpg",
                "route" => "project_soundscape"
            ),
            array (
                "name" => "Renewal Therapeutic Bodyworks",
                "description" => "Website and hosting for Renewal Therapeutic
                    Bodyworks, a massage therapy company",
                //"image" => "daveleachwork.jpg",
                "route" => "project_rtbmassage"
            )
        );
    }
}

?>
