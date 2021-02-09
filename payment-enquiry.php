<?php
use AboGabalMyFatoorah\Src\paymentEnquiry;

require_once 'config/config.php';
require_once 'src/autoload.php';

if (empty($_GET['payment_id'])){
    header('Location: index.php');
    exit;
}

$paymentEnquiry = new paymentEnquiry();
$response = $paymentEnquiry->setCurlFieldsThenExecuteCurl(
    [
        'Key'       => $_GET['payment_id'],
        'KeyType'   => 'PaymentId'
    ]);

if ($paymentEnquiry->curlErrorExist()) {
    echo "cURL Error #: " . $paymentEnquiry->getCurlError();
} else {
    $json = json_decode((string)$response->getResponse(), true); // reset json variable with a new data
}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

<script>
    window.addEventListener('beforeunload', function (e) {
        e.preventDefault()
        e.returnValue='هل انت متأكد من انك تريد غلق الصفحه'
    })
</script>

<div class="container text-right" dir="rtl">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning">يفضل الاختفاظ برابط تلك الصفحه لسهوله الوصول للفاتوره الخاصه بك</div>
        </div>
        <br>
        <? if ($json['IsSuccess']) { ?>
            <div class="col-12">
                <h3 class="text-center">تفاصيل الدفع</h3>
            </div>
            <div class="col-md-6">
                <span>رقم الفاتوره:</span>
                <strong><?= $json['Data']['InvoiceId'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>حاله الفاتوره:</span>
                <strong>
                    <?php
                    if ($json['Data']['InvoiceStatus'] == 'Pending') {
                        echo 'قيد الانتظار';
                    } elseif ($json['Data']['InvoiceStatus'] == 'Paid') {
                        echo 'مدفوعه';
                    } elseif ($json['Data']['InvoiceStatus'] == 'PartiallyPaid') {
                        echo 'مدفوعه جزئيا';
                    } elseif ($json['Data']['InvoiceStatus'] == 'Canceled') {
                        echo 'ملغاه';
                    }
                    ?>
                </strong>
            </div>
            <div class="col-md-6">
                <span>الرقم المرجعى للفاتوره:</span>
                <strong><?= $json['Data']['InvoiceReference'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>مرجع العميل:</span>
                <strong><?= $json['Data']['CustomerReference'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>تاريخ انشاء الفاتوره:</span>
                <strong><?= $json['Data']['CreatedDate'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>تاريخ انتهاء صلاحيه الفاتوره:</span>
                <strong><?= $json['Data']['ExpiryDate'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>قيمه الفاتوره:</span>
                <strong><?= $json['Data']['InvoiceValue'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>التعليقات:</span>
                <strong><?= $json['Data']['Comments'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>اسم العميل:</span>
                <strong><?= $json['Data']['CustomerName'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>رقم جوال العميل:</span>
                <strong><?= $json['Data']['CustomerMobile'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>البريد الالكترونى للعميل:</span>
                <strong><?= $json['Data']['CustomerEmail'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>حقل محدد من العميل:</span>
                <strong><?= $json['Data']['UserDefinedField'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>قيمه الفاتوره:</span>
                <strong><?= $json['Data']['InvoiceDisplayValue'] ?></strong>
            </div>
            <div class="col-md-6">
                <span>قيمه عرض الفاتوره:</span>
                <strong><?= $json['Data']['InvoiceDisplayValue'] ?></strong>
            </div>
            <div class="col-12">
                <br>
                <br>
                <h6>المنتجات (عناصر الفاتوره)</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">اسم المنتج</th>
                        <th scope="col">عدد الوحدات</th>
                        <th scope="col">سعر الوحده</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($json['Data']['InvoiceItems'] as $item) : ?>
                        <tr>
                            <td><?= $item['ItemName'] ?></td>
                            <td><?= $item['Quantity'] ?></td>
                            <td><?= $item['UnitPrice'] ?></td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
                <br>
                <br>
            </div>
            <div class="col-12">
                <h6>معاملات الفاتوره</h6>
            </div>
            <div class="col-12">
                <? foreach ($json['Data']['InvoiceTransactions'] as $item) { ?>
                    <div style="border: 1px solid #eee; padding: 5px">
                        <div class="row">
                            <div class="col-md-6">
                                <span>تاريخ المعامله:</span>
                                <strong><?= $item['TransactionDate'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>بوابه الدفع:</span>
                                <strong><?= $item['PaymentGateway'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>الرقم المرجعى:</span>
                                <strong><?= $item['ReferenceId'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>رقم التتبع:</span>
                                <strong><?= $item['TrackId'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>رقم المعامله:</span>
                                <strong><?= $item['TransactionId'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>معرف الدفع:</span>
                                <strong><?= $item['PaymentId'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>معرف الترخيص:</span>
                                <strong><?= $item['AuthorizationId'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>حاله المعامله:</span>
                                <strong><?= $item['TransactionStatus'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>قيمه المعامله:</span>
                                <strong><?= $item['TransationValue'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>رسوم خدمه العملاء:</span>
                                <strong><?= $item['CustomerServiceCharge'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>القيمه المستحقه:</span>
                                <strong><?= $item['DueValue'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>العمله المدفوعه:</span>
                                <strong><?= $item['PaidCurrency'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>قيمه العمله المدفوعه:</span>
                                <strong><?= $item['PaidCurrencyValue'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>قيمه العمله المدفوعه:</span>
                                <strong><?= $item['PaidCurrencyValue'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>العمله:</span>
                                <strong><?= $item['Currency'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>الاخطاء:</span>
                                <strong><?= !empty($item['Error']) ? $item['Error'] : 'لايوجد' ?></strong>
                            </div>
                            <div class="col-md-6">
                                <span>رقم البطاقه:</span>
                                <strong><?= $item['CardNumber'] ?></strong>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        <? } else { ?>
            <div class="col-12">
                <p>خطأ: (<?= $json['Message'] ?>)</p>
            </div>
        <? } ?>
    </div>
</div>
