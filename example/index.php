<?php require_once 'php-bs-modal.php'; ?>
<!doctype html>
<html>
    <head>
        <title>PHP Bootstrap Modal Example</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="./" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <span class="fs-4">PHP BS Modal</span>
                </a>
            </header>
            <main class="pb-4">
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a simple modal</h6>
                        <?php echo $simpleModal->createTriggerButton('Try it'); ?>
                        <?php echo $simpleModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a bootstrap modal with title</h6>
                        <?php echo $titledModal->createTriggerButton('Try it'); ?>
                        <?php echo $titledModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a bootstrap modal without a (top-right) close button</h6>
                        <?php echo $noCloseBtnModal->createTriggerButton('Try it'); ?>
                        <?php echo $noCloseBtnModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal without an header</h6>
                        <?php echo $noHeader->createTriggerButton('Try it'); ?>
                        <?php echo $noHeader->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal without a footer button</h6>
                        <?php echo $notOkModal->createTriggerButton('Try it'); ?>
                        <?php echo $notOkModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This are modals of different sizes</h6>
                        <?php 
                            foreach ($sizedModals as $size => $modal) {
                                echo $modal->createTriggerButton('Modal ' . $size);
                                echo $modal->render(); 
                            }
                        ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal aligned at the center of the pages</h6>
                        <?php echo $verticalModal->createTriggerButton('Try it'); ?>
                        <?php echo $verticalModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal with scrollbar on long content</h6>
                        <?php echo $scrollableModal->createTriggerButton('Try it'); ?>
                        <?php echo $scrollableModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal with a static backdrop</h6>
                        <?php echo $staticModal->createTriggerButton('Try it'); ?>
                        <?php echo $staticModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal that cannot be closed by simply clicking escape key</h6>
                        <?php echo $noEscapeModal->createTriggerButton('Try it'); ?>
                        <?php echo $noEscapeModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal with custom buttons</h6>
                        <?php echo $customButtonModal->createTriggerButton('Try it'); ?>
                        <?php echo $customButtonModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a bootstrap modal with custom design</h6>
                        <?php echo $designedModal->createTriggerButton('Try it'); ?>
                        <?php echo $designedModal->render(); ?>
                    </div>
                </div>
                <div class="text-center card mb-3">
                    <div class="card-body">
                        <h6 class="mb-3">This is a modal that opens another modal</h6>
                        <?php echo $exchangeModal1->render(); ?>
                        <?php echo $exchangeModal2->createTriggerButton('Try it'); ?>
                        <?php echo $exchangeModal2->render(); ?>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>