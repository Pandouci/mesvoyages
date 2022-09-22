<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\admin;

use App\Entity\Visite;
use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of AdminVoyagesController
 *
 * @author Station
 */
class AdminVoyagesController extends AbstractController  {
      /**
     *
     * @var VisiteRepository
     */
    private $repository;
    
    /**
     * 
     * @param \App\Controller\VisiteRepository $repository
     */
    function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
 /**
     * @Route("/admin", name = "admin.voyages")
     * @return Response
     */
    public function index() :Response{
        $visites = $this->repository->findAllOrderBy('datecreation','DESC');
        return $this->render("admin/admin.voyages.html.twig",['visites'=>$visites]);
    }
    /**
     * @Route("/admin/suppr/{id}", name="admin.voyage.suppr")
     * @param \App\Controller\admin\Visite $visite
     * @return Response
     */
    public function suppr(Visite $visite): Response {
        $this->repository->remove($visite,true);
        return $this->redirectToRoute('admin.voyages');
    }
}
