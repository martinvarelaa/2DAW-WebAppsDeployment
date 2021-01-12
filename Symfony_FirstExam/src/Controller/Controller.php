<?php

namespace App\Controller;

use App\Entity\Palabra;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class Controller extends AbstractController
{

    private string $title;
    private array $words;
    private array $defs;





    /**
     * @Route("/diccionario/random" , name="random")
     */
    public function first_Render(): Response
    {

        $this->title = "Template 1";
        $this->words = Palabra::$palabras;
        $this->defs = Palabra::$definiciones;

        $indexes = array_rand($this->words, 5);
        $i = 0;
        foreach ($indexes as $index){
            $wordsToReturn[$i] = $this->words[$index];
            $defsToReturn[$i] = $this->defs[$index];
            $i++;
        }

        return $this->render('template1.html.twig', [
            'title' => $this->title,
            'words'=> $wordsToReturn,
            'defs' => $defsToReturn
        ]);
    }

    /**
     * @Route("/diccionario/{palabra}" , name="word", requirements={"palabra"="\w+"})
     * @param string $word
     * @return Response
     */
    public function second_Render(string $palabra): Response
    {
        $this->title = "Template 2";
        $this->words = Palabra::$palabras;
        $this->defs = Palabra::$definiciones;

        $index = array_search($palabra, $this->words, true);
        $defToreturn = $this->defs[$index];


        return $this->render('template2.html.twig', [
            'title' => $this->title,
            'palabra' => $palabra,
            'def' => $defToreturn

        ]);
    }

}