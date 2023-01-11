<?php

namespace Infrastructure\Repository\Member;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Business\Member\Member as MemberMember;
use Domain\Business\Member\Repository\CreateMemberRepositoryInterface;
use Domain\Business\Member\Repository\DeleteMemberRepositoryInterface;
use Infrastructure\Entity\Member\Member;
use Infrastructure\Entity\User;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeleteMemberRepository extends ServiceEntityRepository implements DeleteMemberRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }
	/**
	 *
	 * @param \Domain\Business\Member\Member $member
	 *
	 * @return string
	 */
	public function deleteMember(string $memberIdentifier): bool {
		$memberInDatabase = $this->_em->getRepository(Member::class)->findOneBy(['identifier' => $memberIdentifier]);
		if (!is_null($memberInDatabase))
		{
			$this->_em->remove($memberInDatabase);
			return true;
		}
		return false;
	}
}