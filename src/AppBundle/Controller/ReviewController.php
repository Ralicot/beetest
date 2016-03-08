<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;

class ReviewController extends FOSRestController
{

    public function getReviewsAction()
    {
        $data = $this->get('doctrine')->getRepository('AppBundle:Review')->findAll();
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function getReviewAction($id)
    {
        $data = $this->get('doctrine')->getRepository('AppBundle:Review')->find($id);
        $view = $this->view($data);
        return $this->handleView($view);
    }
    public function postReviewAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $review = new Review();
        $review->setAuthor($user);
        $review->setRating($request->get('rating'));
        $review->setContent($request->get('content'));
        $review->setProduct($request->get('product'));
        $this->getDoctrine()->getManager()->persist($review);
        $this->getDoctrine()->getManager()->flush();
        $data = array('id' => $review->getId());
        $view= $this->view($data);
        return $this->handleView($view);


    }
}
