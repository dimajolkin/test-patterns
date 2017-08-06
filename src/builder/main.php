<?php
include '../../vendor/autoload.php';

use patterns\models\Group;
use patterns\models\Type;
use patterns\models\User;


class Problem extends \patterns\models\Product {


}

abstract class AbstractProblemBuilder {

    protected $user;
    protected $type;
    protected $group;

    public function build(): Problem
    {
        $problem =  new Problem();
        $problem->setUser($this->user);
        $problem->setGroup($this->group);
        $problem->setType($this->type);

        return $problem;
    }
};

class StandardProblemBuilder extends AbstractProblemBuilder {

    public function buildUser($id, $name): self
    {
        $this->user = new User($id, $name);

        return $this;
    }

    public function buildTypeAndGroup($id, Group $group): self
    {
        $this->type = new Type($id, $group);
        $this->group = $group;

        return $this;
    }
}

class PostProblemBuilder  extends AbstractProblemBuilder {
    protected $post = [];

    /**
     * PostProblemBuilder constructor.
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->post = $post;

        $this->buildGroup();
        $this->user = new User($post['user_id'], 'test');
        $this->type = new Type($post['type_id'], $this->group);
    }

    protected function buildGroup(): void
    {
        $this->group = new Group($this->post['group_id']);
    }
}

//manual
$problem = (new StandardProblemBuilder())
    ->buildUser(1, 'test')
    ->buildTypeAndGroup(1, new Group(1))
    ->build();

//post
$post = [
  'group_id' => 1,
  'type_id' => 1,
  'user_id' => 1,
];
$problemPostBuild = (new PostProblemBuilder($post))->build();

//old
$group = new Group(1);
$problem = new Problem(
    new User(1, 'test'),
    new Type(1, $group),
    $group
);

