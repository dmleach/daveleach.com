<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;

class HomeController extends BaseController
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

    protected function displayBodyClass()
    {
        return "homepage";
    }

    protected function displayParameters()
    {
        return array (
            // "blog" => array (
            //     "heading" => "The Blog",
            //     "posts" => $this->calcBlogPosts(),
            //     "route" => "blog"
            // ),
            "headline" => "Hi! I'm Dave Leach",
            "portfolio" => array (
                "heading" => "Current Projects",
                "projects" => $this->fetchProjects(),
                "route" => "portfolio"
            ),
            "subtitle" => "Delphi and PHP programmer in Atlanta, Georgia"
        );
    }

    protected function displayTemplate()
    {
        return 'home.html.twig';
    }

    protected function fetchProjects()
    {
        return $this->getDoctrine()->getRepository("AppBundle:Project")->findAll();
    }
}

?>
