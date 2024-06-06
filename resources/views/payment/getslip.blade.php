<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Slip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/logo.jpg" type="image/x-icon">

</head>

<body>
        <table class="table border" style=" width:700px" align="center" >
            <thead>
                <tr>
                    <th colspan="2" class="border">
                        <div class="row">
                            <div class="col-5 border-right">
                                <img src="/img/logo.jpg" height="130px">
                            </div>
                            <div class="col-7 ">
                                <h4>The Zym Nation</h4>
                                <h5>

                                    New bus stand Choudhary colony,<br> Nokha Rd, Gangashahar, Bikaner,<br> Rajasthan
                                    334001
                                    <br>
                                    <a href="tel:+918619819081">+91 8619819081</a> Yogesh Vyas
                                </h5>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                Slip No:
                            </div>
                            <div class="col-3 h6">
                                {{$info->id}}
                            </div>
                            
                            <div class="col-3">
                                 Date:
                            </div>
                            <div class="col-3 h6">
                                {{date('d-m-Y',strtotime($info->dos))}}
                            </div>
                            <div class="col-3">
                                Name:
                            </div>
                            <div class="col-3 h6">
                                {{$info->member_name}}
                            </div>
                            
                            <div class="col-3">
                                Mode of Payment:
                            </div>
                            <div class="col-3 h6">
                                {{$info->paymentmode}}
                            </div>
                            
                            <div class="col-3">
                                Plan Name:
                            </div>
                            <div class="col-3 h6">
                                {{$info->plan_name." (".$info->duration." months)"}}
                            </div>
                            
                            <div class="col-3">
                                Mobile:
                            </div>
                            <div class="col-3 h6">
                                {{$info->member->mobile}}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <table class="border" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Name of Plan</th>
                                <th>Fees</th>
                                <th>Discount</th>
                                <th>Discounted Fees</th>
                                <th>Extra Discount</th>
                                <th>Submitted Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$info->plan_name;?></td>
                                <td><?=$info->plan_fees;?></td>
                                <td><?=$info->plan_discount;?></td>
                                <td><?=$info->plan_fees-($info->plan_fees*$info->plan_discount/100);?></td>
                                <td><?=$info->extradiscount;?></td>
                                <th><?=$info->feessubmited;?></th>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>

            </tbody>

        </table>
        
        <button onclick="window.print();"  >Print</button>
    
</body>

</html>
