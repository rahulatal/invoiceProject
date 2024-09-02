<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    
</head>

<style>

  #logo {
      float: left;
  }

  #type {
      float: right;
      padding-top: 2%;
  }

  #left {
      padding-top: 15%;
      text-align: left;
  }

  #right {
      float: right;
      padding-top: 5%;
      text-align: right;
  }

  th, .highlight-amount {
    background-color: #F99C19;
    /* background-color: antiquewhite; */
    text-align: left;
  }

  .qr_code_container {
    display: flex;
    align-items: flex-start; /* Align items to the start (top) of the container */
    justify-content: space-between;
  }

  .indian-rupee {
    font-family: DejaVu Sans; sans-serif;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0px !important;
  }

  table thead th {
    height: 28px;
    text-align: left;
    font-size: 16px;
    font-family: sans-serif;
  }

  table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 14px;
  }

</style>

<body>
    <div id="wrap">
        <div id="logo">
          <img src="../Invitecrafterheader.png">
        </div>
        <div id="type">
            <p style="text-align:right;"><b>Tax Invoice Of Supply/Cash Memo</b><br><span class="original_for_recipient">(Original For Recipient)</span></p>
            <div id="right">
                <p class="qr_code_container"><b class="qr_code">IRN/QR Code:</b><img src="../dummy_website_barcode.jpeg" width="150px" height="150px"></p>
                <p><b>Billing Address:</b><br>Rahul Singh Atal, <br>Mobile No.: 8770968942<br></p>
                <p><b>GST Registration No.:</b> 22jhsg64914g</p>
                <p><b>Invoice Number:</b> IN-4452</p>
                <p><b>Invoice details:</b> OR-1764489316185464</p>
                <p><b>Invoice Date:</b> 14-07-2022</p>
            </div>
        </div>
        <div>
            <div id="left">
                <p>
                  <b>Sold By:</b><br>invitecrafter.com,<br> 204, Krishna Business Center, <br> Medanta Hospital Road,
                    Indore, MADHYA PRADESH, 452010
                    <br>IN
                </p>
                <p><b>Pan No.:</b> ABCDEFGH123</p>
                <p><b>GST Registration No.:</b> 21jhsg64914g</p>
                <p><b>Order Number:</b> 171-54-5468-54</p>
                <p><b>Order Date:</b> 23-08-2022</p>
            </div>
        </div>
        <div id="invoicetable">
            <table border="3">
                <tr>
                    <th>SI. No.</th>
                    <th>Description</th>
                    <th>Unit price</th>
                    <th>Qty</th>
                    <th>Net Amount</th>
                    <th>Tax Rate</th>
                    <th>Tax Type</th>
                    <th>Tax Amount</th>
                    <th>Total Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><b>Beautiful Birthday Invitation</b></td>
                    <td><span class="indian-rupee">&#8377;</span>41.52</td>
                    <td>1</td>
                    <td><span class="indian-rupee">&#8377;</span>41.52</td>
                    <td>18%</td>
                    <td>IGST</td>
                    <td><span class="indian-rupee">&#8377;</span>7.48</td>
                    <td><span class="indian-rupee">&#8377;</span>49.00</td>
                </tr>
                <tr>
                    <td colspan="7"><b>TOTAL:</b></td>
                    <td class="highlight-amount"><b><span class="indian-rupee">&#8377;</span>7.48</b></td>
                    <td class="highlight-amount"><b><span class="indian-rupee">&#8377;</span>49.00</b></td>
                </tr>
                <tr>
                    <td colspan="9"><b>Amount in Words:<br>Forty-Nine Rupees Only</b></td>
                </tr>
                <tr>
                    <td colspan="9">
                      <div style="text-align:right">
                        <b>For Appario Retail Private Ltd:</b><br>
                        <img src="../dummy_signature.png" width="140px" height="70px"><br>
                        <b>Authorized Signatory</b><br>
                      </div>
                    </td>
                </tr>
            </table>
            Whether tax is payable under reverse charge - No
        </div>
    </div>
</body>

</html>


<form method="POST" action="<?php echo e(url('/generate_Pdf')); ?>">
  <?php echo csrf_field(); ?>
    <button class="btn btn-primary mt-5 ms-5" type="submit">Generate Invoice</button>
</form>

<form method="POST" action="<?php echo e(url('/send_email')); ?>">
  <?php echo csrf_field(); ?>
    <button class="btn btn-primary mt-5 ms-5" type="submit">Send Email</button>
</form><?php /**PATH /home/rahulatal/invoice/invoiceProject/generate_invoice/resources/views/home.blade.php ENDPATH**/ ?>