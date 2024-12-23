<?php

namespace Ucscode\HtmlComponent\BsModal\Test;

use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;
use Ucscode\UssElement\Node\ElementNode;
use Ucscode\HtmlComponent\BsModal\BsModal;
use Ucscode\HtmlComponent\BsModal\BsModalButton;
use Ucscode\UssElement\Collection\HtmlCollection;

class BsModalTest extends TestCase
{
    public function testBsModalButtonInstance(): BsModalButton
    {
        $button = new BsModalButton('Click Me', [
            'class' => 'btn btn-secondary',
        ], BsModalButton::TYPE_ANCHOR);

        $this->assertSame('Click Me', $button->getLabel());
        $this->assertSame('A', BsModalButton::TYPE_ANCHOR);
        $this->assertSame('BUTTON', BsModalButton::TYPE_BUTTON);
        $this->assertSame(BsModalButton::TYPE_ANCHOR, $button->getType());
        $this->assertInstanceOf(ElementNode::class, $button->getElement());
        $this->assertSame('A', $button->getElement()->getNodeName());
        $this->assertSame('btn btn-secondary', $button->getElement()->getAttribute('class'));

        return $button;
    }

    #[Depends('testBsModalButtonInstance')]
    public function testBsModalInstance(BsModalButton $button): void
    {
        $modal = new BsModal([
            'title' => 'A bootstrap modal',
            'message' => "This is a bootstrap modal message",
            'size' => 'fullscreen',
            'buttons' => [
                $button,
                new BsModalButton(),
            ],
            'closeOnEscape' => false,
        ]);

        $newButton = new BsmodalButton();

        $modal->addButton($newButton);
        $modal->addButton($newButton); // no duplicate button allowed

        $this->assertTrue($modal->hasButton($newButton));
        $this->assertSame('A bootstrap modal', $modal->getTitle());
        $this->assertCount(3, $modal->getButtons());
        $this->assertSame($newButton, $modal->getButton(2));
        $this->assertSame($button, $modal->getButton(0));
        $this->assertNull($modal->getButton(3));
        $this->assertSame('Ok', $newButton->getLabel());
        $this->assertInstanceOf(ElementNode::class, $modal->getElement());
        $this->assertSame('modal fade', $modal->getElement()->getAttribute('class'));

        /**
         * @var HtmlCollection $children
         */
        $children = $modal->getElement()->getChildren();

        $this->assertSame('modal-dialog modal-fullscreen', $children->first()->getAttribute('class'));
        $this->assertSame('modal-body', $modal->getElement()->querySelector('.modal-body')?->getAttribute('class'));

        $modal->setSize(BsModal::SIZE_LG);
        $this->assertSame(BsModal::SIZE_LG, $modal->getSize());
        $this->assertSame('modal-dialog modal-lg', $modal->getElement()->getChildren()->first()->getAttribute('class'));

        $modal->setSize(BsModal::SIZE_XL);
        $this->assertSame(BsModal::SIZE_XL, $modal->getSize());
        $this->assertSame('modal-dialog modal-xl', $modal->getElement()->getChildren()->first()->getAttribute('class'));
    }
}
