<?php

namespace Ucscode\HtmlComponent\BsModal;

use Ucscode\UssElement\Node\ElementNode;
use Ucscode\UssElement\Node\TextNode;

class BsModalButton implements \Stringable
{
    public const TYPE_ANCHOR = 'A';
    public const TYPE_BUTTON = 'BUTTON';

    protected ElementNode $element;

    public function __construct(string $label = 'Ok', string $type = self::TYPE_BUTTON, array $attributes = [])
    {
        $attributes += [
            'class' => 'btn btn-primary',
            'type' => 'button',
            'data-bs-dismiss' => 'modal',
            'aria-label' => $label,
        ];

        $this->element = new ElementNode($this->validateBtnType($type), $attributes);
        $this->setLabel($label);
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function render(bool $indent = true): string
    {
        return $this->element->render($indent);
    }

    public function getLabel(): ?string
    {
        return $this->element->getInnerHtml();
    }

    public function setLabel(?string $label): static
    {
        $this->element
            ->clearChildNodes()
            ->appendChild(new TextNode($label ?? ''))
        ;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->element->getNodeName();
    }

    public function getElement(): ElementNode
    {
        return $this->element;
    }

    private function validateBtnType(string $type): string
    {
        return in_array(strtoupper($type), [self::TYPE_ANCHOR, self::TYPE_BUTTON]) ? $type : self::TYPE_BUTTON;
    }
}
