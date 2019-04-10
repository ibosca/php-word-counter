<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:39
 */

namespace App\Infrastructure\Controller;

use App\Application\Filter;
use App\Application\FilterComposition;
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
    public function wordsAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        try{
            $sentence = new Sentence($data['body']);

        }catch(EmptyStringException $emptyStringException){
            return new JsonResponse($emptyStringException->__toArray());
        }

        $filterComposition = new FilterComposition($data['filters']);
        $counter = new WordCounter($sentence, $filterComposition);

        return new JsonResponse([Sentence::WORDS => $counter->count()]);
    }

    /**
     * @Route("/filters", name="available_filters", methods={"GET"})
     * @return JsonResponse
     */
    public function filtersAction()
    {
        return new JsonResponse([Filter::FILTERS => Filter::getAvailableFilters()]);
    }

}