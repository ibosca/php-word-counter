<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:39
 */

namespace App\Infrastructure\Controller;

use App\Domain\Entity\LargerThanTwoWordCounter;
use App\Domain\Entity\Sentence;
use App\Domain\Entity\StartingWithCapitalLetterWordCounter;
use App\Domain\Entity\StartingWithVocalWordCounter;
use App\Domain\Entity\WordCounter;
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

        $counter        = new WordCounter($sentence);
        $vocalCounter   = new StartingWithVocalWordCounter($sentence);
        $capitalCounter = new StartingWithCapitalLetterWordCounter($sentence);
        $largerCounter  = new LargerThanTwoWordCounter($sentence);

        return new JsonResponse([
            Sentence::WORDS                              => $counter->count(),
            Sentence::WORDS_STARTING_WITH_VOCALS         => $vocalCounter->count(),
            Sentence::WORDS_LARGER_THAN_TWO              => $largerCounter->count(),
            Sentence::WORDS_STARTING_WITH_CAPITAL_LETTER => $capitalCounter->count()
        ]);
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