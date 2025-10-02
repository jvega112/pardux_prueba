<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\TaskForm;
use App\Form\Data\TaskData;
use App\Entity\Task as TaskEntity;

class TaskController extends AbstractController
{
    public function index( EntityManagerInterface $em )
    {
        $arrTask = $em->getRepository(TaskEntity::class)->findAll();
        
        return $this->render('task/index.html.twig', [
            'arrTask' => $arrTask
        ]);
    }
    
    public function create( Request $request, EntityManagerInterface $em )
    {
        $is_new = true;
        
        /* @var $data TaskData */
        $data = new TaskData();
        $options = [
            'is_new' => $is_new
        ];
        
        $form = $this->createForm(TaskForm::class, $data, $options);
        $form->handleRequest($request);
        
        $form_success = null;
        $form_message = null;
        if( $form->isSubmitted() && $form->isValid() )
        {
            $data = $form->getData();
            
            $dt_current = new \DateTime();

            $eTask = new TaskEntity();
            $eTask->setTitle( $data->getTitle() );
            $eTask->setDescription( $data->getDescription() );
            $eTask->setIscompleted( $data->getIsCompleted() );
            $eTask->setCreatedat( $dt_current );
            $eTask->setCreatedby( $data->getCreatedBy() );

            $em->persist($eTask);
            $em->flush();

            $id_task = $eTask->getId();

            $form_success = true;
            $form_message = 'Tarea guardada exitoramente';

            $this->addFlash('success', 'Registro creado exitosamente');
            return $this->redirectToRoute('task_edit', ['id_task'=>$id_task]);
        }
        
        return $this->render('task/form.html.twig', [
            'is_new' => $is_new,
            'form' => $form->createView(),
            'form_success' => $form_success,
            'form_message' => $form_message,
        ]);
    }
    
    public function edit( Request $request, EntityManagerInterface $em, $id_task  )
    {
        $is_new = false;
        
        try
        {
            /* @var $eTask TaskEntity */
            $eTask = $em->getRepository(TaskEntity::class)->find($id_task);
            if( empty($eTask) )
            {
                throw new \Exception('Registro no encontrado');
            }
            
            /* @var $data TaskData */
            $data = new TaskData();
            
            $data->setId( $eTask->getId() );
            $data->setTitle( $eTask->getTitle() );
            $data->setDescription( $eTask->getDescription() );
            $data->setIsCompleted( $eTask->getIscompleted() == 1 );
            $data->setCreatedBy( $eTask->getCreatedby() );

            $options = [
                'is_new' => $is_new,
            ];
            
            $form = $this->createForm(TaskForm::class, $data, $options);
            $form->handleRequest($request);
            
            if( $form->isSubmitted() && $form->isValid() )
            {
                $data = $form->getData();

                $eTask->setTitle( $data->getTitle() );
                $eTask->setDescription( $data->getDescription() );
                $eTask->setIscompleted( $data->getIsCompleted() );

                $em->persist($eTask);
                $em->flush();

                $this->addFlash('success', "Registro actualizado exitosamente");
            }
        }
        catch( \Exception $ex )
        {
            $this->addFlash('error', $ex->getMessage() );
        }
        
        return $this->render('task/form.html.twig', [
            'is_new' => $is_new,
            'form' => $form->createView()
        ]);
    }
    
    public function delete()
    {
        return $this->render('task/form.html.twig', [
        ]);
    }
}