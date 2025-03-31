<?php

namespace Ucscode\HtmlComponent\BsModal\Contracts;

use Ucscode\HtmlComponent\BsModal\BsModalButton;
use Ucscode\HtmlComponent\BsModal\Builder\BsModalBuilder;
use Ucscode\UssElement\Node\ElementNode;

interface BsModalInterface extends \Stringable
{
    public function render(?int $indent): string;
    public function getBuilder(): BsModalBuilder;
    public function getModalId(): string;
    public function getElement(): ElementNode;
    public function getTitle(): ?string;
    public function hasCloseButton(): bool;
    public function getMessage(): ?string;
    public function getSize(): string;
    public function isCloseOnEscape(): bool;
    public function isBackdropStatic(): ?string;
    public function isShown(): bool;
    public function isScrollable(): bool;
    public function isVerticalCenter(): bool;
    public function getButtons(): array;
    public function getButton(int $index): ?BsModalButton;
    public function hasButton(BsModalButton $button): bool;
    public function createTriggerButton(?string $label = null): BsModalButton;
    public function addEventListener(string $eventName, string $funcName): static;
    public function removeEventListener(string $eventName): static;
    public function hasEventListener(string $eventName): bool;
    public function getEventListener(string $eventName): ?string;
    // public static function createFromJson(string $json): BsModalInterface;
    // public function toJson(): string;
}
