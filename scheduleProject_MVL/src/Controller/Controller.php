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
    public function defaultRedirect(): Response
    {
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

        if (isset($schedule)) {
            $this->title = $schedule;
            $this->title .= " schedule";
        }

        $contact_repository = $this->getDoctrine()->getRepository(Contact::class);

        if (!isset($schedule)) {
            $data = $contact_repository->findAll();
            return $this->render('schedule.html.twig', [
                "title" => $this->title,
                "data" => $data,
                'showAlert' => false
            ]);
        }

        if (strcmp($schedule, "Profesional") === 0 || strcmp($schedule, "Personal") === 0 || strcmp($schedule, "personal") === 0 || strcmp($schedule, "profesional") === 0) {


            $data = $contact_repository->getBySchedule($schedule);
            return $this->render('schedule.html.twig', [
                "title" => $this->title,
                "data" => $data,
                'showAlert' => false
            ]);
        }


        $this->title = "Error";
        return $this->render('bundles/TwigBundles/Exception/error404.html.twig', [
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
        if (!empty($toRemoveContact)) {
            foreach ($toRemoveContact as $contact) {
                $manager->remove($contact);

            }
            $manager->flush();

            $data = $contact_repository->findAll();



            if (!isset($schedule)) {
                return $this->redirectToRoute("schedule", ["schedule" => $schedule]);
            }

            return $this->redirectToRoute("schedule", ["schedule" => ""]);

        }

        return $this->render('bundles/TwigBundles/Exception/error404.html.twig',['title' => 'Error']);


    }


    /**
     * @Route ("/add", name="add")
     * @param Request $request
     * @return Response
     */
    public function addContact(Request $request): Response
    {

        $contact = new Contact();
        $this->title = "Add contact";
        $form = $this->createForm(Form::class, $contact);
        $contact_repository = $this->getDoctrine()->getRepository(Contact::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();



            $manager->persist($contact);
            $manager->flush();

            $data = $contact_repository->getBySchedule($contact->getSchedule());



            return $this->render('schedule.html.twig', [ 'title' => $contact->getSchedule().' schedule',
                'schedule' => $contact->getSchedule(),
                'data' => $data,
                'showAlert' => true]);

        }


        return $this->render('form.html.twig', [
            'title' => $this->title,
            'form' => $form->createView()

        ]);
    }


    /**
     * @Route ("schedule/modify/{id}/{schedule?}", name="modify")
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function modifyContact(Request $request, int $id): Response
    {

        $this->title = "Modify contact";

        $manager = $this->getDoctrine()->getManager();

        $contact_repository = $manager->getRepository(Contact::class);

        $renderForm_contact = $contact_repository->findOneBy(['id' => $id]);

        $form = $this->createForm(Form::class, $renderForm_contact);

        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid() ) {

                $modifiedContact = $form->getData();

                $manager->persist($modifiedContact);

                $manager->flush();

                return $this->redirectToRoute('schedule', ['schedule' => $modifiedContact->getSchedule()]);


            }

        return $this->render('form.html.twig', [
            'title' => $this->title,
            'form' => $form->createView()
        ]);

    }
    /**
     * @Route ("schedule/viewContact/{id}", name="viewContact")
     *
     * @param int $id
     * @param string $schedule
     * @return Response
     */
    public function viewContact( int $id): Response
    {

        $this->title = "View contact";


        $manager = $this->getDoctrine()->getManager();
        $contact_repository = $manager->getRepository(Contact::class);
        $contact = $contact_repository->findOneBy(['id' => $id]);


        return $this->render('contactView.html.twig', [
            'title' => $this->title,
            'contact' => $contact
        ]);

    }
}