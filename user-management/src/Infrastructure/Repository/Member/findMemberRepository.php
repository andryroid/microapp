<?php

namespace Infrastructure\Repository\Member;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Business\Member\Attributes\Contact\Contact;
use Domain\Business\Member\Attributes\Gender;
use Domain\Business\Member\Attributes\GenderType;
use Domain\Business\Member\Member as DomainMember;
use Domain\Business\Member\Repository\FindMemberRepositoryInterface;
use Infrastructure\Entity\Member\Member;
use Infrastructure\Entity\User;

/**
 * @extends ServiceEntityRepository<Member>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class findMemberRepository extends ServiceEntityRepository implements FindMemberRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }
	
	public function findByIdentifier(string $memberIdentifier): DomainMember|null {
		$member = $this->_em->getRepository(Member::class)->findOneBy(['identifier' => $memberIdentifier]);
		$domainMember = null;
		if (!is_null($member))
		{
			$domainMember = DomainMember::init(
			identifier: $member->getIdentifier(),
			firstName: $member->getFirstName(),
			lastName: $member->getLastName(),
			contact: Contact::create($member->getContact()),
			gender: Gender::build(GenderType::build($member->getGender())),
			memberSinceAt: $member->getMemberSinceAt()
			);
		}
		return $domainMember;
	}
}