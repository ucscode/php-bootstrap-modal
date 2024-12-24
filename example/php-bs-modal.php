<?php

use Ucscode\HtmlComponent\BsModal\BsModal;
use Ucscode\HtmlComponent\BsModal\BsModalButton;

require_once '../vendor/autoload.php';

// ========== [ Basic modal ] ==========

$simpleModal = new BsModal([
    'message' => 'Hi, I am a simple bootstrap modal',
]);

// ========== [ Titled modal ] ==========

$titledModal = new BsModal([
    'title' => 'Howdy!',
    'message' => 'I can really generate bootstrap modal HTML easily'
]);

// ========== [ No close button modal ] ==========

$noCloseBtnModal = new BsModal([
    'title' => 'Outch!',
    'closeButton' => false,
    'message' => 'There is no close button at the top right',
]);

// ========== [ No header modal ] ==========

$noHeader = new BsModal([
    'closeButton' => false,
    'message' => 'With no header title and no close button, the header becomes insignificant.',
]);

// ========== [ No default footer button modal ] ==========

$notOkModal = new BsModal([
    'message' => 'With no footer button, the footer becomes insignficant',
    'footerCloseButton' => false,
]);

// ========== [ Sized modals ] ==========

$sizedModals = [
    'sm' => new BsModal([
        'size' => BsModal::SIZE_SM,
        'message' => 'I am a humble small modal',
    ]),
    'lg' => new BsModal([
        'size' => BsModal::SIZE_LG,
        'message' => 'I am a strong large modal',
    ]),
    'xl' => new BsModal([
        'size' => BsModal::SIZE_XL,
        'message' => 'I am an extra large modal that will subdue the content visibility of your website (...obnoxious laugh)',
    ]),
    'fullscreen' => new BsModal([
        'size' => BsModal::SIZE_FULLSCREEN,
        'message' => <<<TEXT
            <h4>Muahahaha!</h4>
            <p>I shall cover your website content an rule over the woooooorld...!</p>
            <p>(Cough) Sorry, i mean, <strong>and rule over your website traffic.</strong></p> 
            <strong>Muahahahah...</strong>
            TEXT
    ]),
];

// ========== [ Vertically centered modal ] ==========

$verticalModal = new BsModal([
    'message' => 'This modal is centered at the middle of the page',
    'verticalCenter' => true,
]);

// ========== [ Scrollable modal ] ==========

$scrollableModal = new BsModal([
    'title' => 'A long scrollable Lorem Ipsum  content',
    'scrollable' => true,
    'message' => <<<LOREM_IPSUM
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>

        <p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.</p>

        <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu.</p>

        <p>Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium. Pellentesque auctor neque nec urna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Aenean viverra rhoncus pede. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi. Phasellus a est. Phasellus magna. In hac habitasse platea dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique.</p>
        LOREM_IPSUM,
]);

// ========== [ Backdrop static modal ] ==========

$staticModal = new BsModal([
    'message' => 'This modal will not close when you click the background',
    'backdropStatic' => true,
]);

// ========== [ Esc key not allowed modal ] ==========

$noEscapeModal = new BsModal([
    'message' => 'This modal will not close when you click the <strong>esc</strong> button on your keyboard',
    'closeOnEscape' => false,
]);

// ========== [ Custom buttons modal ] ==========

$customButtonModal = new BsModal([
    'message' => 'This is a modal with custom buttons',
    'buttons' => [
        new BsModalButton('Cancel', [
            'class' => 'btn btn-danger',
        ]),
        new BsModalButton('Continue'),
    ]
]);

$designedModal = new BsModal([
    'message' => "This is a custom modal designed as shown in <a href='https://getbootstrap.com/docs/5.3/examples/modals/#modalChoice' target='_blank'>this example</a>",
    'closeButton' => false,
    'buttons' => [
        new BsModalButton('Yes, enable', [
            'class' => 'btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end'
        ]),
        new BsModalButton('No Thanks', [
            'class' => 'btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0',
        ])
    ]
]);

$designedModal->getBuilder()
    ->getContainerElement()
        ->getClassList()->add('rounded-3 shadow');

$designedModal->getBuilder()
    ->getBodyElement()
        ->getClassList()->add('p-4 text-center');

$designedModal->getBuilder()
    ->getFooterElement()
        ->getClassList()->add('flex-nowrap p-0');

// ========== [ Progressive modals ] ==========

$exchangeModal1 = new BsModal([
    'message' => "You've done a really great job coming this far!",
]);

$exchangeModal2 = new BsModal([
    'message' => 'A new modal will open if you click OK',
    'buttons' => [
        new BsModalButton('Ok', [
            ':target' => $exchangeModal1,
        ]),
    ],
]);

// ========== [ Auto rendered modal ] ==========

$autoRenderedModal = new BsModal([
    'title' => "Welcome to PHP BS Modal",
    'message' => 'Thank you for choosing PHP Bootstrap Modal. This library has done the heavy lifting of rendering bootstrap modal box on your site. This comes in handy after a redirect or flash (session) message. Checkout the processes below',
    'show' => true,
]);

// ========== [ Event triggering modal ] ==========

$eventTriggeredModal = new BsModal([
    'title' => 'Trigger Event',
    'message' => 'When this modal is hidden, you will be informed about which button you clicked',
    'event:hidden.bs.modal' => 'detectUserClick',
    'buttons' => [
        new BsModalButton('Cancel', [
            'class' => 'btn btn-danger',
            'onclick' => 'window.pbsm_btn = this',
        ]),
        new BsModalButton('Ok', [
            'onclick' => 'window.pbsm_btn = this',
        ])
    ],
]);