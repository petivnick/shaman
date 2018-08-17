<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/edit", name="app_admin_edit")
     */
    public function edit()
    {
        return $this->render('summernote.html.twig');
    }
    /**
     * @Route("/api/save", name="app_api_save")
     */
    public function save(Request $request)
    {
        //$request->isXmlHttpRequest(); // is it an Ajax request?
        //$request->request->get('data');
        //echo $request->request->get('data');die;

        $new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
        //функция при выводе: htmlspecialchars_decode()

        $post = array(
            //'title' => $request->request->get('title'),
            'content'  => $request->request->get('content'),
        );

        return $this->json($post);
    }    
}    