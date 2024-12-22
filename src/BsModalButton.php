<?php

namespace Ucscode\HtmlComponent\BsModal;

use Ucscode\UssElement\Enums\NodeNameEnum;
use Ucscode\UssElement\Node\ElementNode;

class BsModalButton
{
    const TYPE_ANCHOR = 'A';
    const TYPE_BUTTON = 'BUTTON';

    protected ?string $label = null;
    protected ?string $type = null;
    protected ?ElementNode $element = null;

    public function __construct(string $label = 'Ok', string $type = self::TYPE_BUTTON, array $attributes = [])
    {   
        $this->label = $label;
        $this->type = $this->validateBtnType($type);
        $this->element = new ElementNode($this->type, $attributes);
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getElement(): ElementNode
    {
        return $this->element;
    }

    public function setElement(ElementNode $element): static
    {
        $this->element = $element;
        return $this;
    }

    private function validateBtnType(string $type): string
    {
        if (in_array($type, [self::TYPE_ANCHOR, self::TYPE_BUTTON])) {
            return $type;
        }

        return self::TYPE_BUTTON;
    }
}
