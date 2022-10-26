<?php

namespace Infrastructure\Controller\Member;

use Application\Business\Member\Command\CreateMemberCommand;
use Infrastructure\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path:'/member',name:'api_member_creation',methods:['POST'])]
final class CreateMemberController extends AbstractController{
    public function __invoke(Request $request) : Response
    {
        $createMemberCommand = CreateMemberCommand::build(json_decode($request->getContent(),true));
        $member = $this->command($createMemberCommand);
        return $this->responseManagerInterface->success($member,201);
    }
}