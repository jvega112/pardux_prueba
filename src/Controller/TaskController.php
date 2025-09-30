<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class TaskController extends AbstractController
{
    public function index()
    {
        return $this->render('task/index.html.twig', [
        ]);
    }
    
    public function create()
    {
        return $this->render('task/form.html.twig', [
        ]);
    }
    
    public function edit()
    {
        return $this->render('task/form.html.twig', [
        ]);
    }
    
    public function delete()
    {
        return $this->render('task/form.html.twig', [
        ]);
    }
}