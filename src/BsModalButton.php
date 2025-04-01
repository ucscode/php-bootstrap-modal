<?php

namespace Ucscode\HtmlComponent\BsModal;

use Ucscode\UssElement\Node\ElementNode;
use Ucscode\UssElement\Node\TextNode;

class BsModalButton implements \Stringable
{
    public const TYPE_ANCHOR = 'A';
    public const TYPE_BUTTON = 'BUTTON';

    protected ElementNode $element;

    public function __construct(string $label = 'Ok', array $attributes = [], string $type = self::TYPE_BUTTON)
    {
        if (array_key_exists(':target', $attributes)) {
            $target = $attributes[':target'];
            unset($attributes[':target']);
        }

        $attributes += [
            'class' => 'btn btn-primary',
            'type' => 'button',
            'aria-label' => $label,
            'data-bs-dismiss' => 'modal'
        ];

        $this->element = new ElementNode($this->validateBtnType($type), $attributes);
        $this->setLabel($label);

        if (array_key_exists('href', $attributes) && $type === self::TYPE_ANCHOR) {
            $this->element->removeAttribute('data-bs-dismiss');
        }

        if ($target ?? null) {
            $this->setTarget($target);
        }
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
        $this->element->clearChildNodes();
        $this->element->appendChild(new TextNode($label ?? ''));

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

    public function setTarget(BsModal|string $target): static
    {
        if ($target instanceof BsModal) {
            $target = $target->getModalId();
        }

        if (empty(trim($target))) {
            $this->removeTarget();
            return $this;
        }

        if (strpos($target, '#') !== 0) {
            $target = "#{$target}";
        }

        $this->element
            ->setAttribute('data-bs-target', $target)
            ->setAttribute('data-bs-toggle', 'modal')
            ->removeAttribute('data-bs-dismiss')
        ;

        return $this;
    }

    public function getTarget(): ?string
    {
        if (!$this->hasTarget()) {
            return null;
        }

        return substr($this->element->getAttribute('data-bs-target'), 1);
    }

    public function hasTarget(): bool
    {
        return
            $this->element->hasAttribute('data-bs-target') &&
            $this->element->hasAttribute('data-bs-toggle') &&
            !$this->element->hasAttribute('data-bs-dismiss')
        ;
    }

    public function removeTarget(): static
    {
        $this->element
            ->removeAttribute('data-bs-target')
            ->removeAttribute('data-bs-toggle')
            ->setAttribute('data-bs-dismiss', 'modal')
        ;

        return $this;
    }

    private function validateBtnType(string $type): string
    {
        return in_array(strtoupper($type), [self::TYPE_ANCHOR, self::TYPE_BUTTON]) ? $type : self::TYPE_BUTTON;
    }
}
