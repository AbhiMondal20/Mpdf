<?php
    require_once __DIR__ . '/vendor/autoload.php'; 
    $mpdf = new \Mpdf\Mpdf();
    // $mpdf->useOddEven = 1;

    // $mpdf->AddPageByArray(array(
    //     'resetpagenum' => '1',
    //     'pagenumstyle' => 'i',
    //     'suppress' => 'on',
    // ));

    $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
    $footer = 'Footer';
    $mpdf->SetFooter($footer);
    $mpdf->AliasNbPages('[pagetotal]');
    $mpdf->PageNo();
    $mpdf->WriteHTML('
        There are [pagetotal] pages in this document
    ');

    $mpdf->WriteHTML('<htmlpageheader name="myHeader2">
    <div style="text-align: center; font-weight: bold;">
        My document
    </div>
    </htmlpageheader>
    <p>Text of introduction...
    <p>Text of main book...');
    
    $mpdf->WriteHTML('<indexentry content="Buffalo" />Your text which refers to a buffalo, which
    you would like to see in the Index
    ...rest of document <pagebreak topmargin="100"/> <h2>Index</h2>');

    
    $mpdf->aliasNbPg = '[pagetotal]';
    $mpdf->WriteHTML('Some text...');
    $mpdf->WriteHTML('<columnbreak />');
    $mpdf->WriteHTML('Next column...');

    $mpdf->Output();
