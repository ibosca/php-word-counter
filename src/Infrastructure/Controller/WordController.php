<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:39
 */

namespace App\Infrastructure\Controller;

use App\Domain\Entity\Sentence;
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

        return new JsonResponse($sentence->numberOfWords());
    }

    /**
     * @Route("/wordsStartingWithVocals", name="words_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function wordsStartingWithVocals(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        return new JsonResponse($sentence->numberOfWordsStartingWithVocal());
    }

    /**
     * @Route("/wordsLargerThanTwo", name="words_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function wordsLargerThanTwo(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        return new JsonResponse($sentence->numberOfWordsLargerThanTwoCharactersLength());
    }

    /**
     * @Route("/wordsStartingWithCapitalLetter", name="words_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function wordsStartingWithCapitalLetter(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        return new JsonResponse($sentence->numberOfWordsStartingWithCapitalLetter());
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