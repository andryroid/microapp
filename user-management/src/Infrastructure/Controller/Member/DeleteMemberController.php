<?php
namespace Infrastructure\Controller\Member;

use Application\Business\Member\Command\DeleteMemberCommand;
use Application\Business\Member\Query\Member\FindOneMemberQuery;
use Infrastructure\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path:'/member/delete/{member_identifier}',name:'api_member_delete',methods:['POST'])]
final class DeleteMemberController extends AbstractController
{
    public function __invoke(string $member_identifier) : Response
    {
        $member = $this->query(
            FindOneMemberQuery::build($member_identifier ?? "")
        );
        $this->command(
            DeleteMemberCommand::build($member)
        );
        return $this->responseManagerInterface->success("Removed",204);
    }
}
