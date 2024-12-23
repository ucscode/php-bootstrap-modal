<?php

namespace Ucscode\HtmlComponent\BsModal\Test;

use PHPUnit\Framework\TestCase;
use Ucscode\HtmlComponent\BsModal\Builder\BsModalBuilder;
use Ucscode\UssElement\Enums\NodeNameEnum;

class BsModalBuilderTest extends TestCase
{
    public function testBuildProcess(): void
    {
        $builder = new BsModalBuilder();

        $this->assertSame(NodeNameEnum::NODE_H5->value, $builder->getTitleElement()->getNodeName());
        $this->assertSame(NodeNameEnum::NODE_BUTTON->value, $builder->getBtnCloseElement()->getNodeName());

        $this->assertTrue($builder->getBtnCloseElement()->hasAttribute('type'), 'btnClose.type missing');
        $this->assertTrue($builder->getBtnCloseElement()->hasAttribute('data-bs-dismiss'), 'btnClose.data-bs-dismiss missing');
        $this->assertTrue($builder->getBtnCloseElement()->hasAttribute('aria-label'), 'btnClose.aria-label missing');
    }
}
