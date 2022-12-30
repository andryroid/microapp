<?php

namespace Infrastructure\Controller\Member;

use Application\Business\Member\Command\CreateMemberCommand;
use Application\Business\Member\Command\UpdateInformationMemberCommand;
use Infrastructure\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    path:'/member/update_information/{memberIdentification}',
    name:'api_member_update_information',
    methods:['POST'],
    requirements:['memberIdentification' => '\s+']
)]
final class UpdateInformationMemberController extends AbstractController{
    public function __invoke(string $memberIdentification,Request $request) : Response
    {
        $updateMemberInformationCommand = UpdateInformationMemberCommand::build(
            $memberIdentification,
            json_decode($request->getContent(),true
        ));
        $updateMemberInformation = $this->command($updateMemberInformationCommand);
        return $this->responseManagerInterface->success($updateMemberInformation,200);
    }
}