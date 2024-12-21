<?php

namespace Ucscode\HtmlComponent\BsModal\Builder;

use Ucscode\UssElement\Contracts\ElementInterface;
use Ucscode\UssElement\Node\ElementNode;
use Ucscode\UssElement\Enums\NodeNameEnum;

class BsModalBuilder
{
    protected ElementInterface $container;
    protected ElementInterface $dialog;
    protected ElementInterface $content;
    protected ElementInterface $header;
    protected ElementInterface $title;
    protected ElementInterface $close;
    protected ElementInterface $body;
    protected ElementInterface $footer;
    protected ElementInterface $secondary;
    protected ElementInterface $primary;

    public function __construct()
    {
        $this->createElements();
        $this->stackElements();
    }

    public function getContainerElement(): ElementInterface
    {
        return $this->container;
    }

    public function getDialogElement(): ElementInterface
    {
        return $this->dialog;
    }

    public function getContentElement(): ElementInterface
    {
        return $this->content;
    }

    public function getHeaderElement(): ElementInterface
    {
        return $this->header;
    }

    public function getTitleElement(): ElementInterface
    {
        return $this->title;
    }

    public function getCloseElement(): ElementInterface
    {
        return $this->close;
    }

    public function getBodyElement(): ElementInterface
    {
        return $this->body;
    }

    public function getFooterElement(): ElementInterface
    {
        return $this->footer;
    }

    public function getSecondaryElement(): ElementInterface
    {
        return $this->secondary;
    }

    public function getPrimaryElement(): ElementInterface
    {
        return $this->primary;
    }

    protected function createElements(): void
    {
        $this->container =  new ElementNode(NodeNameEnum::NODE_DIV, [
             'class' => 'modal',
             'tabindex' => '-1',
         ]);

        $this->dialog =  new ElementNode(NodeNameEnum::NODE_DIV, [
             'class' => 'modal-dialog',
         ]);

        $this->content = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-content'
        ]);

        $this->header = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-header'
        ]);

        $this->title = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-title'
        ]);

        $this->close = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'btn-close'
        ]);

        $this->body = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-body'
        ]);

        $this->footer = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-footer'
        ]);

        $this->secondary = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'btn-secondary'
        ]);

        $this->primary = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'btn-primary'
        ]);
    }

    protected function stackElements(): void
    {
        $this->container->appendChild($this->dialog);
        $this->dialog->appendChild($this->content);
        $this->content->appendChild($this->header);
        $this->header->appendChild($this->title);
        $this->header->appendChild($this->close);
        $this->content->appendChild($this->body);
        $this->content->appendChild($this->footer);
        $this->footer->appendChild($this->secondary);
        $this->footer->appendChild($this->primary);
    }
}
