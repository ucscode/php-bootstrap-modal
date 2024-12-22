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
    protected ElementInterface $btnClose;
    protected ElementInterface $body;
    protected ElementInterface $footer;
    protected ElementInterface $btnSecondary;
    protected ElementInterface $btnPrimary;

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

    public function getBtnCloseElement(): ElementInterface
    {
        return $this->btnClose;
    }

    public function getBodyElement(): ElementInterface
    {
        return $this->body;
    }

    public function getFooterElement(): ElementInterface
    {
        return $this->footer;
    }

    public function getBtnSecondaryElement(): ElementInterface
    {
        return $this->btnSecondary;
    }

    public function getBtnPrimaryElement(): ElementInterface
    {
        return $this->btnPrimary;
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

        $this->title = new ElementNode(NodeNameEnum::NODE_H5, [
           'class' => 'modal-title'
        ]);

        $this->btnClose = new ElementNode(NodeNameEnum::NODE_BUTTON, [
           'class' => 'btn-close',
           'type' => 'button',
           'aria-label' => 'Close',
            'data-bs-dismiss' => 'modal',
        ]);

        $this->body = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-body'
        ]);

        $this->footer = new ElementNode(NodeNameEnum::NODE_DIV, [
           'class' => 'modal-footer'
        ]);

        $this->btnSecondary = new ElementNode(NodeNameEnum::NODE_BUTTON, [
           'class' => 'btn btn-secondary',
           'type' => 'button',
           'data-bs-dismiss' => 'modal',

        ]);

        $this->btnPrimary = new ElementNode(NodeNameEnum::NODE_BUTTON, [
           'class' => 'btn btn-primary',
           'type' => 'button'
        ]);
    }

    protected function stackElements(): void
    {
        $this->container->appendChild($this->dialog);
        $this->dialog->appendChild($this->content);
        $this->content->appendChild($this->header);
        $this->header->appendChild($this->title);
        $this->header->appendChild($this->btnClose);
        $this->content->appendChild($this->body);
        $this->content->appendChild($this->footer);
        $this->footer->appendChild($this->btnSecondary);
        $this->footer->appendChild($this->btnPrimary);
    }
}
