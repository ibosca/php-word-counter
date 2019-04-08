<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:39
 */

namespace App\Infrastructure\Controller;

use App\ApplicationService\UseCase\LargerThanTwoWordCounter;
use App\ApplicationService\UseCase\StartingWithCapitalLetterWordCounter;
use App\ApplicationService\UseCase\StartingWithVocalWordCounter;
use App\ApplicationService\UseCase\WordCounter;
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

        $counter = new WordCounter($sentence);

        return new JsonResponse([Sentence::WORDS => $counter->count()]);
    }

    /**
     * @Route("/words/vocal-start", name="words_starting_with_vocals_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function wordsStartingWithVocals(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        $counter = new StartingWithVocalWordCounter($sentence);

        return new JsonResponse([ Sentence::WORDS => $counter->count()]);
    }

    /**
     * @Route("/words/larger", name="words_larger_than_two_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function wordsLargerThanTwo(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        $counter = new LargerThanTwoWordCounter($sentence);

        return new JsonResponse([Sentence::WORDS => $counter->count()]);

    }

    /**
     * @Route("/words/capital-letter-start", name="words_starting_with_capital_letter_counter", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function wordsStartingWithCapitalLetter(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $sentence = new Sentence($data['body']);

        $counter = new StartingWithCapitalLetterWordCounter($sentence);

        return new JsonResponse([Sentence::WORDS => $counter->count()]);
    }

}