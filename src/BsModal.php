<?php

namespace Ucscode\HtmlComponent\BsModal;

use Ucscode\HtmlComponent\BsModal\Builder\BsModalBuilder;
use Ucscode\UssElement\Contracts\ElementInterface;
use Ucscode\UssElement\Node\ElementNode;
use Ucscode\UssElement\Node\TextNode;

class BsModal implements \Stringable
{
    public const SIZE_SM = 'sm';
    public const SIZE_MD = '';
    public const SIZE_LG = 'lg';
    public const SIZE_XL = 'xl';
    public const SIZE_FULLSCREEN = 'fullscreen';

    protected BsModalBuilder $builder;
    protected string $size = self::SIZE_MD;
    protected bool $show = true;
    protected ?string $callback = null;
    /**
     * @var BsModalButton[]
     */
    protected array $buttons = [];

    public function __construct(?array $configs = [], bool $dialog = false)
    {
        $this->builder = new BsModalBuilder();
        $this->resolveConfiguration($configs ?? []);

        if (empty($this->buttons) && !$dialog) {
            $this->addButton(new BsModalButton());
        }
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function render(bool $indent = true): string
    {
        return $this->builder->getContainerElement()->render($indent);
    }

    public function getBuilder(): BsModalBuilder
    {
        return $this->builder;
    }

    public function getModalId(): string
    {
        return $this->builder->getModalId();
    }

    public function getElement(): ElementNode
    {
        return $this->builder->getContainerElement();
    }

    public function getTitle(): ?string
    {
        return $this->builder->getTitleElement()->getInnerHtml();
    }

    public function setTitle(?string $title): static
    {
        $this->setElementContent($this->builder->getTitleElement(), $title);

        $this->analyseHeaderVisibility();

        return $this;
    }

    public function hasCloseButton(): bool
    {
        return $this->builder->getBtnCloseElement()->isVisible();
    }

    public function setCloseButton(bool $visible): static
    {
        $this->builder->getBtnCloseElement()->setVisible($visible);

        $this->analyseHeaderVisibility();

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->builder->getBodyElement()->getInnerHtml();
    }

    public function setMessage(?string $message): static
    {
        $this->setElementContent($this->builder->getBodyElement(), $message);

        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize(string $size): static
    {
        $sizeList = [
            self::SIZE_SM,
            self::SIZE_LG,
            self::SIZE_XL,
            self::SIZE_FULLSCREEN,
        ];

        $size ??= '';
        $grep = sprintf('/^(?:modal\-)?(%s)$/', implode('|', $sizeList));
        $classList = $this->builder->getDialogElement()->getClassList();

        $classList->remove(implode(' ', array_map(fn ($value) => "modal-{$value}", $sizeList)));

        if (empty($size)) {
            $this->size = self::SIZE_MD;
            return $this;
        }

        if (preg_match($grep, trim($size), $matches)) {
            $this->size = $matches[1];
            $classList->add("modal-{$this->size}");
        }

        return $this;
    }

    public function isCloseOnEscape(): bool
    {
        return $this->builder->getContainerElement()->getAttribute('data-bs-keyboard') !== 'false';
    }

    public function setCloseOnEscape(bool $closeOnEscape): static
    {
        $closeOnEscape ?
            $this->builder->getContainerElement()->removeAttribute('data-bs-keyboard') :
            $this->builder->getContainerElement()->setAttribute('data-bs-keyboard', 'false')
        ;

        return $this;
    }

    public function isBackdropStatic(): ?string
    {
        return $this->builder->getContainerElement()->getAttribute('data-bs-backdrop') === 'static';
    }

    public function setBackdropStatic(bool $static): static
    {
        $static ?
            $this->builder->getContainerElement()->setAttribute('data-bs-backdrop', 'static') :
            $this->builder->getContainerElement()->removeAttribute('data-bs-backdrop')
        ;

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

    public function getShow(): bool
    {
        return $this->show;
    }

    public function setShow(bool $show): static
    {
        $this->show = $show;

        return $this;
    }

    public function isScrollable(): bool
    {
        return $this->builder->getDialogElement()
            ->getClassList()
                ->contains('modal-dialog-scrollable')
        ;
    }

    public function setScrollable(bool $scrollable): static
    {
        $classList = $this->builder->getDialogElement()->getClassList();

        $scrollable ? $classList->add('modal-dialog-scrollable') : $classList->remove('modal-dialog-scrollable');

        return $this;
    }

    public function getVerticalCenter(): bool
    {
        return $this->builder->getDialogElement()
            ->getClassList()
                ->contains('modal-dialog-centered')
        ;
    }

    public function setVerticalCenter(bool $verticalCenter): static
    {
        $classList = $this->builder->getDialogElement()->getClassList();

        $verticalCenter ? $classList->add('modal-dialog-centered') : $classList->remove('modal-dialog-centered');

        return $this;
    }

    /**
     * @return BsModalButton[]
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param array $buttons
     * @return void
     * @throws \InvalidArgumentException if a value is not a valid button type
     */
    public function setButtons(array $buttons): static
    {
        foreach ($this->buttons as $button) {
            $this->removeButton($button);
        }

        foreach ($buttons as $button) {
            if (!$button instanceof BsModalButton) {
                throw new \InvalidArgumentException(
                    sprintf('Expect array of type %s, found %s', BsModalButton::class, gettype($button))
                );
            }

            $this->addButton($button);
        }

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

            if (!$this->builder->getFooterElement()->hasChild($button->getElement())) {
                $this->builder->getFooterElement()->appendChild($button->getElement());
            }
        }

        return $this;
    }

    public function hasButton(BsModalButton $button): bool
    {
        return in_array($button, $this->buttons, true);
    }

    public function removeButton(BsModalButton|int $button): static
    {
        if (!$button instanceof BsModalButton) {
            if (null === $button = $this->getButton($button)) {
                return $this;
            }
        }

        $index = array_search($button, $this->buttons, true);

        if ($index !== false && array_key_exists($index, $this->buttons)) {
            unset($this->buttons[$index]);

            $this->buttons = array_values($this->buttons);

            if ($this->builder->getFooterElement()->hasChild($button->getElement())) {
                $this->builder->getFooterElement()->removeChild($button->getElement());
            }
        }

        $this->analyseFooterVisibililty();

        return $this;
    }

    public function createTriggerButton(?string $label = null): BsModalButton
    {
        return $this->builder->createTriggerButton($label);
    }

    private function resolveConfiguration(array $configs): void
    {
        $restrainedProperties = ['element', 'associateButton'];

        foreach ($configs as $key => $value) {
            if (!in_array($key, $restrainedProperties)) {
                $method = sprintf('set%s', ucfirst($key));

                if (method_exists($this, $method)) {
                    try {
                        $this->{$method}($value);
                    } catch (\Exception $e) {
                        //
                    }
                }
            }
        }
    }

    private function setElementContent(ElementInterface $element, ?string $value): ElementInterface
    {
        $textNode = new TextNode($value ?? '');

        $element
            ->clearChildNodes()
            ->prependChild($textNode)
            ->setVisible(!$textNode->isContentWhiteSpace())
        ;

        return $element;
    }

    private function analyseHeaderVisibility(): void
    {
        $visible = !empty($this->getTitle()) || $this->hasCloseButton();

        $this->builder->getHeaderElement()->setVisible($visible);
    }

    private function analyseFooterVisibililty(): void
    {
        $visible = !empty($this->buttons);

        $this->builder->getFooterElement()->setVisible($visible);
    }
}
