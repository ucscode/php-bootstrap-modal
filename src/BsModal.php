<?php

namespace Ucscode\HtmlComponent\BsModal;

use Closure;
use Ucscode\UssElement\Node\ElementNode;

class BsModal
{
    protected ?string $id = null;
    protected ?string $title = null;
    protected ?string $message = null;
    protected ?string $size = null;
    protected bool $closeOnEscape = true;
    protected ?string $backdrop = 'static';
    protected ?Closure $callback = null;
    protected ?self $successor = null;
    protected array $events = [];
    protected bool $show = true;
    protected bool $closeButton = true;
    protected bool $scrollable = false;
    protected bool $verticalCenter = false;
    protected ?ElementNode $element = null;
    protected array $buttons = [];
    protected ?ElementNode $associateButton = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
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

    public function getCallback(): ?Closure
    {
        return $this->callback;
    }

    public function setCallback(?Closure $callback): static
    {
        $this->callback = $callback;
        return $this;
    }

    public function getSuccessor(): ?self
    {
        return $this->successor;
    }

    public function setSuccessor(?self $successor): static
    {
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
        return $this->element;
    }

    public function setElement(ElementNode $element): static
    {
        $this->element = $element;
        return $this;
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

    public function getAssociateButton(): ElementNode
    {
        return $this->associateButton;
    }

    public function setAssociateButton(ElementNode $associateButton): static
    {
        $this->associateButton = $associateButton;
        return $this;
    }
}
