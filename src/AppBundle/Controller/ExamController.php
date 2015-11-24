<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exam;
use AppBundle\Form\ExamType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class ExamController
 */
class ExamController extends Controller
{
    /**
     * @Route("/admin/exam", name="exam_list")
     */
    public function indexAction()
    {
        $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();

        return $this->render('AppBundle:Exam:index.html.twig', [
            'exams' => $exams
        ]);
    }

    /**
     * @Route("/admin/exam/add", name="exam_add")
     */
    public function addAction(Request $request)
    {
        $exam = new Exam();
        $form = $this->createForm(new ExamType(), $exam);
        if ($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()) {

            $db = $this->getDoctrine()->getManager();
            $db->persist($exam);
            $db->flush();

            return $this->redirectToRoute('exam_list');
        }

        return $this->render('AppBundle:Exam:add.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/exam/delete/{id}", name="exam_delete")
     */
    public function deleteAction($id)
    {
        $db = $this->getDoctrine()->getManager();

        $admin = $db
            ->getRepository('AppBundle:Exam')
            ->find($id);

        $db->remove($admin);
        $db->flush();

        return $this->redirectToRoute('exam_list');
    }
}