<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    private string $title;
    /**
     * @Route("/", name="default")
     */
    public function defaultRedirect(): Response{
        return $this->redirectToRoute('homepage');
    }
    /**
     * @Route ("/home", name="homepage")
     *
     */
    public function renderHomepage(): Response
    {
        $this->title = "Home";
        return $this->render('homepage.html.twig', [
            "title" => $this->title
        ]);
    }


    /**
     * @Route ("/schedule/{schedule?}", name="schedule")
     * @param  $schedule
     * @return Response
     */
    public function renderSchedule($schedule): Response
    {
        $this->title = "Schedule";

        if(isset($schedule)){
            $this->title = $schedule;
            $this->title .= " schedule";
        }
        $contact_repository = $this->getDoctrine()->getRepository(Contact::class);

        if(!isset($schedule)){
            $data = $contact_repository->findAll();
            return $this->render('schedule.html.twig', [
                "title" => $this->title,
                "data" => $data
            ]);
        }

        if(strcmp($schedule, "Profesional") === 0 || strcmp($schedule, "Personal") === 0 || strcmp($schedule, "personal") === 0 || strcmp($schedule, "profesional") === 0 ){


        $data =  $contact_repository->getBySchedule($schedule);
            return $this->render('schedule.html.twig', [
                "title" => $this->title,
                "data" => $data
            ]);
        }


        $this->title = "Error";
        return $this->render('bundles/TwigBundles/Exception/error404.html.twig',[
            "title" => $this->title
        ]);


    }


    /**
     * @Route ("/schedule/delete/{id}/{schedule?}", name="delete")
     * @param int id
     * @param string $schedule
     * @return Response
     */
    public function deleteContact(int $id, string $schedule): Response
    {

        $this->title = "Schedule";

        $manager = $this->getDoctrine()->getManager();

        $contact_repository = $this->getDoctrine()->getRepository(Contact::class);

        $toRemoveContact = $contact_repository->findBy(["id" => $id]);
        if(!empty($toRemoveContact)){
            foreach ($toRemoveContact as $contact) {
                $manager->remove($contact);

            }
            $manager->flush();
            $data = $contact_repository->findAll();
            if(!empty($schedule)){
               return $this->redirectToRoute("schedule", ["schedule" => $schedule]);
            }

            return $this->render('schedule.html.twig', [
                "title" => $this->title,
                "data" => $data,

            ]);

        }

        return $this->render(':bundles/TwigBundles/Exception:error404.html.twig');



    }


    /**
     * @Route ("/add", name="add")
     * @return Response
     */
    public function addContact(Request $request): Response
    {

        $contact = new Contact();

        $form = $this->createForm(Form::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager-> persist($contact);
            $manager->flush();
            return $this->render('homepage.html.twig', [
                'title' => "Home",


            ]);
        }


        return $this->render('form.html.twig', [
            'title' => "Add contact",
            'form' => $form->createView()

        ]);
    }


    /**
     * @Route ("schedule/modify/{id}/{schedule?}", name="modify")
     * @param Request $request
     * @param int $id
     * @param string $schedule
     * @return Response
     */
    public function modifyContact(Request $request, int $id, string $schedule): Response
    {

        $title = "Modify contact";

        $manager =  $this->getDoctrine()->getManager();
        $contact_repository = $manager->getRepository(Contact::class);

        $contact = $contact_repository->findOneBy(['id' => $id]);

        $form = $this->createForm(Form::class, $contact);

        $form->handleRequest($request);

        if (!empty($contact)){

            if($form->isSubmitted() && $form->isValid()){

            $manager-> persist($contact);
            $manager->flush();

            if(isset($schedule)){
                $data = $contact_repository->getBySchedule($schedule);
            }else{
                $data = $contact_repository->findAll();
            }


                return $this->redirectToRoute('schedule', [
                    'schedule' => $schedule,


                ]);


            }
        }





        return $this->render('form.html.twig', [
            'title' => $title,
            'form' => $form->createView()

        ]);
    }
}