<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends Controller
{

    /** @var LoggerInterface */
    private $logger;

    /**
     * VideoController constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/", name="user_index", methods="GET")
     */
    public function index(): Response
    {
        $users = $this->getRepository()->findAll();

        return $this->json($users);
    }

    /**
     * @Route("/new", name="user_new_get", methods="GET")
     */
    public function newGet(Request $request): Response
    {
        $exercise = new User();
        $form = $this->createForm(UserType::class, $exercise);
        $form->handleRequest($request);

        return $this->render('exercise/new.html.twig', [
            'exercise' => $exercise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods="POST")
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $user->populate((array)json_decode($request->getContent()));

        $retorno = $this->getRepository()->isAlreadyRegistered($user->getEmail(), true);
        if(!$retorno['is_valid']){
            $result = ['success' => 0, 'message' => 'Cadastro não foi salvo, Email já cadastrado', 'error' => '1'];
            return $this->json($result);
        }

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $result = ['success' => 1, 'message' => 'Cadastro salvo', 'id' => $user->getId()];
            return $this->json($result);
        } catch (\Exception $exception) {
            $result = ['success' => 0, 'message' => $exception->getMessage(), 'error' => $exception->getCode().""];
            return $this->json($result);
        }
    }

    /**
     * @Route("/{id}", name="user_show", methods="GET")
     */
    public function show(User $user): Response
    {
        return $this->json($user);
    }

    /**
     * @Route("/authenticate", name="user_authenticate", methods="POST")
     */
    public function authenticate(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        if (!isset($data['email']) || !isset($data['password'])) {
            return $this->json(['is_valid' => false]);
        }

        $result = $this->getRepository()->authenticate($data['email'], $data['password']);

        return $this->json($result);
    }

    /**
     * @Route("/already/registered", name="user_already_registered", methods="POST")
     */
    public function isAlreadyRegistered(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        if (!isset($data['id'])) {
            return $this->json(['is_valid' => false]);
        }

        $result = $this->getRepository()->isAlreadyRegistered($data['id']);

        return $this->json($result);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods="POST")
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', ['id' => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/notify", name="user_notify", methods="POST")
     */
    public function notify(Request $request): Response
    {
        $data = json_decode($request->getContent());

        $this->logger->alert(
            "Teste",
            [$request->getContent()]
        );

        if(!is_array($data)){
            $data = (array)$data;
        }

        $result = [];
        foreach ($data as $key => $r) {
            if(is_array($r)){
                foreach ($r as $key1 => $r1) {
                    if(!is_string($r1)){
                        $result[$key][$key1] = (array)$r1;
                    }
                }

                $result[$key] = (array)$r;
            }
        }



        $this->logger->alert(
            "Teste",
            $result
        );

        return $this->json(['is_valid' => 1]);
    }

    /**
     * @return UserRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getRepository()
    {
        return $this->getDoctrine()->getRepository(User::class);
    }
}
