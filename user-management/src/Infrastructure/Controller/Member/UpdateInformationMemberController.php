<?php

namespace Infrastructure\Controller\Member;

use Application\Business\Member\Command\CreateMemberCommand;
use Application\Business\Member\Command\UpdateInformationMemberCommand;
use Application\Business\Member\Query\Member\FindOneMemberQuery;
use Infrastructure\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    path:'/member/update_information/{memberIdentification}',
    name:'api_member_update_information',
    methods:['POST']
)]
final class UpdateInformationMemberController extends AbstractController{
    public function __invoke(string $memberIdentification,Request $request) : Response
    {
        $memberQuery = FindOneMemberQuery::build($memberIdentification);
        $member = $this->query($memberQuery);
        $updatedMember = UpdateInformationMemberCommand::build(
            $member,
            json_decode($request->getContent(),true
        ));
        $updatedMember = $this->command($updatedMember);
        return $this->responseManagerInterface->success($updatedMember,200);
    }
}