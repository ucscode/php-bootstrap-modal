<?php

namespace Ucscode\HtmlComponent\BsModal;

use Ucscode\UssElement\Node\ElementNode;

class BsModalButton
{
    protected ?string $label = null;
    protected ?string $type = null;
    protected ?ElementNode $element = null;

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

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
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
}
