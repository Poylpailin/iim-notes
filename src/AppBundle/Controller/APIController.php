<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * Class APIController
 */

class APIController extends FOSRestController {


    // Méthode avec JMS_SERIALIZE
    #/**
    # * @Route ("/api/students", name="api_students")
    # */
    #public function studentsAction()
    #{
    #    $students = $this->getDoctrine()->getManager()
    #        ->getRepository('AppBundle:Student')
    #        ->findAll();
    #    $json = $this->get('jms_serialize')->serialize($students, 'json');
    #    return new Response($json, 200, [
    #        'Content-Type' => 'application/json'
    #    ]);
    #}

    // Récupère tous les examens
    public function getStudentsAction()
        // "get_students"     [GET] /students
    {
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->findAll();
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    // Récupère tous les examens
    public function getExamsAction()
    // "get_exams"     [GET] /exams
    {
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    // Récupère un étudiant + id / ces notes
    public function getStudentGradesAction($slug)
    // "get_student_grades"    [GET] /students/{slug}/grades
    {
        // Trouve l'objet étudiant selon l'id ($slug)
        //$data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->find($slug);

        // Trouve les notes de l'éutdiant selon le slug
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')-> findBy(array('student' => $slug));

        //var_dump($data);die;

        $view = $this->view($data, 200);
        return $this->handleView($view);
    }


}