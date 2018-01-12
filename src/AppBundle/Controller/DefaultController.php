<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Default")
     */

    public function defaultAction(Request $request)

    {
        $user = $this->getUser();


//        $em = $this->getDoctrine()->getEntityManager();
//        $client = $em->getRepository('AppBundle:Client')->findOneById(2);
//        echo '<pre>';
//        print_r($client->getFirstName());
//        exit;


        $em = $this->getDoctrine()->getEntityManager();
        $client = $em->getRepository('AppBundle:Client')->findOneById($user->getId());

         //echo '<pre>';;
        //return array(
        //'clients' => $client,);

       // echo '<pre>';
//
       // print_r($client->getFirstName().  " "  .$client->getLastName());
       // echo $client . "</br>";
       // exit;

        $klant = new \GuzzleHttp\Client();

        $response = $klant->request('GET', 'https://api.github.com/users/codereviewvideos');

        $data = json_decode($response->getBody()->getContents(), true)    ;


        return $this->render('Default/index.html.twig', [
            'client' => $client,
            'login' => 'My Profile',
            'details' => [

        'location' => 'The Netherlands, Lelystad',
        'joined_on' => 'Joined on 3rd Jan 2017',
    ],
        'blog' => "https://github.com/Gijak",
        'social_data' => [
            "Public Repos" => 11,
            "Folowers" => 0,
            "Folowing" => 0,

        ],
        'repo_count' => 100,
        'most_stars' => 67,
        'repos' => [
            [
                'name' => 'some repositories',
                'url' => 'https://api.github.com/users/Gijak/repos',
                'stargazers_count' => 46,
                'description' => 'Leer omgaan met symfony 3!'
            ],
            [
                'name' => 'another repositories',
                'url' => 'https://getbootstrap.com',
                'stargazers_count' => 22,
                'description' => 'Bootstrap'
            ],
            [
                'name' => 'google repositories',
                'url' => 'https://www.google.nl',
                'stargazers_count' => 11,
                'description' => 'Vraag Google!'
            ],

        ]
        ]);
    }

//    /**
//     * @Route("/profile", name="profile")
//     */
//
//    public function profileAction(Request $request)
//
//    {
//        return $this->render('Default/profile.html.twig', [
//            'avatar_url' => 'https://avatars3.githubusercontent.com/u/22021405?v=4&s=460',
//            'name' => "Gia Kvanchiani",
//            'login' => 'My Profile',
//            'details' => [
//                'company' => 'My First Symfony Project',
//                'location' => 'The Netherlands, Lelystad',
//                'joined_on' => 'Joined on 3rd Jan 2017',
//            ],
//            'blog' => "https://github.com/Gijak",
//            'social_data' => [
//                "Public Repos" => 11,
//                "Folowers" => 0,
//                "Folowing" => 0,
//            ]
//        ]);
//    }

}