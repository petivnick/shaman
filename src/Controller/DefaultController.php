<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Task;
use App\Form\TaskType;

class DefaultController extends AbstractController
{
    private $links = [
        'home' => 'Главная',
        'gallery' => 'Галерея',
        'rules' => 'Правила',
        'my_path' => 'Своя стезя',
        'ambulance' => 'Скорая шаманская помощь',
        'feedback' => 'Наше взаимодействие',
        'payment' => 'Оплата',
        'faq' => 'Вопросы-ответы'

    ];

    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
        return $this->render('index.html.twig', array('links' => $this->links, 'style' => null));
    }

    /**
     * @Route("/home", name="app_homepage")
     */
    public function homepage()
    {
        /*
        $links = [
            'gallery' => 'Галерея',
            'rules' => 'Правила',
            'my_path' => 'Своя стезя',
            'ambulance' => 'Скорая шаманская помощь',
            'feedback' => 'Наше взаимодействие',
            'payment' => 'Оплата',
            'faq' => 'Вопросы-ответы'

        ];
        */
        return $this->render('home.html.twig', array('links' => $this->links));
    }

    /**
     * @Route("/orig_balance", name="app_balance")
     */
    public function orig_balance()
    {
        //="background: #112146; -webkit-box-shadow: 0px 0px 13px 9px rgba(7,21,57,1); -moz-box-shadow: 0px 0px 13px 9px rgba(7,21,57,1); box-shadow: 0px 0px 13px 9px rgba(7,21,57,1);"
        return $this->render('balance.html.twig');
    }
    /**
     * @Route("/main", name="app_main")
     */
    public function main()
    {
        return $this->render('main.html.twig');
    }


    /**
     * @Route("/gallery", name="app_homepage_gallery")
     */
    public function gallery()
    {
        return $this->render('gallery.html.twig', array('links' => $this->links));
    }

    /**
     * @Route("/rules", name="app_homepage_rules")
     */
    public function rules()
    {
        return $this->render('rules.html.twig', array('links' => $this->links));
    }

    /**
     * @Route("/my_path", name="app_homepage_my_path")
     */
    public function my_path()
    {
        return $this->render('my_path.html.twig', array('links' => $this->links));
    }

    /**
     * @Route("/ambulance", name="app_homepage_ambulance")
     */
    public function ambulance(Request $request)
    {
        $form = $this->handleForm($request);
        return $this->render('ambulance.html.twig', array('links' => $this->links, 'form' => $form->createView()));
    }

    /**
     * @Route("/feedback", name="app_homepage_feedback")
     */
    public function feedback(Request $request)
    {
        $form = $this->handleForm($request);
        return $this->render('feedback.html.twig', array('links' => $this->links, 'style' => null, 'form' => $form->createView()));
    }

    /**
     * @Route("/payment", name="app_homepage_payment")
     */
    public function payment(Request $request)
    {
        $form = $this->handleForm($request);
        return $this->render('payment.html.twig', array(
            'form' => $form->createView(),
            'links' => $this->links
        ));
    }

    /**
     * @Route("/faq", name="app_homepage_faq")
     */
    public function faq()
    {
        return $this->render('faq.html.twig', array('links' => $this->links));
    }    

    /**
     * @Route("/balance", name="app_homepage_gallery_balance")
     */
    public function balance()
    {
        return $this->render('balance.html.twig', array('links' => $this->links));
    }

    /**
     * @Route("/balance/{slug}", name="app_homepage_gallery_balance_list", requirements={"slug": "energy|clearing"})
     */
    public function balance_list($slug)
    {
        switch ($slug) {
            case 'energy':
                $name = "Кровеносная система";
                $template = 'gallery_balance_energy.html.twig';
                break;
            case 'clearing':
                $name = "Нервная система";
                $template = 'gallery_balance_clearing.html.twig';
                break;
        }

        return $this->render($template, array('links' => $this->links));
    }    

    /**
     * @Route("/harmony", name="app_homepage_gallery_harmony")
     */
    public function harmony()
    {
        return $this->render('harmony.html.twig', array('links' => $this->links));
    }

    /**
     * @Route("/harmony/{page}", name="app_homepage_gallery_harmony_list", requirements={"page"="\d+"})
     */
    public function harmony_list($page)
    {
        switch ($page) {
            case 1:
                $name = "Кровеносная система";
                break;
            case 2:
                $name = "Нервная система";
                break;
            case 3:
                $name = "Дыхательная система";
                break;
            case 4:
                $name = "Выделительная система";
                break;
            case 5:
                $name = "Пищеварительная и эндокринная системы";
                break;
            case 6:
                $name = "Мужская репродуктивная система";
                break;
            case 7:
                $name = "Женская репродуктивная система";
                break;
            case 8:
                $name = "Опорно-двигательная система";
                break;

            default:
                throw $this->createNotFoundException('The section does not exist');
        }
        return new Response(
            '<html><body>'.$name.'</body></html>'
        );        
    }  
    

    /**
     * @Route("/tmp", name="app_tmp")
     */
    public function tmp()
    {
        return $this->render('tmp1.html.twig', array('links' => $this->links));
    }


    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    private function handleForm(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            // $file stores the uploaded JPEG file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $task->getPhoto();
            if ($file) {
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

            // moves the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            }
            //$this->addFlash('success', 'Genus created!');
            //return $this->redirectToRoute('task_success');
        }
        return $form;
    }

}