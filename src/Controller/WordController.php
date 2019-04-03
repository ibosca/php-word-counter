<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:39
 */

namespace App\Controller;

use App\Entity\Sentence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WordController extends AbstractController
{

    /**
     * @Route("/words", name="words_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function words(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        return new JsonResponse([Sentence::WORDS => $sentence->numberOfWords()]);
    }

    /**
     * @Route("/letters", name="letters_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function letters(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        return new JsonResponse([Sentence::LETTERS => $sentence->numberOfLetters()]);
    }

}