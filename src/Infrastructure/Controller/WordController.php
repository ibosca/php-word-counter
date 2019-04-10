<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:39
 */

namespace App\Infrastructure\Controller;

use App\Application\LargerThanTwoWordCounter;
use App\Application\StartingWithCapitalLetterWordCounter;
use App\Application\StartingWithVocalWordCounter;
use App\Application\WordCounter;
use App\Domain\Exception\EmptyStringException;
use App\Domain\Sentence;
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

        try{
            $sentence = new Sentence($data['body']);

        }catch(EmptyStringException $emptyStringException){
            return new JsonResponse($emptyStringException->__toArray());
        }

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

        try{
            $sentence = new Sentence($data['body']);

        }catch(EmptyStringException $emptyStringException){
            return new JsonResponse($emptyStringException->__toArray());
        }

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
        try{
            $sentence = new Sentence($data['body']);

        }catch(EmptyStringException $emptyStringException){
            return new JsonResponse($emptyStringException->__toArray());
        }
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

        try{
            $sentence = new Sentence($data['body']);

        }catch(EmptyStringException $emptyStringException){
            return new JsonResponse($emptyStringException->__toArray());
        }

        $counter = new StartingWithCapitalLetterWordCounter($sentence);
        return new JsonResponse([Sentence::WORDS => $counter->count()]);

    }

}