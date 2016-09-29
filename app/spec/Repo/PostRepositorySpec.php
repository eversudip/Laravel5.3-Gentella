<?php

namespace spec\Repo;

use Repo\PostRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PostRepository::class);
    }
}
