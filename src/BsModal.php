<?php

namespace Ucscode\HtmlComponent\BsModal;

use Ucscode\HtmlComponent\BsModal\Builder\BsModalBuilder;
use Ucscode\UssElement\Node\ElementNode;

class BsModal
{
    protected ?string $title = null;
    protected ?string $message = null;
    protected ?string $size = null;
    protected bool $closeOnEscape = true;
    protected ?string $backdrop = 'static';
    protected ?BsModal $successor = null;
    protected array $events = [];
    protected bool $show = true;
    protected bool $closeButton = true;
    protected bool $scrollable = false;
    protected bool $verticalCenter = false;
    protected ?string $callback = null;
    protected array $buttons = [];
    protected BsModalBuilder $builder;
    protected ?ElementNode $associateButton = null;

    public function __construct(array $configs = [])
    {
        $this->resolveConfiguration($configs);
        $this->builder = new BsModalBuilder();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): static
    {
        $this->size = $size;
        return $this;
    }

    public function getCloseOnEscape(): bool
    {
        return $this->closeOnEscape;
    }

    public function setCloseOnEscape(bool $closeOnEscape): static
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

    public function getBackdrop(): ?string
    {
        return $this->backdrop;
    }

    public function setBackdrop(?string $backdrop): static
    {
        $this->backdrop = $backdrop;
        return $this;
    }

    public function getCallback(): ?string
    {
        return $this->callback;
    }

    public function setCallback(?string $callback): static
    {
        $this->callback = $callback;
        return $this;
    }

    public function getSuccessor(): ?BsModal
    {
        return $this->successor;
    }

    public function setSuccessor(?BsModal $successor): static
    {
        if ($successor === $this) {
            throw new \InvalidArgumentException('The current modal cannot be a successor of itself');
        }

        $this->successor = $successor;
        return $this;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function setEvents(array $events): static
    {
        $this->events = $events;
        return $this;
    }

    public function getShow(): bool
    {
        return $this->show;
    }

    public function setShow(bool $show): static
    {
        $this->show = $show;
        return $this;
    }

    public function getCloseButton(): bool
    {
        return $this->closeButton;
    }

    public function setCloseButton(bool $closeButton): static
    {
        $this->closeButton = $closeButton;
        return $this;
    }

    public function getScrollable(): bool
    {
        return $this->scrollable;
    }

    public function setScrollable(bool $scrollable): static
    {
        $this->scrollable = $scrollable;
        return $this;
    }

    public function getVerticalCenter(): bool
    {
        return $this->verticalCenter;
    }

    public function setVerticalCenter(bool $verticalCenter): static
    {
        $this->verticalCenter = $verticalCenter;
        return $this;
    }

    public function getElement(): ElementNode
    {
        return $this->builder->getContainerElement();
    }

    public function getButtons(): array
    {
        return $this->buttons;
    }

    public function setButtons(array $buttons): static
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getButton(int $index): ?BsModalButton
    {
        return $this->buttons[$index] ?? null;
    }

    public function addButton(BsModalButton $button): static
    {
        if (!$this->hasButton($button)) {
            $this->buttons[] = $button;
        }
        return $this;
    }

    public function hasButton(BsModalButton $button): bool
    {
        return in_array($button, $this->buttons, true);
    }

    public function removeButton(BsModalButton|int $button): static
    {
        if ($button instanceof BsModalButton) {
            $button = array_search($button, $this->buttons, true);
        }

        if ($button !== null && array_key_exists($button, $this->buttons)) {
            unset($this->buttons[$button]);

            $this->buttons = array_values($this->buttons);
        }

        return $this;
    }

    public function getAssociateButton(): ElementNode
    {
        return $this->associateButton;
    }

    public function setAssociateButton(ElementNode $associateButton): static
    {
        $this->associateButton = $associateButton;
        return $this;
    }

    private function resolveConfiguration(array $configs): void
    {
        $restrainedProperties = [
            'element',
            'associateButton'
        ];

        foreach ($configs as $key => $value) {
            if (property_exists($this, $key) && !in_array($key, $restrainedProperties)) {
                $this->{$key} = $value;
            }
        }
    }
}
